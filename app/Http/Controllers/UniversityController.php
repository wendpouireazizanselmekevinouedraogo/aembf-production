<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    // Liste des universités pour l'admin
    public function index()
    {
        $universities = University::latest()->get();
        return view('admin.universities.index', compact('universities'));
    }

    // Formulaire de création
    public function create()
    {
        return view('admin.universities.create');
    }

    // Enregistrement d'une nouvelle université
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable|string',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('universities/logos', 'public');
        }

        University::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'location' => $request->location,
            'logo' => $logoPath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.universities.index')->with('success', 'Université ajoutée avec succès !');
    }

    // Formulaire de modification
    public function edit(University $university)
    {
        return view('admin.universities.edit', compact('university'));
    }

    // Mise à jour
    public function update(Request $request, University $university)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
        ];

        if ($request->hasFile('logo')) {
            if ($university->logo && Storage::disk('public')->exists($university->logo)) {
                Storage::disk('public')->delete($university->logo);
            }
            $data['logo'] = $request->file('logo')->store('universities/logos', 'public');
        }

        $university->update($data);

        return redirect()->route('admin.universities.index')->with('success', 'Université modifiée avec succès !');
    }

    // Suppression
    public function destroy(University $university)
    {
        if ($university->logo && Storage::disk('public')->exists($university->logo)) {
            Storage::disk('public')->delete($university->logo);
        }
        
        $university->delete();

        return redirect()->route('admin.universities.index')->with('success', 'Université supprimée.');
    }
}