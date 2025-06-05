<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function index(){
        return view('panitaia.index');
    }

    public function event(){
        return view('panitia.event.index');
    }

    public function createEvent(){
        return view('panitia.event.create');
    }

    public function store(Request $request){
        
    }
}
