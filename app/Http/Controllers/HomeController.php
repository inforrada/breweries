<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $endpoint = 'https://api.chucknorris.io/jokes/random';
       
        try {
            $response = Http::get($endpoint, ['category' => 'food']);
            $json = $response->json();
            // dd ($json);
            $quote = $json['value'];
    
        } catch (Exception $e) {
            return view('home');    
        }
        return view('home', compact('quote'));
    }
}
