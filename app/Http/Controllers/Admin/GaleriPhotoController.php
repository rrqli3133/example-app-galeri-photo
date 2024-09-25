<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Helpers\Category;
use Illuminate\Support\Facades\Auth;

class GaleriPhotoController extends Controller
{
    public function index()
    {
        return view('admin.galeri-photo.index', [
            'pageTitle' => 'Galeri Photo',
            'listPost' => Post::all(),
        ]);
    }

    public function create()
{
    // dd(Category::categories);
    return view('admin.galeri-photo.create',[
        'pageTitle' => 'Create galeri',
        'listCategory' => Category::categories
    ]);
}

    public function store(Request $request)
    {

         $validated = $request ->validate([
            'title'       => 'required',
            'category'    => 'required',
            'description' => 'required'
           ],[
            'title.required' => 'Judul wajib diisi...',
            'description.required' => 'Keterangan wajib diisi...'
           ]);
        // dd($validated);
        $post = Post::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'user_id' => Auth::user()->id
        ]);
        return redirect(route('admin-galeri-dashboard', absolute: false));
        // dd($post);
        // return redirct();
    }

    public function edit(string $postid)
    {
        $post = Post::findOrfail($postid);
        // menggembalikan ke halaman view admin-edit
        return view('admin.galeri-photo.edit',[
            'pagetitle' => 'Edit Album' ,
            'post'      =>  $post,
            'listCategory' => Category::categories
        ]);
        // dd('mau dedit galeri photo', $post);
    }
}
