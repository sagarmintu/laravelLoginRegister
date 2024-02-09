<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = category::all();
        return view('category.index', compact('category'));
    }

    public function add()
    {
        return view('category.form');
    }

    public function save(Request $request)
    {
        category::create(['name' => $request->name]);
        return redirect()->route('category');
    }

    public function edit($id)
    {
        $category = category::findOrFail($id);
        return view('category.form', compact('category'));
    }

    public function update($id, Request $request)
    {
        category::findOrFail($id)->update(['name' => $request->name]);
        return redirect()->route('category');
    }

    public function delete($id)
    {
        category::findOrFail($id)->delete();
        return redirect()->route('category');
    }
}
