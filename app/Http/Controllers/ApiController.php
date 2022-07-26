<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;

class ApiController extends Controller
{
    public function gitHub($username)
    {
        $client = new GuzzleClient();
        $response = $client->get("http://api.github.com/users/$username");

        $body = json_decode($response->getBody());
        
        print "Name: $body->name <br>";
        print "Location:  $body->location <br>";
        print "Bio: $body->bio <br>"; 
    }

    public function getWeather()
    {
        return view('weather');
    }

    public function getWeatherJs()
    {
        return view('weather-js');
    }

    public function postWeather(Request $request)
    {
        $this->validate($request, ['location' => 'required|min:5']);

        //google api to get coordinates
        $googleClient = new GuzzleClient();
        $baseURL = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
        $addressURL = urlencode(request('location')) . '&key=' . env('GOOGLE_API');
        $url = $baseURL . $addressURL;
        $request = $googleClient->request('GET', $url);
        $response = $request->getBody()->getContents();
        $response = json_decode($response);
        $latitude = $response->results[0]->geometry->location->lat;
        $longitude = $response->results[0]->geometry->location->lng;


        // dump($latitude);
        // dump($longitude);



        //use the cords to get weather from darksky

        $weatherClient = new GuzzleClient();
        
        $weatherUrl = 'https://api.openweathermap.org/data/2.5/weather?lat='.$latitude.'&lon='.$longitude.'&appid='.env('WEATHER_API');

        $weatherResponse = $weatherClient->get($weatherUrl);


        $weatherBody = json_decode($weatherResponse->getBody()->getContents());

       // dump($weatherBody->weather[0]);

        return view ('weather-ready')->with('weather',$weatherBody)->with('address', $response->results[0]);

        // $weatherClient =new GuzzleClient();
        // $weatherRequest = $googleClient->request('GET', $url);

        // $weatherRequest->setRequestUrl('https://weatherapi-com.p.rapidapi.com/forecast.json');
        // $weatherRequest->setRequestMethod('GET');
        // $weatherRequest->setQuery(new http\QueryString([
	    // 'q' => 'London',
	    // 'days' => '3'
        // ]));

        // $weatherRequest->setHeaders([
	    // 'X-RapidAPI-Key' => '1c4ca30c86mshe8d885311e552e7p1f2041jsn416121b5ec66',
	    // 'X-RapidAPI-Host' => 'weatherapi-com.p.rapidapi.com'
        // ]);

        // $weatherClient->enqueue($weatherRequest)->send();
        // $weatherResponse = $weatherClient->getResponse();

        // $weatherBody = json_decode($weatherResponse->getBody());

        // return view ('weather-ready')->with('weather', $weatherBody)->with('address', $response->results[0]);






    }

}
