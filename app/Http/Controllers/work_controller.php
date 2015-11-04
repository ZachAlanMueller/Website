<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class work_controller extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function check_routes() {
        $db = \DB::connection('parlevel');
        $customers = $db->select('select table_schema from information_schema.tables where table_schema like "pls_%" and table_schema not in ("pls_chowtime","pls_cama3","pls_cama2","pls_cama1","pls_skytop","pls_chowtime_2","pls_devtest","pls_products", "pls_demo","pls_digitalica","pls_dms","pls_gvra","pls_happysnacks","pls_joeys","pls_justright","pls_lifebox","pls_treatamerica","pls_waynes") 
group by table_schema;');
        $results = array();
        foreach($customers as $customer){
            $db->statement('USE '.$customer);
            $single = $db->select('select * from machines where id = 12');
            array_push($results, $single);
        }



        $results = \DB::connection('parlevel')->select('select * from locations');
        
        return \View::make('work')->with('results', $customers);
    }

}
//select table_schema from information_schema.tables
//
//where table_schema like 'pls_%'
//and table_schema not in ('pls_chowtime','pls_cama3','pls_cama2','pls_cama1','pls_skytop','pls_chowtime_2','pls_devtest','pls_products', 'pls_demo','pls_digitalica','pls_dms','pls_gvra','pls_happysnacks','pls_joeys','pls_justright','pls_lifebox','pls_treatamerica','pls_waynes')
//group by table_schema;