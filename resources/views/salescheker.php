<?php
 
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
 
class SalesCheck extends Command {
    protected $name = 'pls:salescheck';
 
    protected $description = 'Checks for irregular sales';
 
    public function fire() {
        $webhook = $this->option('webhook');
        $limitSales = array_map('intval', explode(':', $this->option('sales'), 4));
        $limitCC = array_map('intval', explode(':', $this->option('cc'), 4));
        $period = $this->option('period');
        $client = $this->option('client');
 
        $clients = Config::get('app.parlevelClients');
        if ($client) {
            $clients = array_intersect($clients, [$client]);
        }
 
        foreach ($clients as $client) {
            $db = DB::connection($client);
            $sales = $this->findSales($db, $limitSales[1], isset($limitSales[3]) ? $limitSales[3] : null, $limitSales[0], isset($limitSales[3]) ? $limitSales[3] : null, $period);
            $cc_sales = $this->findCCSales($db, $limitCC[1], isset($limitCC[3]) ? $limitCC[3] : null, $limitCC[0], isset($limitCC[3]) ? $limitCC[3] : null, $period);
 
            if ($sales == 0 && $cc_sales == 0)
                continue;
 
            $msg = "Found <https://{$client}.parlevelvms.com/support/sales-fix|{$sales} sales> "
                ."and <https://{$client}.parlevelvms.com/support/cc-sales-fix|{$cc_sales} credit card sales> in {$client}";
            if ($webhook) {
                $this->say($webhook, $msg);
            } else {
                echo $msg, "\n";
            }
        }
    }
 
    protected function say($hook, $msg) {
        $ch = curl_init($hook);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "payload=".json_encode(['text' => $msg]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
    }
 
    protected function findSales($db, $fromAmount, $toAmount, $fromQuantity, $toQuantity, $period) {
        return $db->selectOne("
           SELECT COUNT(*) c
           FROM machine_slot_sales s
           WHERE ((s.total_price >= {$fromAmount} ".($toAmount ? "AND s.total_price <= {$toAmount}" : ""). ")
               OR (s.quantity >= {$fromQuantity} ".($toQuantity ? "AND s.quantity <= {$toQuantity}" : "")."))
               AND s.ignore_sale=0
               AND s.created_at>=DATE_SUB(NOW(), INTERVAL {$period} MINUTE)
       ")->c;
    }
 
    protected function findCCSales($db, $fromAmount, $toAmount, $fromQuantity, $toQuantity, $period) {
        return $db->selectOne("
           SELECT COUNT(*) c
           FROM credit_card_sales s
           WHERE ((s.total_sold >= {$fromAmount} ".($toAmount ? "AND s.total_sold <= {$toAmount}" : ""). ")
               OR (s.total_items >= {$fromQuantity} ".($toQuantity ? "AND s.total_items <= {$toQuantity}" : "")."))
               AND s.ignore_sale=0
               AND s.created_at>=DATE_SUB(NOW(), INTERVAL {$period} MINUTE)
       ")->c;
    }
 
    protected function getArguments() {
        return [];
    }
 
    protected function getOptions() {
        return [
            ['webhook', null, InputOption::VALUE_OPTIONAL, 'Slack webook URL.', null],
            ['cc', null, InputOption::VALUE_OPTIONAL, 'Credit card threshold (quantity:amount)', '50:250'],
            ['sales', null, InputOption::VALUE_OPTIONAL, 'Sales threshold (quantity:amount)', '25:250'],
            ['period', null, InputOption::VALUE_OPTIONAL, 'Period in minutes', 5],
            ['client', null, InputOption::VALUE_OPTIONAL, 'Client to run for', null],
        ];
    }
}