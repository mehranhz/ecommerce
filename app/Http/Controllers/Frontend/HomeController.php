<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Agent\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        if (Agent::get()->isMobile()){
            return view('mobileIndex');
        }

        return view('index');
    }
}
