<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une Université Membre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('admin.universities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nom de l'université / école *</label>
                        <input type="text" name="name" required class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Ex: 2E, 3I, 2IEM...">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Localisation / Ville</label>
                        <input type="text" name="location" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Ex: Ouagadougou">
                    </div>

                    <div class="mb-4 bg-gray-50 p-4 rounded border">
                        <label class="block text-gray-700 font-bold mb-2">Logo de l'école</label>
                        <input type="file" name="logo" accept="image/png, image/jpeg, image/jpg" class="w-full">
                        <p class="text-xs text-gray-500 mt-1">Formats acceptés : JPG, PNG. Max : 2Mo.</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Description / Présentation</label>
                        <textarea name="description" rows="4" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Courte description de l'école..."></textarea>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.universities.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">Annuler</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-bold rounded shadow hover:bg-blue-700 transition">Enregistrer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>