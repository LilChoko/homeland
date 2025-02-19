<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function contact()
    {
        return view('contact');
    }
    public function services()
    {
        //return view('services', ["var1" =>"Value1", "var2" => "Value2"]);
        $services = Service::all();
        return view('services', compact('services'));
    }
    public function about()
    {
        return view('about');
    }
}
