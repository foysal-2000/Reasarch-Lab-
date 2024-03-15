<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    /*** Current Student ***/
    public function create()
    {
        return view('backend.student.create');
    }

    public function store(Request $request)
    {
        $data= $request->all();

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as needed
        ]);

        $student = new Student;
        $student->student_name = $request->student_name;
        $student->email = $request->email;
        $student->scholar_link= $request->scholar_link;
        $student->university= $request->university;
        $student->department= $request->department;
        $student->linkdin= $request->linkdin;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imagename =$request->student_name.'-'.time().'.'.$image->getClientOriginalExtension();
            $image->move('Student', $imagename);
            $student->photo = $imagename;
        }
        if ($student->save()) {
            // Success message if data is inserted successfully
            return redirect()->route('backend.student.create')->with('success', 'Student Information Created Successfully');
        } else {
            // Error message if data insertion fails
            return redirect()->route('backend.student.create')->with('error', 'Failed to insert student information');
        }
    }

    public function index()
    {
        $students = Student::all();
        return view('backend.student.index',compact('students'));
    }

    public function edit($student)
    {
        $student = Student::find($student);
        return view('backend.student.edit',compact('student'));
    }
    public function update(Request $request, $student)
    {
        $student = Student::find($student);

        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as needed
        ]);

        $student->student_name = $request->input('student_name');
        $student->email = $request->input('email');
        $student->scholar_link = $request->input('scholar_link');
        $student->university = $request->input('university');
        $student->department = $request->input('department');
        $student->linkdin = $request->input('linkdin');

        // Handle photo update
        if ($request->hasFile('photo')) {
            // Remove old photo
            if ($student->photo) {
                $filePath = public_path('Student/' . $student->photo);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            // Upload new photo
            $image = $request->file('photo');
            $imageName = $request->student_name . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Student', $imageName);
            $student->photo = $imageName;
        }
        if ($student->save()) {
            return redirect()->route('backend.student.index')->with('success', 'Student information updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update student information');
        }
    }

      public function delete(Request $request, Student  $student)
      {
          // Delete associated photo from the public directory
          if ( $student->photo) {
              $filePath = public_path('Student/' .  $student->photo);
              if (file_exists($filePath)) {
                  unlink($filePath);
              }
          }

          // Delete the student record
          if ( $student->delete()) {
              // Success message if data is deleted successfully
              return redirect()->route('backend.student.index')->with('success', 'student deleted successfully');
          } else {
              // Error message if data deletion fails
              return redirect()->route('backend.student.index')->with('error', 'Failed to delete student');
          }
      }



}

