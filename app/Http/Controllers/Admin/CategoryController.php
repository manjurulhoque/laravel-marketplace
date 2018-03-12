<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CategoryController extends Controller
{
    protected $category;
    function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category::all();

        return view('admin.dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:categories|max:55',
        ]);

        if ($validator->fails()) {
            return redirect('admin/categories/create')
                ->withErrors($validator)
                ->withInput();
        }

        $this->category->title = $request->title;
        $this->category->save();

        return redirect()->route('admin.categories.index');

    }
}
