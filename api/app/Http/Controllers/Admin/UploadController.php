<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorys;
use Illuminate\Http\Request;
use App\Models\Uploads;
use App\Models\Videos;
use Illuminate\Support\Facades\File; 

class UploadController extends Controller
{
    public function uploadInfo(){
        $uploads = Uploads::with('user','category')->get();
        $categories = Categorys::all();
        return view('admin.uploads-table')->with('uploads', $uploads)->with('categories', $categories);
    }

    public function insertInfo(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'img' => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
            'video.*'=>'required'
        ],[
            'title.required' => 'Title is required',
            'category_id.required' => 'Category is required',
            'description.required' => 'Description is required',
            'img.mimes' => 'Image must be a file of type: jpg, png, jpeg, gif, svg.',
            'img.max' => 'Image must be less than 2MB.'
        ]);

        $slug=rand(1,9999);

        $upload=new Uploads();
        $upload->user_id=1;
        $upload->category_id=$request->category_id;
        $upload->description=$request->description;
        $upload->title=$request->title;
        $upload->slug=$slug;

        $file=$request->file('img');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $destinationPath=public_path('uploads/img/');
        $file->move($destinationPath,$filename);
        $upload->img=$filename;

        $files=$request->file('video');
        
        $upload->save();
        if($request->hasFile('video')){
            
        $x=1;
            foreach($files as $file){
                
                $extension=$file->getClientOriginalExtension();
                $filename=time().'_EP_'.$x.'.'.$extension;
                $destinationPath=public_path('uploads/videos/');
                $file->move($destinationPath,$filename);
                $video=new Videos();
                $video->uploads_id=$upload->id;
                $video->title=$filename;
                $video->slug=$slug."-EP_".$x;
                $video->save();
                $x++;
            }
        }

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
        if($upload->img!='Deafult.jpg'){
            File::delete('uploads/img/'.$upload->img);
        }
        
        $videos = Videos::where('uploads_id',$id)->get();
        foreach($videos as $video){
            File::delete('uploads/videos/'.$video->title);
            $video->delete();
        }

        $upload->delete();
        return redirect('/admin/uploads');
    }
}
