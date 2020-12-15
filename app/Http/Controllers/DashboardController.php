<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PostLiked;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    public function index(){
        return view('dashboard');
    }
}

/*
    if we want to apply the middleware just for some functions we can do it from adding ->only
    ex - $this->middleware->(['auth'])->only('function name');
*/