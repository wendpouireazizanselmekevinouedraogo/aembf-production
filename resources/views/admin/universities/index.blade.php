<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Universités Membres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold">Liste des écoles et universités partenaires</h3>
                    <a href="{{ route('admin.universities.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                        + Ajouter une université
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
                            <th class="p-3">Logo</th>
                            <th class="p-3">Nom</th>
                            <th class="p-3">Localisation</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($universities as $university)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">
                                @if($university->logo)
                                    <img src="{{ asset('storage/' . $university->logo) }}" alt="Logo" class="w-12 h-10 object-cover rounded">
                                @else
                                    <span class="text-xs text-gray-400">Aucun</span>
                                @endif
                            </td>
                            <td class="p-3 font-medium">{{ $university->name }}</td>
                            <td class="p-3 text-sm text-gray-600">{{ $university->location ?? 'Non spécifié' }}</td>
                            <td class="p-3 flex gap-2">
                                <a href="{{ route('admin.universities.edit', $university->id) }}" class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200 transition">Modifier</a>
                                
                                <form action="{{ route('admin.universities.destroy', $university->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette université ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm bg-red-100 text-red-700 px-3 py-1 rounded hover:bg-red-200 transition">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">Aucune université enregistrée pour le moment.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>