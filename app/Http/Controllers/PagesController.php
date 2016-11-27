<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
        return view('page.welcome');
    }
    public function getAbout(){
        return view('page.about');
    }
    public function getContact(){
        return view('page.contact');
    }
}
