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
        $results = \DB::connection('parlevel')->select('select * from locations');
        var_dump($results);
        die();
        return \View::make('work', $results);
    }

}