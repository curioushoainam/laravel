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
    	// $news = News::where('NoiBat',1)->paginate(10);
    	// $news = News::where('NoiBat',1)->simplePaginate(10); 	// only show <<Previous  Next>>
    	// $news = News::where('id','>',500)->paginate(10)->setPath('---/----/hnhd/');    	

    	return view('news',['news'=>$news]);
    }

    public function GroupNews($idLoaiTin){    	
    	$news = News::where('idLoaiTin',$idLoaiTin)->paginate(10);
    	return view('news',['news'=>$news]);
    }
}
