<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function create()

    {
        return view("backend.supervisor.create");
    }
    public function store(Request $request)
    {
        $data= $request->all();

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as needed
        ]);

        $student = new Supervisor;
        $student->supervisor_name = $request->supervisor_name;
        $student->email = $request->email;
        $student->scholar_link= $request->scholar_link;
        $student->university= $request->university;
        $student->department= $request->department;
        $student->linkdin= $request->linkdin;
        $student->desgination = $request->desgination;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imagename =$request->student_name.'-'.time().'.'.$image->getClientOriginalExtension();
            $image->move('Supervisor', $imagename);
            $student->photo = $imagename;
        }
        if ($student->save()) {
            // Success message if data is inserted successfully
            return redirect()->route('backend.supervisor.create')->with('success', 'Student Information Created Successfully');
        } else {
            // Error message if data insertion fails
            return redirect()->route('backend.supervisor.create')->with('error', 'Failed to insert student information');
        }
    }
    public function edit($supervisor){
        $supervisor = Supervisor::find($supervisor);
        return view('backend.supervisor.edit',compact('supervisor'));
    }
    public function update(Request $request, $supervisor)
    {
        $supervisor = Supervisor::find($supervisor);

        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as needed
        ]);

        $supervisor->supervisor_name = $request->input('supervisor_name');
        $supervisor->email = $request->input('email');
        $supervisor->scholar_link = $request->input('scholar_link');
        $supervisor->university = $request->input('university');
        $supervisor->department = $request->input('department');
        $supervisor->linkdin = $request->input('linkdin');
        $supervisor->desgination = $request->input('desgination');

        // Handle photo update
        if ($request->hasFile('photo')) {
            // Remove old photo
            if ($supervisor->photo) {
                $filePath = public_path('Supervisor/' . $supervisor->photo);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            // Upload new photo
            $image = $request->file('photo');
            $imageName = $request->supervisor_name . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Supervisor', $imageName);
            $supervisor->photo = $imageName;
        }
        if ($supervisor->save()) {
            return redirect()->route('backend.supervisor.index')->with('success', 'Supervisor information updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update supervisor information');
        }
    }

    public function index()
    {
        $supervisors = Supervisor::all();
        return view('backend.supervisor.index',compact('supervisors'));
    }

    public function delete(Request $request, Supervisor $supervisor)
    {
        // Delete associated photo from the public directory
        if ($supervisor->photo) {
            $filePath = public_path('Supervisor/' . $supervisor->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete the publication record
        if ($supervisor->delete()) {
            // Success message if data is deleted successfully
            return redirect()->route('backend.supervisor.index')->with('success', 'Publication deleted successfully');
        } else {
            // Error message if data deletion fails
            return redirect()->route('backend.supervisor.index')->with('error', 'Failed to delete publication');
        }
    }

}
