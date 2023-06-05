<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\ContactInformation;
use App\Models\HomepageSlider;
use App\Models\OurProject;
use App\Models\OurService;
use App\Models\OurSolution;
use App\Models\Specialize;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = HomepageSlider::orderBy('id', 'asc')->where('status', 1)->get();
        $aboutus = AboutUs::orderBy('id', 'asc')->where('status', 1)->get();
        $services = OurService::orderBy('header', 'asc')->where('status', 1)->get();
        $specializes = Specialize::orderBy('id', 'asc')->where('status', 1)->get();
        $solutions = OurSolution::orderBy('id', 'asc')->where('status', 1)->get();
        $projects = OurProject::orderBy('id', 'asc')->where('status', 1)->get();
        $contactinfo = ContactInformation::orderBy('id', 'asc')->get();
        return view('frontend.home', compact('sliders', 'projects','contactinfo', 'aboutus', 'services', 'solutions'));
    }
}
