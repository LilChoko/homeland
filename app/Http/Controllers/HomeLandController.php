<?php

namespace App\Http\Controllers;

use App\Models\ContactAgent;
use App\Models\ContactMessage;
use App\Models\Property;
use App\Models\PropertyListingType;
use App\Models\RegisterUser;
use App\Models\Review;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeLandController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(15); // Obtener todas las propiedades
        return view('homeland.index', compact('properties')); // Pasar datos a la vista
    }
    public function property_details(Request $request, $property_id)
    {
        $property = Property::with('reviews')->findOrFail($property_id);
        $reviews = $property->reviews ?? collect([]); // Asegurar que no sea null

        if ($request->isMethod("POST")) {
            if ($request->has('message')) { // Si es un mensaje para el agente
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:50',
                    'phone' => 'required|max:20|regex:/^[0-9+\-() ]+$/',
                    'message' => 'required|string|max:1000',
                ]);

                ContactAgent::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'message' => $request->message,
                ]);

                return back()->with('message', 'Your message has been sent successfully!');
            } elseif ($request->has('description')) { // Si es una reseña
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'description' => 'required|string|max:1000',
                    'rating' => 'required|integer|min:1|max:5',
                ]);

                Review::create([
                    'property_id' => $property_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'description' => $request->description,
                    'rating' => $request->rating,
                ]);

                return back()->with('message', 'Review submitted successfully!');
            }
        }

        return view('homeland.property_details', compact('property', 'reviews'));
    }

    public function contact(Request $request)
    {
        if ($request->isMethod("POST")) {
            $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            // Guardar en la base de datos
            $contact = ContactMessage::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Enviar correo al administrador
            Mail::to('admin@homeland.com')->send(new ContactMail($contact));

            return redirect()->route('contact')->with('message', 'Your message has been sent successfully!');
        }

        return view('homeland.contact');
    }
    public function about()
    {
        return view('homeland.about');
    }
    public function buy()
    {
        $properties = Property::where("offer_type", "For Sale")->paginate(9); // Agregamos paginación
        return view('homeland.buy', compact('properties'));
    }

    public function rent()
    {
        $properties = Property::where("offer_type", "For Rent")->paginate(9); // Agregamos paginación
        return view('homeland.rent', compact('properties'));
    }

    public function properties_listing_type($property_listing_type_id)
    {
        $properties = Property::where('property_listing_type_id', $property_listing_type_id)->paginate(9); // Agregamos paginación
        return view('homeland.index', compact('properties'));
    }
    public function showRegisterForm()
    {
        return view('homeland.register'); // Muestra la vista del formulario
    }

    public function register(Request $request)
    {
        // Validar datos
        $request->validate([
            'username' => 'required|string|max:255|unique:register_users',
            'email' => 'required|string|email|max:255|unique:register_users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Crear usuario
        RegisterUser::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Mensaje de éxito y redirección a login
        return redirect()->route('register')->with('message', 'Your user has been registered successfully!');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validar datos del formulario
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);

            // Buscar usuario en la base de datos
            $user = RegisterUser::where('email', $request->email)->first();

            // Si el usuario existe y la contraseña es correcta
            if ($user && Hash::check($request->password, $user->password)) {
                session()->now('message', 'Your login successfully!');
            } else {
                session()->now('message', 'You are not registered!');
            }
        }

        return view('homeland.login');
    }
}
