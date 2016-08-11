<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use Soundcloud;

class HomeController extends Controller
{
    public function index(){
        echo Soundcloud::getAuthUrl();
    }
}
