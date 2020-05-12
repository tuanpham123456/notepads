<?php

namespace App\Http\Controllers;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view ('category.create');
    }
    
    public function store(RequestCategory $request){
        $data = $request->except('_token');
        $data['c_slug']          = Str::slug($request->c_name);
        $data['created_at']      = Carbon::now();

        $id = Category::insertGetId($data);
        return redirect()->back();

    }

}
