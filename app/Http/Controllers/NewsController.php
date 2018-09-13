<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    //
    public function index(){
    	$news = News::paginate(10);
    	// $this->	viewArr($news->toArray());
    	return view('news',['news'=>$news]);
    }
}
