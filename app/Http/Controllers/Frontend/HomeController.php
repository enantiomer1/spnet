<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use App\Models\Zipdata;
use App\Models\Auth\User;
use App\Exceptions\GeneralException;

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

        if ($get_matching_zip == null) {
            throw new GeneralException('Something went wrong, please check your zipcode (maybe a typo?) and try again');
        }

        $lat1 = $get_matching_zip->latitude;
        $lon1 = $get_matching_zip->longitude;
        $r = 3959; // radius of the earth in miles

        $latN = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(0))));
        $latS = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(180))));
        $lonE = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(90)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
        $lonW = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(270)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));

        $zipdatas = Zipdata::where('latitude', '<=', $latN)
            ->where('latitude', '>=', $latS)
            ->where('longitude', '<=', $lonE)
            ->where('longitude', '>=', $lonW)
            ->where('city', '!=', '')
            ->with('users:id,username,email,program,sobriety_date,zipcode,bio')
            ->get();

        return view('frontend.sponsor-search-results', compact('zipdatas'));
        
    }
}
