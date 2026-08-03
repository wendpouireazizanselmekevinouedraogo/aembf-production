<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // Affiche les activités sur la page publique
    public function index()
    {
        $formations = Activity::where('type', 'formation')->get();
        $programmes = Activity::where('type', 'panel')->where('status', 'programme')->get();
        $encours = Activity::where('type', 'panel')->where('status', 'en_cours')->get();

        return view('activites', compact('formations', 'programmes', 'encours'));
    }

    // Inscription automatique d'un utilisateur à une activité
    public function toggleInscription(Activity $activity)
    {
        $user = auth()->user();
        // La méthode toggle ajoute l'ID de l'utilisateur s'il n'y est pas, et le retire s'il y est !
        $user->activities()->toggle($activity->id);

        return back()->with('success', 'Votre statut d\'inscription a été mis à jour avec succès.');
    }

    // Affiche l'interface Admin pour gérer les activités
    public function adminIndex()
    {
        if (!auth()->check() || !auth()->user()->is_admin) abort(403);
        
        $activities = Activity::latest()->get();
        return view('admin.activities', compact('activities'));
    }

    // Sauvegarde une nouvelle activité depuis l'Admin
    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->is_admin) abort(403);

        Activity::create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:formation,panel',
            'status' => 'required|in:programme,en_cours,termine',
        ]));

        return back()->with('success', 'Activité ajoutée avec succès.');
    }

    // Supprime une activité depuis l'Admin
    public function destroy(Activity $activity)
    {
        if (!auth()->check() || !auth()->user()->is_admin) abort(403);
        
        $activity->delete();
        return back()->with('success', 'Activité supprimée avec succès.');
    }
}