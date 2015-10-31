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
        $results = \DB::connection('chowtime')->select('select count(*) as count from locations');
        return View::make('work.blade', $results);
    }

}