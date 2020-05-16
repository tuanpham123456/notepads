<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notepad;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function index(Request $request){
        $notepads = Notepad::where('np_name','like','%'.$request->name.'%')->get();
        $categories =Category::where('np_category_id',$request->cate);
        return view ('notepad.search',compact('notepads','categories'));
    }
}
