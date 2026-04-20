<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\OpeningHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $openingHours = OpeningHour::orderBy('sort_order')->get();

        $seo = [
            'title' => 'Contact – Factory & Co Aéroville | Tremblay-en-France',
            'description' => 'Contactez Factory & Co à Aéroville. Adresse : 30 Rue des Buissons, CC Westfield Aéroville, 93290 Tremblay-en-France. Nous sommes ouverts 7j/7 pour vos questions et réservations.',
            'keywords' => 'contact factory and co tremblay-en-france, adresse factory co aéroville, téléphone restaurant tremblay-en-france, roissy, aéroville',
            'canonical' => route('contact'),
        ];

        return view('pages.contact', compact('openingHours', 'seo'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'sujet' => 'required|string|max:100',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'prenom.required' => 'Votre prénom est requis.',
            'nom.required' => 'Votre nom est requis.',
            'email.required' => 'Votre adresse e-mail est requise.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'sujet.required' => 'Veuillez choisir un sujet.',
            'message.required' => 'Votre message est requis.',
            'message.min' => 'Votre message doit contenir au moins 10 caractères.',
        ]);

        try {
            Mail::to('contact@factoryandco.com')->send(new ContactMail($validated));
        } catch (\Throwable $e) {
            \Log::error('Contact form email error: '.$e->getMessage());

            return redirect()->route('contact')
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi. Merci de réessayer ou de nous appeler au 01 74 25 78 52.');
        }

        return redirect()->route('contact')
            ->with('success', 'Votre message a bien été envoyé ! Nous vous répondrons sous 4 heures.');
    }
}
