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
}
