<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $title = 'Đây là trang LIÊN HỆ!!!';
        $intro = 'Xin chào tôi là Zím!';
        $data = compact('title','intro');
        return view('contact', $data);
    }
}
