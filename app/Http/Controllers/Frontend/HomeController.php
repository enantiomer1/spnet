<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use App\Models\Zipdata;
use App\Models\Auth\User;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function sponsor_search()
    {
        return view('frontend.sponsor-search');
    }

    public function search(SearchRequest $request)
    {
        $zipcode = $request->zipcode;
        $d = $request->search_radius;
        $get_matching_zip = Zipdata::where('zip_code', '=', $zipcode)->first();

        $lat1 = $get_matching_zip->latitude;
        $lon1 = $get_matching_zip->longitude;
        $r = 3959; // radius of the earth in miles

        $latN = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(0))));
        $latS = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(180))));
        $lonE = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(90)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
        $lonW = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(270)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));

        $get_coordinates = Zipdata::where('latitude', '<=', $latN)
            ->where('latitude', '>=', $latS)
            ->where('longitude', '<=', $lonE)
            ->where('longitude', '>=', $lonW)
            ->where('city', '!=', '')
            ->get();

        // $zipdata_id = zipdata::where('zip_code', '=', $zipcode)->pluck('id');

        return $get_coordinates;

         // return $get_coordinates;

        // $get_matching_users = function ($get_coorditantes) {
        //     foreach ($get_coordinates as $coordinate) {
        //         User::where('zipcode', '=', $coordinate->zip_code)->first();
        //     }
        // };

        // return view('frontend.sponsor-search-results', compact('get_coordinates'));
    }
}
