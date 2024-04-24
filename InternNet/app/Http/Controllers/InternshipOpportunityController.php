<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternshipOpportunity;

class InternshipOpportunityController extends Controller
{
    public function index()
    {
        $internships = InternshipOpportunity::all();
        return view('internship.index', compact('internships'));
    }

    public function show($id)
    {
        $internship = InternshipOpportunity::findOrFail($id);
        return view('internship.show', compact('internship'));
    }

    public function create()
    {
        return view('internship.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'email' => 'required|email',
        ]);

        $internship = InternshipOpportunity::create([
            'title' => $request->title,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'email' => $request->email,
        ]);

        return redirect()->route('internship.show', $internship->id)->with('success', 'Opportunité de stage créée avec succès');
    }

    public function edit($id)
    {
        $internship = InternshipOpportunity::findOrFail($id);
        if (auth()->check() && auth()->user()->id === $internship->user_id) {
            return view('internship.edit', compact('internship'));
        } else {
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour modifier cette annonce.');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'email' => 'required|email',
        ]);

        $internship = InternshipOpportunity::findOrFail($id);

        $internship->update([
            'title' => $request->title,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'email' => $request->email,
        ]);

        return redirect()->route('internship.show', $internship->id)->with('success', 'Opportunité de stage mise à jour avec succès');
    }


    public function destroy($id)
    {
        $internship = InternshipOpportunity::findOrFail($id);
        if (auth()->check() && auth()->user()->id === $internship->user_id) {
            $internship->delete();
            return redirect()->route('internship.index')->with('success', 'Opportunité de stage supprimée avec succès');
        } else {
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour supprimer cette annonce.');
        }
    }

}
