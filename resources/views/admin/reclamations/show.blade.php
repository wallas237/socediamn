@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    
    <!-- ─── BOUTON RETOUR ────────────────────────────────────────────────────── -->
    <div class="mb-6">
        <a href="{{ route('reclamations.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            ← Retour à la liste
        </a>
    </div>

    <!-- ─── EN-TÊTE AVEC NUMÉRO ET STATUT ────────────────────────────────────── -->
    <div class="bg-white rounded-lg shadow-sm p-8 mb-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                    📋 Dossier #{{ $reclamation->id }}
                </h1>
                <p class="text-gray-600">
                    Reçu le {{ $reclamation->created_at->locale('fr')->format('j F Y à H:i') }}
                </p>
            </div>
            
            <!-- BADGE STATUT -->
            <div>
                @php
                    $statusColors = [
                        'En attente' => 'bg-yellow-100 text-yellow-800',
                        'En traitement' => 'bg-blue-100 text-blue-800',
                        'Traitée' => 'bg-green-100 text-green-800',
                        'Fermée' => 'bg-gray-100 text-gray-800',
                    ];
                    $color = $statusColors[$reclamation->statut] ?? 'bg-gray-100';
                @endphp
                <span class="px-4 py-2 rounded-lg font-semibold text-lg {{ $color }}">
                    {{ $reclamation->statut }}
                </span>
            </div>
        </div>
    </div>

    <!-- ─── INFORMATIONS DU RÉCLAMANT ────────────────────────────────────────── -->
    <div class="bg-white rounded-lg shadow-sm p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">👤 Informations du Réclamant</h2>
        
        <div class="grid grid-cols-2 gap-6">
            <!-- Civilité + Nom + Prénom -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Civilité</label>
                <p class="text-gray-900 font-semibold">{{ $reclamation->civilite }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                <p class="text-gray-900 font-semibold">{{ $reclamation->prenom }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                <p class="text-gray-900 font-semibold">{{ $reclamation->nom }}</p>
            </div>
            
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <a href="mailto:{{ $reclamation->email }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                    {{ $reclamation->email }}
                </a>
            </div>
            
            <!-- Téléphone -->
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                <a href="tel:{{ $reclamation->telephone }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                    {{ $reclamation->telephone }}
                </a>
            </div>
        </div>
    </div>

    <!-- ─── DÉTAILS DE LA RÉCLAMATION ────────────────────────────────────────── -->
    <div class="bg-white rounded-lg shadow-sm p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">📝 Détails de la Réclamation</h2>
        
        <!-- Objet -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Objet</label>
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                @php
                    $objets = [
                        'Qualite_service' => '⭐ Qualité du service',
                        'Probleme_technique' => '🔧 Problème technique',
                        'Inscription' => '📝 Inscription',
                        'Accreditation' => '🎖️ Accréditation',
                        'Certification' => '📜 Certification',
                        'Autre' => '❓ Autre',
                    ];
                @endphp
                <p class="text-gray-900 font-semibold text-lg">
                    {{ $objets[$reclamation->objet] ?? $reclamation->objet }}
                </p>
            </div>
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 min-h-[150px]">
                <p class="text-gray-800 whitespace-pre-wrap leading-relaxed">
                    {{ $reclamation->description }}
                </p>
            </div>
        </div>
    </div>

    <!-- ─── NOTES ADMINISTRATIVES ────────────────────────────────────────────── -->
    <div class="bg-white rounded-lg shadow-sm p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">📌 Notes Administratives</h2>
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
            <textarea rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $reclamation->notes_admin ?? '(Aucune note)' }}</textarea>
        </div>

        @if($reclamation->date_traitement)
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Date de traitement</label>
            <p class="text-gray-900 font-semibold">
                {{ $reclamation->date_traitement->locale('fr')->format('j F Y à H:i') }}
            </p>
        </div>
        @endif
    </div>

    <!-- ─── FORMULAIRE MISE À JOUR STATUT ────────────────────────────────────── -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-8">
        <h2 class="text-xl font-bold text-gray-900 mb-4">🔄 Mettre à jour le statut</h2>
        
        <form action="{{ route('reclamations.updateStatus', $reclamation->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')
            
            <div>
                <label for="statut" class="block text-sm font-medium text-gray-700 mb-2">
                    Nouveau statut
                </label>
                <select name="statut" id="statut" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="En attente" {{ $reclamation->statut === 'En attente' ? 'selected' : '' }}>
                        ⏳ En attente
                    </option>
                    <option value="En traitement" {{ $reclamation->statut === 'En traitement' ? 'selected' : '' }}>
                        🔄 En traitement
                    </option>
                    <option value="Traitée" {{ $reclamation->statut === 'Traitée' ? 'selected' : '' }}>
                        ✅ Traitée
                    </option>
                    <option value="Fermée" {{ $reclamation->statut === 'Fermée' ? 'selected' : '' }}>
                        🔒 Fermée
                    </option>
                </select>
            </div>

            <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                💾 Enregistrer les modifications
            </button>
        </form>
    </div>

    <!-- ─── ZONE D'ALERTE SUCCÈS ─────────────────────────────────────────────── -->
    @if(session('success'))
    <div class="mt-6 bg-green-50 border border-green-200 text-green-800 p-4 rounded-lg">
        ✅ {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="mt-6 bg-red-50 border border-red-200 text-red-800 p-4 rounded-lg">
        ❌ Une erreur s'est produite lors de la mise à jour.
    </div>
    @endif
</div>
@endsection
