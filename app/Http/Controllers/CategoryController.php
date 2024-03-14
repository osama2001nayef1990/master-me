<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategory;
use App\Http\Requests\CreateLink;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function create(CreateCategory $request)
    {
        //Authorization

        //Validation
        $request->rules();

        //Create category
        $category = new Category();
        $category->name = \request()->name;
        $category->user_id = auth()->user()->id;
        $category->save();

        session()->flash('create');
        return back();
    }
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('delete');
        return back();
    }

    public function EditView(Category $category)
    {
        return view('admin.category-edit',['category'=>$category]);
    }
    public function update(CreateCategory $request,Category $category)
    {
        //Authorization

        //Validation
        $request->rules();

        //update category
        $category->name = \request()->name;
        $category->update();

        session()->flash('update');
        return redirect('admin/create/category');
    }

}
