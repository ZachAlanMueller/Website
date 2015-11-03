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
        $results = \DB::connection('parlevel')->table('locations')->where('id', 1);
        var_dump($results);
        die();
        return \View::make('work', $results);
    }

}