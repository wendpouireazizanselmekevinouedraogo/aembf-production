<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\PostController;
use App\Models\University; 
use App\Models\Post; 
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. UNIQUE PAGE PUBLIQUE (Accessible sans compte)
// ==========================================
Route::get('/', function () {
    $posts = Post::latest()->get();
    return view('welcome', compact('posts'));
})->name('home');


// ==========================================
// 2. TOUTES LES AUTRES PAGES (Connexion obligatoire)
// ==========================================
Route::middleware(['auth'])->group(function () {

    // Pages internes du site réservées aux membres connectés
    Route::get('/amicale', function () {
        return view('amicale');
    })->name('amicale');

    Route::get('/activites', function () {
        return view('activites');
    })->name('activites');

    Route::get('/universites', function () {
        $universities = University::latest()->get();
        return view('universites', compact('universities'));
    })->name('universites');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    // Tableau de bord et profil
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // ==========================================
    // 3. ESPACE ADMINISTRATION
    // ==========================================
    Route::prefix('admin')->group(function () {
        
        // Membres
        Route::get('/membres', [AdminController::class, 'index'])->name('admin.membres');
        Route::patch('/membres/{user}/toggle', [AdminController::class, 'toggleValidation'])->name('admin.membres.toggle');

        // Actualités
        Route::get('/actualites', [PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/actualites/creer', [PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/actualites', [PostController::class, 'store'])->name('admin.posts.store');
        Route::get('/actualites/{post}/editer', [PostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/actualites/{post}', [PostController::class, 'update'])->name('admin.posts.update');
        Route::delete('/actualites/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

        // Universités
        Route::get('/universities', [UniversityController::class, 'index'])->name('admin.universities.index');
        Route::get('/universities/create', [UniversityController::class, 'create'])->name('admin.universities.create');
        Route::post('/universities', [UniversityController::class, 'store'])->name('admin.universities.store');
        Route::get('/universities/{university}/edit', [UniversityController::class, 'edit'])->name('admin.universities.edit');
        Route::put('/universities/{university}', [UniversityController::class, 'update'])->name('admin.universities.update');
        Route::delete('/universities/{university}', [UniversityController::class, 'destroy'])->name('admin.universities.destroy');

    });

});

require __DIR__.'/auth.php';