<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Comic;

class ComicController extends Controller
{
    public function index(Comic $comic){
        return view('comics/index')->with([
            'comics' => $comic->get()
            ]);
    }
}
