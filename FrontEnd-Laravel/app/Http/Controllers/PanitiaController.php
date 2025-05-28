<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function index(){
        return view('panitaia.index');
    }

    public function event(){
        return view('panitia.event');
    }

    public function createEvent(){
        return view('panitia.create');
    }

    public function store(Request $request){
        
    }
}
