<?php

namespace App\Http\Controllers;

use App\Models\Admin\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    // public function index($slug = null)
    // {
        
    // }

    public function tag()
    {
        $tag_slug = Tag::all();
        // dd($tag_slug);
        return view('template.includes.side',compact('tag_slug'));
    }
}
