<x-app-layout>
    <div class="container d-flex justify-content-center">
        <div class="card shadow mb-4 w-75">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-black-50">Formulaire de Réclamation</h6>
                </div>
            </div>

            <div class="card-body">
                <!-- ═══ ALERTE INFORMATION ═════════════════════════════════════════ -->
                <div class="alert alert-info alert-dismissible fade show mb-4" role="alert">
                    <strong>⚠️ Information importante :</strong>
                    Les informations que vous fournirez dans ce formulaire doivent être exactes et complètes.
                    Assurez-vous que tous les détails sont corrects avant de soumettre votre réclamation.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <!-- ═══ FORMULAIRE DE RÉCLAMATION ══════════════════════════════════ -->
                <section>
                    <form method="post" action="{{ route('reclamation.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <!-- ─── CIVILITÉ ET NOM ─────────────────────────────────────── -->
                        <div class="row">
                            <div class="col-xl-4 col-sm-12">
                                <x-input-label for="civilite" class="form-check-label text-dark" :value="__('Civilité')" />
                                <select id="civilite" name="civilite" class="form-control bg-white text-dark" required>
                                    <option value="">-- Sélectionnez --</option>
                                    <option value="M." {{ old('civilite') == 'M.' ? 'selected' : '' }}>Monsieur</option>
                                    <option value="Mme" {{ old('civilite') == 'Mme' ? 'selected' : '' }}>Madame</option>
                                    <option value="Mlle" {{ old('civilite') == 'Mlle' ? 'selected' : '' }}>Mademoiselle</option>
                                    <option value="Dr" {{ old('civilite') == 'Dr' ? 'selected' : '' }}>Docteur</option>
                                    <option value="Pr" {{ old('civilite') == 'Pr' ? 'selected' : '' }}>Professeur</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('civilite')" />
                            </div>

                            <div class="col-xl-4 col-sm-12">
                                <x-input-label for="nom" class="form-check-label text-dark" :value="__('Nom')" />
                                <x-text-input id="nom" name="nom" type="text"
                                    class="form-control bg-white text-dark" :value="old('nom')" required autofocus
                                    autocomplete="family-name" placeholder="Votre nom" />
                                <x-input-error class="mt-2" :messages="$errors->get('nom')" />
                            </div>

                            <div class="col-xl-4 col-sm-12">
                                <x-input-label for="prenom" class="form-check-label text-dark" :value="__('Prénom')" />
                                <x-text-input id="prenom" name="prenom" type="text"
                                    class="form-control bg-white text-dark" :value="old('prenom')" required autofocus
                                    autocomplete="given-name" placeholder="Votre prénom" />
                                <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                            </div>
                        </div>

                        <!-- ─── EMAIL ET TÉLÉPHONE ──────────────────────────────────── -->
                        <div class="row pt-3">
                            <div class="col-xl-6 col-sm-12">
                                <x-input-label for="email" class="form-check-label text-dark" :value="__('Adresse Email')" />
                                <x-text-input id="email" name="email" type="email"
                                    class="form-control bg-white text-dark" :value="old('email')" required autofocus
                                    autocomplete="email" placeholder="exemple@email.com" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div class="col-xl-6 col-sm-12">
                                <x-input-label for="telephone" class="form-check-label text-dark" :value="__('Numéro de Téléphone')" />
                                <x-text-input id="telephone" name="telephone" type="tel"
                                    class="form-control bg-white text-dark" :value="old('telephone')" required autofocus
                                    autocomplete="tel" placeholder="+33 (0) XX XX XX XX" />
                                <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
                            </div>
                        </div>

                        <!-- ─── OBJET DE LA RÉCLAMATION ─────────────────────────────── -->
                        <div class="pt-3">
                            <x-input-label for="objet" class="form-check-label text-dark" :value="__('Objet de la Réclamation')" />
                            <select id="objet" name="objet" class="form-control bg-white text-dark" required>
                                <option value="">-- Sélectionnez un objet --</option>
                                <option value="Qualite_service" {{ old('objet') == 'Qualite_service' ? 'selected' : '' }}>Qualité du service</option>
                                <option value="Probleme_technique" {{ old('objet') == 'Probleme_technique' ? 'selected' : '' }}>Problème technique</option>
                                <option value="Inscription" {{ old('objet') == 'Inscription' ? 'selected' : '' }}>Problème d'inscription</option>
                                <option value="Accreditation" {{ old('objet') == 'Accreditation' ? 'selected' : '' }}>Accréditation</option>
                                <option value="Certification" {{ old('objet') == 'Certification' ? 'selected' : '' }}>Certificat</option>
                                <option value="Autre" {{ old('objet') == 'Autre' ? 'selected' : '' }}>Autre</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('objet')" />
                        </div>

                        <!-- ─── DESCRIPTION DÉTAILLÉE ──────────────────────────────── -->
                        <div class="pt-3">
                            <x-input-label for="description" class="form-check-label text-dark" :value="__('Description Détaillée de la Réclamation')" />
                            <textarea name="description" id="description" cols="40" rows="8"
                                class="form-control bg-white text-dark" required placeholder="Expliquez en détail votre réclamation...">{{ old('description') }}</textarea>
                            <small class="form-text text-muted d-block mt-2">
                                Veuillez fournir le maximum de détails pour nous aider à traiter votre réclamation rapidement.
                            </small>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <!-- ─── CONSENTEMENT ────────────────────────────────────────── -->
                        <div class="pt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="confirm" name="confirm" required>
                                <label class="form-check-label text-dark" for="confirm">
                                    Je certifie que les informations fournies sont exactes et complètes.
                                </label>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('confirm')" />
                        </div>

                        <!-- ─── BOUTONS D'ACTION ────────────────────────────────────── -->
                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" class="btn btn-primary py-2">
                                <i class="fas fa-paper-plane"></i> Soumettre ma réclamation
                            </button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary py-2">
                                <i class="fas fa-times"></i> Annuler
                            </a>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <br><br>
</x-app-layout>
