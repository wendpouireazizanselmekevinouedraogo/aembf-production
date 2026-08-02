<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Actualités') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold">Toutes les publications</h3>
                    <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                        + Nouvelle Publication
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="p-3">Titre</th>
                            <th class="p-3">Date</th>
                            <th class="p-3">Fichiers joints</th>
                            <th class="p-3">Actions</th> <!-- Ajout de la colonne Actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3 font-medium">{{ $post->title }}</td>
                            <td class="p-3">{{ $post->created_at->format('d/m/Y') }}</td>
                            <td class="p-3 text-sm">
                                @if($post->image) <span class="text-blue-500">🖼️ Image</span> @endif
                                @if($post->document) <span class="text-red-500 ml-2">📄 PDF</span> @endif
                            </td>
                            
                            <!-- Les boutons Modifier et Supprimer -->
                            <td class="p-3 flex gap-2">
                                <!-- Bouton Modifier -->
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200 transition">
                                    Modifier
                                </a>
                                
                                <!-- Bouton Supprimer -->
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette publication ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm bg-red-100 text-red-700 px-3 py-1 rounded hover:bg-red-200 transition">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>