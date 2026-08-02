<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la publication') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Titre -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Titre de l'actualité *</label>
                        <input type="text" name="title" value="{{ $post->title }}" required class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <!-- Texte -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Texte descriptif</label>
                        <textarea name="content" rows="5" class="w-full border-gray-300 rounded-md shadow-sm">{{ $post->content }}</textarea>
                    </div>

                    <!-- Image actuelle et Remplacement -->
                    <div class="mb-4 bg-gray-50 p-4 rounded border">
                        <label class="block text-gray-700 font-bold mb-2">Image illustrative</label>
                        @if($post->image)
                            <div class="mb-2 flex items-center gap-4">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Aperçu" class="w-24 h-16 object-cover rounded shadow">
                                <span class="text-xs text-gray-500">Image actuelle</span>
                            </div>
                        @endif
                        <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" class="w-full">
                        <p class="text-xs text-gray-500 mt-1">Laisser vide si vous ne souhaitez pas changer l'image.</p>
                    </div>

                    <!-- Document PDF actuel et Remplacement -->
                    <div class="mb-6 bg-gray-50 p-4 rounded border">
                        <label class="block text-gray-700 font-bold mb-2">Document PDF joint</label>
                        @if($post->document)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $post->document) }}" target="_blank" class="text-sm text-red-600 underline">📄 Voir le PDF actuel</a>
                            </div>
                        @endif
                        <input type="file" name="document" accept=".pdf" class="w-full">
                        <p class="text-xs text-gray-500 mt-1">Laisser vide si vous ne souhaitez pas changer le PDF.</p>
                    </div>

                    <!-- Boutons -->
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">Annuler</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-bold rounded shadow hover:bg-blue-700 transition">Enregistrer les modifications</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>