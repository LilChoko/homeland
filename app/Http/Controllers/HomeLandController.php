<?php

namespace App\Http\Controllers;

use App\Models\ContactAgent;
use App\Models\Property;
use App\Models\PropertyListingType;
use Illuminate\Http\Request;

class HomeLandController extends Controller
{
    public function index()
    {
        $properties = Property::all(); // Obtener todas las propiedades
        return view('homeland.index', compact('properties')); // Pasar datos a la vista
    }
    public function property_details(Request $request, $property_id)
    {
        if ($request->isMethod("POST"))
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:50',
                'phone' => 'required|max:20|regex:/^[0-9+\-() ]+$/',
                'message' => 'required|string|max:1000',
            ],[
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'phone.regex' => 'The phone number format is invalid.',
                'message.required' => 'The message field is required.',

            ]);

            $contact= new ContactAgent(); // Crear una nueva instancia de ContactAgent
            $contact->name = $request->input("name"); // Asignar el nombre
            $contact->email = $request->input("email"); // Asignar el correo electrónico
            $contact->phone = $request->input("phone"); // Asignar el teléfono
            $contact->message = $request->input("message"); // Asignar el mensaje
            $contact->save(); // Guardar el contacto del agente
            session()->now('message', 'Your message has been sent successfully!'); // Mostrar mensaje de éxito
        }
        $property = Property::find($property_id); // Buscar una propiedad por ID
        return view('homeland.property_details', compact('property')); // Pasar datos a la vista
    }
    public function contact()
    {
        return view('homeland.contact');
    }
    public function about()
    {
        return view('homeland.about');
    }
    public function buy()
    {
        $properties = Property::where("offer_type", "For Sale");
        return view('homeland.buy');
    }
    public function rent()
    {
        $properties = Property::where("offer_type", "For Sale");
        return view('homeland.rent');
    }

    public function properties_listing_type($property_listing_type_id)
    {
        $properties = PropertyListingType::find($property_listing_type_id)->properties;
        return view('homeland.index', compact('properties'));
    }
}
