<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ActivityController;
use App\Models\University; 
use App\Models\Post; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::latest()->get();
    return view('welcome', compact('posts'));
})->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/amicale', function () { return view('amicale'); })->name('amicale');
    Route::get('/universites', function () {
        $universities = University::latest()->get();
        return view('universites', compact('universities'));
    })->name('universites');
    Route::get('/contact', function () { return view('contact'); })->name('contact');

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // La SEULE et UNIQUE route pour la page publique des activités :
    Route::get('/activites', [ActivityController::class, 'index'])->name('activites');
    
    // Permet à un utilisateur connecté de s'inscrire ou se désinscrire
    Route::post('/activites/{activity}/toggle', [ActivityController::class, 'toggleInscription'])->name('activites.toggle');


    // Espace Admin
    Route::prefix('admin')->group(function () {
        
        Route::get('/export-users', [AdminController::class, 'exportUsers'])->name('admin.export.users');

        Route::get('/membres', [AdminController::class, 'index'])->name('admin.membres');
        Route::patch('/membres/{user}/toggle', [AdminController::class, 'toggleValidation'])->name('admin.membres.toggle');

        Route::get('/actualites', [PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/actualites/creer', [PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/actualites', [PostController::class, 'store'])->name('admin.posts.store');
        Route::get('/actualites/{post}/editer', [PostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/actualites/{post}', [PostController::class, 'update'])->name('admin.posts.update');
        Route::delete('/actualites/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

        Route::get('/universities', [UniversityController::class, 'index'])->name('admin.universities.index');
        Route::get('/universities/create', [UniversityController::class, 'create'])->name('admin.universities.create');
        Route::post('/universities', [UniversityController::class, 'store'])->name('admin.universities.store');
        Route::get('/universities/{university}/edit', [UniversityController::class, 'edit'])->name('admin.universities.edit');
        Route::put('/universities/{university}', [UniversityController::class, 'update'])->name('admin.universities.update');
        Route::delete('/universities/{university}', [UniversityController::class, 'destroy'])->name('admin.universities.destroy');

        // Gestion Admin des activités (Correction : suppression du "/admin" en trop)
        Route::get('/activites', [ActivityController::class, 'adminIndex'])->name('admin.activities');
        Route::post('/activites', [ActivityController::class, 'store'])->name('admin.activities.store');
        Route::delete('/activites/{activity}', [ActivityController::class, 'destroy'])->name('admin.activities.destroy');
    });

});

require __DIR__.'/auth.php';