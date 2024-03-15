<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Carousel;
use App\Models\Supervisor;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\AlmuniStudent;
use App\Models\Current_Student;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home()
    {
        $activeCarousels = Carousel::where('status', 'Active')
            ->whereDate('from_date', '<=', now()) // Carousels that started on or before today
            ->whereDate('to_date', '>=', now())   // Carousels that end on or after today
            ->get();

        return view('frontend.home',compact('activeCarousels'));
    }
    public function current()
    {
        Auth::check();
        $supervisors = Supervisor::all();
        $current_students =Student::all();
        return view("frontend.current",compact("current_students","supervisors"));
    }
    public function almuni()
    {
        $supervisors = Supervisor::all();
        $almunis = AlmuniStudent::all();
        return view("frontend.almuni",compact("almunis","supervisors"));
    }
    public function publication()
    {
        $publications= Publication::all();
        return view("frontend.publication",compact("publications"));
    }
    public function carousel()
    {
        // Fetch active carousels based on the current date
        $activeCarousels = Carousel::where('status', 'Active')
            ->whereDate('from_date', '<=', now()) // Carousels that started on or before today
            ->whereDate('to_date', '>=', now())   // Carousels that end on or after today
            ->get();

        return view('frontend.layout.carousel',compact('activeCarousels'));
    }
}
