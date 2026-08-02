<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une publication') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Titre -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Titre de l'actualité *</label>
                        <input type="text" name="title" required class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Ex: Réunion d'information...">
                    </div>

                    <!-- Texte (Optionnel) -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Texte descriptif (Optionnel)</label>
                        <textarea name="content" rows="5" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Rédigez votre article ici..."></textarea>
                    </div>

                    <!-- Image (Optionnel) -->
                    <div class="mb-4 bg-gray-50 p-4 rounded border">
                        <label class="block text-gray-700 font-bold mb-2">Joindre une image (Optionnel)</label>
                        <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" class="w-full">
                        <p class="text-xs text-gray-500 mt-1">Formats acceptés : JPG, PNG. Taille max : 2Mo.</p>
                    </div>

                    <!-- Document PDF (Optionnel) -->
                    <div class="mb-6 bg-gray-50 p-4 rounded border">
                        <label class="block text-gray-700 font-bold mb-2">Joindre un document PDF (Optionnel)</label>
                        <input type="file" name="document" accept=".pdf" class="w-full">
                        <p class="text-xs text-gray-500 mt-1">Format accepté : PDF. Taille max : 10Mo.</p>
                    </div>

                    <!-- Boutons -->
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Annuler</a>
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white font-bold rounded shadow hover:bg-yellow-600">Publier</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>