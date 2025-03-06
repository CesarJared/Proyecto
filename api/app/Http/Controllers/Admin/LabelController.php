<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Labels;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function labelInfo(){
        $labels=Labels::all();
        return view('admin.labels-table')->with('labels',$labels);

    }

    public function insertInfo(Request $request){
        $validatedData=$request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Name is required'
        ]);


        $label=new Labels();
        $label->name=$request->name;
        $label->save();
        return redirect('/admin/labels');
    }

    public function editInfo(Request $request, $id){
        $label=Labels::find($id);

        if($label!=null){
            $label->name=$request->name;
            $label->save();
        }
        return redirect('/admin/labels');
    }

    public function deleteInfo($id){
        $label=Labels::find($id);
        $label->delete();
        return redirect('/admin/labels');
    }
}
