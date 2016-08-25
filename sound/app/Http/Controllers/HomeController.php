<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use Soundcloud;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        echo Soundcloud::getAuthUrl();
    }
}
