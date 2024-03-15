<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function create()
    {
        return view("backend.publication.create");
    }
    public function index()
    {
        $publications = Publication::all();
        return view("backend.publication.index", compact("publications"));
    }
    public function store(Request $request)
    {
        $data= $request->all();

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as needed
        ]);

        $publication = new Publication;
        $publication->title = $request->title;
        $publication->student_details = $request->student_details;
        $publication->scholar_link= $request->scholar_link;
        $publication->year= $request->year;
        $publication->university= $request->university;
        $publication->department= $request->department;
        $publication->supervisor= $request->supervisor;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imagename =$request->title.'-'.time().'.'.$image->getClientOriginalExtension();
            $image->move('Publication', $imagename);
            $publication->photo = $imagename;
        }
        if ($publication->save()) {
            // Success message if data is inserted successfully
            return redirect()->route('backend.publication.create')->with('success', 'Student Information Created Successfully');
        } else {
            // Error message if data insertion fails
            return redirect()->route('backend.publication.create')->with('error', 'Failed to insert student information');
        }
    }

    public function edit($publication)
    {
        $publication= Publication::find($publication);
        return view('backend.publication.edit',compact('publication'));


    }
    public function update(Request $request, Publication $publication)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as needed
        ]);

        $publication->title = $request->title;
        $publication->student_details = $request->student_details;
        $publication->scholar_link = $request->scholar_link;
        $publication->university = $request->university;
        $publication->department = $request->department;
        $publication->supervisor = $request->supervisor;

        if ($request->hasFile('photo')) {
            // Remove old photo
            if ($publication->photo) {
                $filePath = public_path('Publication/' . $publication->photo);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            // Upload new photo
            $image = $request->file('photo');
            $imageName = $request->title . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Publication', $imageName);
            $publication->photo = $imageName;
        }
        if ($publication->save()) {
            // Success message if data is updated successfully
            return redirect()->route('backend.publication.index')->with('success', 'Publication updated successfully');
        } else {
            // Error message if data update fails
            return redirect()->route('backend.publication.edit', $publication->id)->with('error', 'Failed to update publication information');
        }
    }

    public function delete(Request $request, Publication $publication)
    {
        // Delete associated photo from the public directory
        if ($publication->photo) {
            $filePath = public_path('Publication/' . $publication->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete the publication record
        if ($publication->delete()) {
            // Success message if data is deleted successfully
            return redirect()->route('backend.publication.index')->with('success', 'Publication deleted successfully');
        } else {
            // Error message if data deletion fails
            return redirect()->route('backend.publication.index')->with('error', 'Failed to delete publication');
        }
    }


}
