<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ImageController extends Controller
{
    public function index() {
        $images = Image::where('is_published',1)->paginate(8);
        return view('image.index', compact('images'));
    }

    public function show(Image $image) {
        return view('image.show',compact('image'));
    }

    public function create() {
        return view('image.create');
    }

    public function store(ImageRequest $request) {
        Image::create($request->getData());
        return redirect()->route('image.index')->with('message','Anh da dc upload!');
        
    }

    public function edit(Image $image) {
        Gate::authorize('update-image', $image);
        return view('image.edit',compact('image'));
    }

    public function update(Request $request, Image $image) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        
        $image->update($validated);
        // return redirect()->route('image.index')->with('message','Anh da dc updated!');
        return redirect(route('image.index'));
    }

    public function destroy(Image $image) {                
        Gate::authorize('delete-image',$image);
        
        $image->delete();        
        return redirect(route('image.index'));
    }
    
}
