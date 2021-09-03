<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {
        $this->authorize('admin',auth()->user());
        return view('admin.panel');

    }

    public function fileManager()
    {
        return view('admin.filemanager');
    }
}
