<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    // Exporter la liste des membres en CSV (pour Google Sheets et Excel)
    public function exportUsers()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Accès non autorisé.');
        }

        $fileName = 'membres-aembf.csv';
        $users = User::all();

        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');
            
            // BOM UTF-8 pour le bon affichage des accents dans Excel et Google Sheets
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Entêtes des colonnes
            fputcsv($file, ['ID', 'Nom', 'Email', 'Téléphone', 'Statut', 'Date d\'inscription'], ';');

            // Données
            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->phone ?? 'N/A',
                    $user->is_active_member ? 'Actif' : 'Inactif',
                    $user->created_at
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}