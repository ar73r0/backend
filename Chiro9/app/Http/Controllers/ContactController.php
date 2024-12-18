<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form'); // Je formulierweergave
    }

    public function submitForm(Request $request)
    {
        // Valideer de binnenkomende gegevens
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Maak een nieuw contactformulier object aan en sla deze op
        $contactForm = new ContactForm();
        $contactForm->name = $request->input('name');
        $contactForm->email = $request->input('email');
        $contactForm->message = $request->input('message');
        $contactForm->save();

        // Optioneel: Stuur een e-mail naar de admin (je kunt Laravel's Mail facade gebruiken)

        return back()->with('success', 'Je bericht is verzonden!');
    }
}
