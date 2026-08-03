<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">Gestion des Formations & Panels</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded text-emerald-800">{{ session('success') }}</div>
        @endif

        <!-- Formulaire d'ajout -->
        <div class="bg-white p-6 shadow-sm sm:rounded-lg border border-slate-200">
            <h3 class="font-bold text-lg mb-4 text-emerald-800">Ajouter une nouvelle activité</h3>
            <form action="{{ route('admin.activities.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Titre</label>
                        <input type="text" name="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            <option value="formation">Module de Formation</option>
                            <option value="panel">Panel</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Statut</label>
                        <select name="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            <option value="programme">Programmé (À venir)</option>
                            <option value="en_cours">En cours</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="bg-emerald-800 text-white px-4 py-2 rounded text-sm font-bold">Enregistrer l'activité</button>
            </form>
        </div>

        <!-- Liste des activités -->
        <div class="bg-white p-6 shadow-sm sm:rounded-lg border border-slate-200">
            <h3 class="font-bold text-lg mb-4">Activités existantes</h3>
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50 text-slate-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Titre</th>
                        <th class="px-4 py-2 text-left">Type & Statut</th>
                        <th class="px-4 py-2 text-left">Inscrits</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($activities as $act)
                        <tr>
                            <td class="px-4 py-3 font-medium">{{ $act->title }}</td>
                            <td class="px-4 py-3 uppercase text-xs">{{ $act->type }} - {{ $act->status }}</td>
                            <td class="px-4 py-3">{{ $act->users->count() }} personne(s)</td>
                            <td class="px-4 py-3 text-center">
                                <form action="{{ route('admin.activities.destroy', $act->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>