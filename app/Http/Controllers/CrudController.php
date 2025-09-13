<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CrudController extends Controller
{
    public function index()
    {
        // $student=DB::table('students')->orderBy('roll','asc')->get();
        $student=DB::table('students')->orderBy('id','asc')->get();
        $student=DB::table('students')->orderBy('id','asc')->paginate(3);
        return view('crud.home',['student'=>$student]);
    }
    public function create()
    {
        return view('crud.create');
    }
    public function store(Request $request)
    {
        $imagePath=null;
        if($request->hasFile('image')){
            $imagePath=$request->file('image')->store('images','public');
        }
        //valiation
        $request->validate([
            'roll'=>'required|numeric|min:1|max:10',
            'name'=>'required|min:3|max:50',
            'class'=>'required|min:1|max:10',
            'image'=>'nullable|image|mimes:png,jpg,jpeg,gif,webp|max:2048'
        ],[
        'roll.required' => 'The roll is required.',
        'roll.min' => 'The roll is minimum 1 Numeric .',
        'name.string' => 'The asset name must be a string.',
        'name.max' => 'The asset name cannot exceed 50 characters.',
        'class.required' => 'The class is required.',
        'image.mimes' => 'Allowed formats: png,jpg,jpeg,gif,webp',
        'image.max' => 'The image size must not exceed 2MB.',
    ]);
        //insert data to database
        DB::table('students')->insert([
            'roll'=>$request->roll,
            'name'=>$request->name,
            'class'=>$request->class,
            'image'=>$imagePath,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        //redirect
        return redirect('/crud/home')->with('success_create',"Student name: $request->name added successfully");
    }
    public function destroy($id)
    {
        //detele image
        $student=DB::table('students')->where('id',$id)->first(); 
        if($student->image && Storage::disk('public')->exists($student->image)){
            //delete old image
            Storage::disk('public')->delete($student->image);
        }
        //delete data by id
        DB::table('students')->where('id',$id)->delete();
        return redirect('/crud/home')->with('success','Student deleted successfully');
    }
    
    public function edit($id)
    {
        $student=DB::table('students')->where('id',$id)->first();
        return view('crud.edit',['student'=>$student]);
    }
    public function update(Request $request, $id)
    {
        //image path 
         $imagePath=null;
            if($request->hasFile('image')){
                $imagePath=$request->file('image')->store('images','public');
            }
            else{
                //keep old image
                $student=DB::table('students')->where('id',$id)->first();
                $imagePath=$student->image;
            }
        //valiation
        $request->validate([
            'roll'=>'required|min:1|max:10',
            'name'=>'required|min:3|max:50',
            'class'=>'required|min:1|max:10',
            'image'=>'nullable|image|mimes:png,jpg,jpeg,gif,webp|max:2048'
        ]);
        //Update data to database
        DB::table('students')->where('id',$id)->update([
            'roll'=>$request->roll,
            'name'=>$request->name,
            'class'=>$request->class,
            'image'=>$imagePath,
            'created_at'=>now(),
            'updated_at'=>now()
            
        ]);
        // Redirect back to the home page with a success message
        return redirect()->route('crud/home')->with('success_update',"Student[id:$id,name:$request->name] updated successfully");
        
    }
}
