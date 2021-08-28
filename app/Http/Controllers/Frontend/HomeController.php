<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Agent\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){

//        dd($request->header('User_Agent'));
        if (Agent::get()->isPhone()){
            return view('mobileIndex');
        }

        return view('index');
    }
}
