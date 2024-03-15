<?php

namespace App\Http\Controllers;

use App\Models\AlmuniStudent;
use Illuminate\Http\Request;

class AlmuniStudentController extends Controller
{
   public function create()
   {
    return view("backend.almuni.create");
   }
   public function store(Request $request)
   {
       $data= $request->all();

       $request->validate([
           'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           // Add more validation rules as needed
       ]);

       $almuni = new AlmuniStudent;
       $almuni->student_name = $request->student_name;
       $almuni->email = $request->email;
       $almuni->scholar_link= $request->scholar_link;
       $almuni->university= $request->university;
       $almuni->department= $request->department;
       $almuni->linkdin= $request->linkdin;
       if ($request->hasFile('photo')) {
           $image = $request->file('photo');
           $imagename =$request->student_name.'-'.time().'.'.$image->getClientOriginalExtension();
           $image->move('Almuni_Student', $imagename);
           $almuni->photo = $imagename;
       }
       if ($almuni->save()) {
           // Success message if data is inserted successfully
           return redirect()->route('backend.almuni.create')->with('success', 'Student Information Created Successfully');
       } else {
           // Error message if data insertion fails
           return redirect()->route('backend.almuni.create')->with('error', 'Failed to insert student information');
       }
   }

   public function index()
   {
       $almunis = AlmuniStudent::all();
       return view('backend.almuni.index',compact('almunis'));
   }

   public function edits($almuni)
   {
       $almuni = AlmuniStudent::find($almuni);
       return view('backend.almuni.edits',compact('almuni'));
   }
   public function update(Request $request, $almuni)
   {
       $almuni = AlmuniStudent::find($almuni);

       $request->validate([
           'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
           // Add more validation rules as needed
       ]);

       $almuni->student_name = $request->input('student_name');
       $almuni->email = $request->input('email');
       $almuni->scholar_link = $request->input('scholar_link');
       $almuni->university = $request->input('university');
       $almuni->department = $request->input('department');
       $almuni->linkdin = $request->input('linkdin');

       // Handle photo update
        if ($request->hasFile('photo')) {
            // Remove old photo
            if ($almuni->photo) {
                $filePath = public_path('Almuni_Student/' . $almuni->photo);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            // Upload new photo
            $image = $request->file('photo');
            $imageName = $request->student_name . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Almuni_Student', $imageName);
            $almuni->photo = $imageName;
        }
       if ($almuni->save()) {
           return redirect()->route('backend.almuni.index')->with('success', 'Student information updated successfully');
       } else {
           return redirect()->back()->with('error', 'Failed to update student information');
       }
   }
   public function delete(Request $request, AlmuniStudent $almuni)
   {
       // Delete associated photo from the public directory
       if ($almuni->photo) {
           $filePath = public_path('Almuni_Student/' . $almuni->photo);
           if (file_exists($filePath)) {
               unlink($filePath);
           }
       }

       // Delete the publication record
       if ($almuni->delete()) {
           // Success message if data is deleted successfully
           return redirect()->route('backend.almuni.index')->with('success', 'Student deleted successfully');
       } else {
           // Error message if data deletion fails
           return redirect()->back()->with('error', 'Failed to delete Student');
       }
   }
}
