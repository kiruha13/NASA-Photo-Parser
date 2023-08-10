<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarsRoverPhotosController extends Controller
{
    public function index()
    {
        return view('mars_rover_photos.index');
    }

    public function getPhotos(Request $request)
    {
        $apiKey = '2SEhW9ebWLgYXCYuWPaPnqPnZGpGItaMaatgSih4';
        $earthDate = $request->input('earth_date');
        $camera = $request->input('camera');
        $res = curl_init();
        // Включаем или отключаем проверку подлинности сертификата SSL
        curl_setopt($res, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($res, CURLOPT_URL, "https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=$earthDate&camera=$camera&api_key=$apiKey");
        curl_setopt($res, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($res);
        curl_close($res);

        $photos = json_decode($response, true);

        return view('mars_rover_photos.result', compact('photos'));
    }
}
