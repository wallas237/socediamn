<x-app-layout>
    <div class="container">
        <div class="card shadow mb-4 w-50">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Modifier les informations</h6>

                </div>

            </div>

            <div class="card-body">
                <section>
                    @php
                    $participant = DB::table('inscriptions')
                    ->where('id', $id)
                    ->first();
                    @endphp

                    @if(!empty($participant))

                    <form method="post" action="{{ route('update.participant', ['id' => $id]) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        <div>
                            <x-input-label for="titre" :value="__('Civilité')" class="form-check-label text-dark" />
                            <x-text-input id="titre" name="titre" type="text" class="form-control bg-white block text-dark"
                                :value="old('titre', $participant->titre)" required autofocus autocomplete="titre" />
                            <x-input-error class="mt-2" :messages="$errors->get('titre')" />
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Name')" class="form-check-label text-dark" />
                            <x-text-input id="name" name="name" type="text" class="form-control bg-white block w-full text-dark"
                                :value="old('name', $participant->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label for="prenom" class="form-check-label text-dark" :value="__('Prénom')" />
                            <x-text-input id="prenom" name="prenom" type="text" class="form-control bg-white block w-full text-dark"
                                :value="old('prenom', $participant->prenom)" required autofocus autocomplete="prenom" />
                            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                        </div>

                        <div>
                            
                            <label for="email" class="form-check-label text-dark">Email</label>
                            <x-text-input id="email" name="email" type="email" class="form-control bg-white block w-full text-dark"
                                :value="old('email', $participant->email)" required autocomplete="email" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />


                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" class="btn btn-primary py-2">Enregistrer</button>
                           

                           
                        </div>
                    </form>
                    @else

                    <h4>Aucune correnpondance</h4>

                    @endif
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
