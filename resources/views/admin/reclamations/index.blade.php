@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- ─── HEADER ───────────────────────────────────────────────────────────── -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">📋 Gestion des Réclamations</h1>
        <p class="text-gray-600">
            Total: <span class="font-semibold">{{ $reclamations->total() }}</span> réclamation(s)
        </p>
    </div>

    <!-- ─── FILTRES (OPTIONNEL) ──────────────────────────────────────────────── -->
    <div class="mb-6 bg-white p-6 rounded-lg shadow-sm">
        <form action="{{ route('reclamations.index') }}" method="GET" class="flex gap-4 items-end">
            <div class="flex-1">
                <label for="statut" class="block text-sm font-medium text-gray-700 mb-2">
                    Filtrer par statut
                </label>
                <select name="statut" id="statut" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Tous les statuts</option>
                    <option value="En attente" {{ request('statut') === 'En attente' ? 'selected' : '' }}>En attente</option>
                    <option value="En traitement" {{ request('statut') === 'En traitement' ? 'selected' : '' }}>En traitement</option>
                    <option value="Traitée" {{ request('statut') === 'Traitée' ? 'selected' : '' }}>Traitée</option>
                    <option value="Fermée" {{ request('statut') === 'Fermée' ? 'selected' : '' }}>Fermée</option>
                </select>
            </div>
            <div class="flex-1">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                    Rechercher
                </label>
                <input type="text" name="search" id="search" placeholder="Email, nom, prénom..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    value="{{ request('search') }}">
            </div>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                🔍 Rechercher
            </button>
        </form>
    </div>

    <!-- ─── TABLEAU DES RÉCLAMATIONS ─────────────────────────────────────────── -->
    @if($reclamations->count() > 0)
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            N° Dossier
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Réclamant
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Objet
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Statut
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($reclamations as $reclamation)
                    <tr class="hover:bg-gray-50 transition">
                        <!-- N° Dossier -->
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            #{{ $reclamation->id }}
                        </td>

                        <!-- Réclamant -->
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $reclamation->civilite }} {{ $reclamation->prenom }} {{ $reclamation->nom }}
                        </td>

                        <!-- Email -->
                        <td class="px-6 py-4 text-sm text-blue-600">
                            <a href="mailto:{{ $reclamation->email }}" class="hover:underline">
                                {{ $reclamation->email }}
                            </a>
                        </td>

                        <!-- Objet -->
                        <td class="px-6 py-4 text-sm text-gray-700">
                            @php
                                $objets = [
                                    'Qualite_service' => 'Qualité du service',
                                    'Probleme_technique' => 'Problème technique',
                                    'Inscription' => 'Inscription',
                                    'Accreditation' => 'Accréditation',
                                    'Certification' => 'Certification',
                                    'Autre' => 'Autre',
                                ];
                            @endphp
                            {{ $objets[$reclamation->objet] ?? $reclamation->objet }}
                        </td>

                        <!-- Statut -->
                        <td class="px-6 py-4 text-sm">
                            @php
                                $statusColors = [
                                    'En attente' => 'bg-yellow-100 text-yellow-800',
                                    'En traitement' => 'bg-blue-100 text-blue-800',
                                    'Traitée' => 'bg-green-100 text-green-800',
                                    'Fermée' => 'bg-gray-100 text-gray-800',
                                ];
                                $color = $statusColors[$reclamation->statut] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $color }}">
                                {{ $reclamation->statut }}
                            </span>
                        </td>

                        <!-- Date -->
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $reclamation->created_at->locale('fr')->format('d M Y') }}
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4 text-sm space-x-2">
                            <a href="{{ route('reclamations.show', $reclamation->id) }}" 
                               class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 transition">
                                👁️ Voir
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ─── PAGINATION ──────────────────────────────────────────────────────── -->
        <div class="mt-6">
            {{ $reclamations->links() }}
        </div>
    @else
        <!-- MESSAGE SI AUCUNE RÉCLAMATION -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-8 text-center">
            <p class="text-gray-600 text-lg">
                ℹ️ Aucune réclamation trouvée pour les critères actuels.
            </p>
        </div>
    @endif
</div>
@endsection
