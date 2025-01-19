<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('index'); // 返回 resources/views/welcome.blade.php
    }

    public function trade()
    {
        return view('trade');
    }
    public function trade_history()
    {
        return view('trade_history');
    }
}
