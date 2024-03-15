<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Validator;
class CarouselController extends Controller
{
    public function create()
    {
        return view("backend.carousel.create");
    }
    public function store(Request $request)
    {
        $data= $request->all();

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as needed
        ]);

       $carousel = new Carousel;
       $carousel->carousel_name = $request->carousel_name;
       $carousel->status= $request->status;
       $carousel->from_date= $request->from_date;
       $carousel->to_date= $request->to_date;

       if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $imagename =$request->carousel_name.'-'.time().'.'.$image->getClientOriginalExtension();
        $image->move('Carousel', $imagename);
        $carousel->photo = $imagename;
    }
        if ($carousel->save()) {
            // Success message if data is inserted successfully
            return redirect()->route('backend.carousel.create')->with('success', 'Student Information Created Successfully');
        } else {
            // Error message if data insertion fails
            return redirect()->route('backend.carousel.create')->with('error', 'Failed to insert student information');
        }
    }

    public function index()
    {
        $carousels = Carousel::all();
        return view('backend.carousel.index', compact('carousels'));
    }
    public function edit($carousel)
    {
        $carousel= Carousel::find($carousel);
        return view('backend.carousel.edit', compact('carousel'));
    }
    public function update(Request $request, $carousel)
    {
        $carousel = Carousel::findOrFail($carousel);

        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as needed
        ]);

        $carousel->carousel_name = $request->input('carousel_name');
        $carousel->status = $request->input('status');
        $carousel->from_date = $request->input('from_date');
        $carousel->to_date = $request->input('to_date');

        // Handle photo update
        if ($request->hasFile('photo')) {
            // Remove old photo
            if ($carousel->photo) {
                $filePath = public_path('Carousel/' .$carousel->photo);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            // Upload new photo
            $image = $request->file('photo');
            $imageName = $request->carousel_name . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Carousel', $imageName);
           $carousel->photo = $imageName;
        }
        if ($carousel->save()) {
            return redirect()->route('backend.carousel.index')->with('success', 'Carousel updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update carousel');
        }
    }


    public function delete(Request $request, Carousel $carousel)
    {
        // Delete associated photo from the public directory
        if ($carousel->photo) {
            $filePath = public_path('Carousel/' . $carousel->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete the publication record
        if ($carousel->delete()) {
            // Success message if data is deleted successfully
            return redirect()->route('backend.carousel.index')->with('success', 'Carousel deleted successfully');
        } else {
            // Error message if data deletion fails
            return redirect()->route('backend.carousel.index')->with('error', 'Failed to delete Carousel');
        }
    }
}
