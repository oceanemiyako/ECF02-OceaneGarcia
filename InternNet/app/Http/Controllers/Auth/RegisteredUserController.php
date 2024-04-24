<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;




class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register-company');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'company_name' => 'required|string|max:255',
            'company_description' => 'required|string',
            'company_localisation' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $company = $user->createCompany([
            'name' => $request->company_name,
            'description' => $request->company_description,
            'localisation' => $request->company_localisation,
        ]);

        if ($user->company_id !== null) {
            return redirect()->route('login')->with('success', 'Votre entreprise a été enregistrée avec succès. Veuillez vous connecter.');
        }

        return redirect()->route('register.company')->with('error', 'Une erreur s\'est produite lors de l\'enregistrement de l\'entreprise. Veuillez réessayer.');
    }




}
