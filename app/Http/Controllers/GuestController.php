<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\User;

class GuestController extends Controller
{
    public function home() {

        return view('pages.homepage');
    }
}
