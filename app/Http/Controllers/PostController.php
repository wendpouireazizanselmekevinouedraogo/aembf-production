<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Affiche la liste des actualités
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    // Affiche le formulaire pour créer une actualité
    public function create()
    {
        return view('admin.posts.create');
    }

    // Sauvegarde l'actualité dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable', 
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', 
            'document' => 'nullable|mimes:pdf|max:10240',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('actualites/images', 'public');
        }

        $documentPath = null;
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('actualites/documents', 'public');
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->content,
            'image' => $imagePath,
            'document' => $documentPath,
            'user_id' => Auth::id(),
        ]);
        
        return redirect()->route('admin.posts.index')->with('success', 'Publication créée avec succès !');
    }

    // Affiche le formulaire de modification
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    // Met à jour la publication
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'document' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];

        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('actualites/images', 'public');
        }

        if ($request->hasFile('document')) {
            if ($post->document && Storage::disk('public')->exists($post->document)) {
                Storage::disk('public')->delete($post->document);
            }
            $data['document'] = $request->file('document')->store('actualites/documents', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Publication modifiée avec succès !');
    }

    // Supprime la publication
    public function destroy(Post $post)
    {
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        if ($post->document && Storage::disk('public')->exists($post->document)) {
            Storage::disk('public')->delete($post->document);
        }

        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Publication supprimée définitivement.');
    }
}