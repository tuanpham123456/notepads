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
    public function index(){
        $notepads = Notepad::paginate(10);

        $viewData = [
            'notepads'   => $notepads
        ];
        return view ('notepad.index',$viewData);
    }
    public function create(){
        return view ('notepad.create');
    }
    public function store(RequestNotepad $request){
        $data = $request->except('_token');
        $data['np_slug']     = Str::slug($request->np_name);
        $data['created_at']   = Carbon::now();

        $id = Notepad::insertGetId($data);
        return redirect()->back();

    }
    public function edit($id){
        $notepads = Notepad::find($id);
        return view('notepad.update',compact('notepads'));

    }

    public function update(RequestNotepad $request ,$id){
        $notepads           = Notepad::find($id);
        $data               = $request->except('_token');
        $data['np_slug']     = Str::slug($request->np_name);
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
