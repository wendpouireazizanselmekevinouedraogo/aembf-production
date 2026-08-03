<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    // Afficher la liste de tous les inscrits
    public function index()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Accès non autorisé.');
        }

        $users = User::latest()->get();
        return view('admin.membres', compact('users'));
    }

    // Valider ou bloquer un membre
    public function toggleValidation(User $user)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Accès non autorisé.');
        }

        $user->is_active_member = !$user->is_active_member;
        $user->save();

        return back()->with('success', 'Le statut du membre a été mis à jour avec succès.');
    }

    // Exporter la liste des membres en Excel
    public function exportUsers()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Accès non autorisé.');
        }

        return Excel::download(new UsersExport, 'membres-aembf.xlsx');
    }
}