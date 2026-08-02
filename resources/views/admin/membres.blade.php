<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                {{ __('Administration - Gestion des Membres AEM-BF') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-xs bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold py-2 px-4 rounded transition">
                Retour à mon espace
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded text-emerald-800 text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-200">
                <div class="p-6 text-slate-900">
                    <h3 class="text-lg font-bold text-emerald-800 mb-4">Liste des étudiants inscrits</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200 text-sm">
                            <thead class="bg-slate-50 text-slate-700 uppercase text-xs">
                                <tr>
                                    <th class="px-6 py-3 text-left">Nom & Prénom</th>
                                    <th class="px-6 py-3 text-left">Contact / Email</th>
                                    <th class="px-6 py-3 text-left">Établissement & Filière</th>
                                    <th class="px-6 py-3 text-center">Statut Actuel</th>
                                    <th class="px-6 py-3 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                @foreach($users as $u)
                                <tr>
                                    <td class="px-6 py-4 font-medium text-slate-900">
                                        {{ $u->name }}
                                        @if($u->is_admin)
                                            <span class="ml-2 px-2 py-0.5 bg-amber-100 text-amber-800 text-[10px] font-bold rounded">Admin</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-slate-600">
                                        <div>{{ $u->email }}</div>
                                        <div class="text-xs text-slate-500">{{ $u->telephone }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600">
                                        <div class="font-semibold text-slate-800">{{ $u->university }}</div>
                                        <div class="text-xs">{{ $u->field_of_study }} ({{ $u->academic_year }})</div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($u->is_active_member)
                                            <span class="px-3 py-1 bg-emerald-100 text-emerald-800 text-xs font-bold rounded-full">Validé</span>
                                        @else
                                            <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full">En attente</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('admin.membres.toggle', $u->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            @if($u->is_active_member)
                                                <button type="submit" class="text-xs bg-red-50 hover:bg-red-100 text-red-700 font-bold py-1.5 px-3 rounded border border-red-200 transition">
                                                    Révoquer
                                                </button>
                                            @else
                                                <button type="submit" class="text-xs bg-emerald-800 hover:bg-emerald-900 text-white font-bold py-1.5 px-3 rounded shadow-sm transition">
                                                    Valider le compte
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>