<?php

namespace App\Http\Controllers;

use App\Helpers\Agent\Agent;
//use Faker\Provider\UserAgent;
use Illuminate\Http\Request;
use Modules\Product\Entities\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function index()
//    {
//        return view('home');
//    }

    public function index()
    {
        if (Agent::get()->isMobile()){
            return view('mobileIndex');
        }

        return view('index');
    }


}
