<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() 
    {
        $collection = [
            [
                'title' => 'Bài viết 1 ',
                'content' => 'Nội dung bài viết thứ 1',
                'public' => 1
            ],
            [
                'title' => 'Bài viết 2 ',
                'content' => 'Nội dung bài viết thứ 2',
                'public' => 0
            ],
            [
                'title' => 'Bài viết 3 ',
                'content' => 'Nội dung bài viết thứ 3',
                'public' => 1
            ],
        ];
        return view('home',compact('collection'));
    }
}
