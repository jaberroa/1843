<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:254'],
            'interest' => ['required', 'in:Software a medida,Integración de sistemas,Datos y automatización,AGPOS,Dentaris'],
            'message' => ['required', 'string', 'min:20', 'max:4000'],
            'consent' => ['accepted'],
            'website' => ['nullable', 'max:0'],
        ], [
            'name.required' => 'Indica tu nombre.',
            'name.max' => 'El nombre no puede superar 120 caracteres.',
            'email.required' => 'Indica tu correo electrónico.',
            'email.email' => 'Escribe un correo electrónico válido.',
            'email.max' => 'El correo electrónico es demasiado largo.',
            'interest.required' => 'Selecciona una opción de interés.',
            'interest.in' => 'Selecciona una de las opciones disponibles.',
            'message.required' => 'Cuéntanos sobre tu proyecto.',
            'message.min' => 'El mensaje debe tener al menos 20 caracteres.',
            'message.max' => 'El mensaje no puede superar 4,000 caracteres.',
            'consent.accepted' => 'Necesitamos tu autorización para guardar y responder esta consulta.',
            'website.max' => 'No se pudo validar el envío. Deja vacío el campo de sitio web.',
        ]);

        try {
            DB::table('contact_requests')->insert([
                'name' => $data['name'], 'email' => $data['email'],
                'interest' => $data['interest'], 'message' => $data['message'],
                'consented_at' => now(), 'created_at' => now(), 'updated_at' => now(),
            ]);
        } catch (Throwable $exception) {
            Log::error('Contact request could not be saved.', ['exception' => get_class($exception)]);
            return back()->withInput()->withErrors(['contact' => 'No pudimos guardar tu solicitud. Inténtalo de nuevo en unos minutos.'])->withFragment('contacto');
        }

        return redirect()->route('home')->with('contact_success', 'Recibimos tu solicitud. Gracias por contarnos tu proyecto; nuestro equipo podrá revisar los detalles y contactarte.')->withFragment('contacto');
    }
}
