<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;

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
        $client = new Client();
        $zipcode = $request->zipcode;
        $distance = $request->search_radius;
        $api_response = $client->get('https://www.zipcodeapi.com/rest/TFCFzMXK0DFMBoCQ10Yp0EjnBG3u6evhnv7ISt02sStAfNyovLVNTikggqe2OOlS/radius.json/70818/5/miles');
        $response = ($api_response);

        return $response;

        // return view('frontend.sponsor-results', compact('response'));
    }
}
