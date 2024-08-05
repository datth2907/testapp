<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        // $collection = [
        //     [
        //         'title' => 'Bài viết 1 ',
        //         'content' => 'Nội dung bài viết thứ 1',
        //         'public' => 1
        //     ],
        //     [
        //         'title' => 'Bài viết 2 ',
        //         'content' => 'Nội dung bài viết thứ 2',
        //         'public' => 0
        //     ],
        //     [
        //         'title' => 'Bài viết 3 ',
        //         'content' => 'Nội dung bài viết thứ 3',
        //         'public' => 1
        //     ],
        // ];
        return DB::table('posts')
                ->where('id','<=',10)
                ->orwhere('id','>=',45)->get();
        return view('home',compact('collection'));
    }
}
