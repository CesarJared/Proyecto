<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorys;
use Illuminate\Http\Request;
use App\Models\Uploads;

class UploadController extends Controller
{
    public function uploadInfo(){
        $uploads = Uploads::all();
        $categories = Categorys::all();
        return view('admin.uploads-table')->with('uploads', $uploads)->with('categories', $categories);
    }

    public function insertInfo(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'img' => 'mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[
            'title.required' => 'Title is required',
            'category_id.required' => 'Category is required',
            'description.required' => 'Description is required',
            'img.mimes' => 'Image must be a file of type: jpg, png, jpeg, gif, svg.',
            'img.max' => 'Image must be less than 2MB.'
        ]);

        $upload=new Uploads();
        $upload->user_id=1;
        $upload->category_id=$request->category_id;
        $upload->description=$request->description;
        $upload->title=$request->title;
        $upload->slug=rand(1,9999);
        $upload->img='default.jpg';

        $upload->save();
        return redirect('/admin/uploads');
    }

    public function editInfo(Request $request ,$id){
        $validatedData=$request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'img' => 'mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[
            'title.required' => 'Title is required',
            'category_id.required' => 'Category is required',
            'description.required' => 'Description is required',
            'img.mimes' => 'Image must be a file of type: jpg, png, jpeg, gif, svg.',
            'img.max' => 'Image must be less than 2MB.'
        ]);

        $upload=Uploads::find($id);

        if($upload!=null){
            $upload->category_id=$request->category_id;
            $upload->description=$request->description;
            $upload->title=$request->title;

            $upload->save();
        }

        return redirect('/admin/uploads');
        
    }

    public function deleteInfo($id){
        $upload = Uploads::find($id);
        $upload->delete();
        return redirect('/admin/uploads');
    }
}
