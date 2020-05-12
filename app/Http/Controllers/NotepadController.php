<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\RequestNotepad;
use App\Models\Notepad;
use Carbon\Carbon;
use App\Models\Category;
use Mockery\Matcher\Not;
class NotepadController extends Controller
{
    public function index(Request $request){
        $notepads = Notepad::with('category:id,c_name');
        $categories =Category::all();


        if ($request->name) $notepads->where('np_name','like','%'.$request->name.'%');
        // if($request->cate) $notepads->where('np_category_id',$request->cate);
        $query = Notepad::select("name");


        $notepads = $notepads->orderByDesc('id')->paginate(10);
        $viewData = [
            'notepads'   => $notepads,
            'categories' => $categories
        ];
        return view ('notepad.index',$viewData);
    }
    public function create(){
        $categories = Category::all();

        return view ('notepad.create',compact('categories'));
    }
    public function store(RequestNotepad $request){
        $data = $request->except('_token');
        $data['np_slug']      = Str::slug($request->np_name);
        $data['created_at']   = Carbon::now();
        // dd($data);

        $id = Notepad::insertGetId($data);
        return redirect()->back();

    }
    public function edit($id){
        $notepads = Notepad::findOrFail($id);

        $categories = Category::all();
        return view('notepad.update',compact('notepads','categories'));

    }

    public function update(RequestNotepad $request ,$id){
        $notepads                = Notepad::find($id);

        $data                    = $request->except('_token');
        $data['np_slug']         = Str::slug($request->np_name);
        $data['updated_at'] = Carbon::now();

        $notepads->update($data);
        return redirect()->back();
    }

    public function delete($id){
        $notepads = Notepad::find($id);

        if ($notepads) $notepads->delete();

        return redirect()->back();

    }

}
