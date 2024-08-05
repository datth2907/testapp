<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function create()
    {
        Gate::authorize('create', Post::class);
        return 'This is create page!';
    }
}
