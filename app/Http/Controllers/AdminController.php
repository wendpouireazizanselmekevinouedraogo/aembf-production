<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Afficher la liste de tous les inscrits
    public function index()
    {
        // Vérification que l'utilisateur connecté est bien admin
        if (!auth()->user()->is_admin) {
            abort(403, 'Accès non autorisé.');
        }

        $users = User::latest()->get();
        return view('admin.membres', compact('users'));
    }

    // Valider ou bloquer un membre
    public function toggleValidation(User $user)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Accès non autorisé.');
        }

        // Inverse le statut actuel (true devient false, et vice-versa)
        $user->is_active_member = !$user->is_active_member;
        $user->save();

        return back()->with('success', 'Le statut du membre a été mis à jour avec succès.');
    }

    public function __construct()
{
    // Bloque automatiquement l'accès si l'utilisateur connecté n'est pas admin
    $this->middleware(function ($request, $next) {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Accès non autorisé.');
        }
        return $next($request);
    });
}
}