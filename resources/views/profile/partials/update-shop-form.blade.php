@php
    $shop = DB::table('shop_agrees')
        ->where('matricule_shop', $user->name)
        ->first();

@endphp
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Modifier vos informations personnelles') }}
        </p>
    </header>
    @if (!empty($shop))
        $accessManager = DB::table('gestion_accesses')
        ->join('droit_accesses', 'gestion_accesses.droit_access_id', '=', 'droit_accesses.id')
        ->where('user_id', auth()->user()->id)
        ->where('libelle_group', 'Manager')
        ->first();
        @if (!empty($accessManager))
            <form method="post" action="{{ route('profile.update.shop') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')
                <input type="hidden" name="matricule_shop" value="{{ $shop->matricule_shop }}">
                <div>
                    <x-input-label for="nom_shop" :value="__('Nom Shop')" />
                    <x-text-input id="nom_shop" name="nom_shop" type="text" class="mt-1 block w-full"
                        :value="old('nom_shop', $shop->nom_shop)" required autofocus autocomplete="nom_shop" />
                    <x-input-error class="mt-2" :messages="$errors->get('nom_shop')" />
                </div>
                <div>
                    <x-input-label for="responsable" :value="__('Responsable')" />
                    <x-text-input id="responsable" name="responsable" type="text" class="mt-1 block w-full"
                        :value="old('responsable', $shop->responsable)" required autocomplete="responsable" />
                    <x-input-error class="mt-2" :messages="$errors->get('responsable')" />


                </div>
                <div>
                    <x-input-label for="telephone" :value="__('Télephone')" />
                    <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full"
                        :value="old('telephone', $shop->telephone)" required autocomplete="telephone" />
                    <x-input-error class="mt-2" :messages="$errors->get('telephone')" />


                </div>
                <div>
                    <x-input-label for="ville" :value="__('Ville')" />
                    <x-text-input id="ville" name="ville" type="text" class="mt-1 block w-full"
                        :value="old('ville', $shop->ville)" required autocomplete="ville" />
                    <x-input-error class="mt-2" :messages="$errors->get('ville')" />


                </div>
                <div>
                    <x-input-label for="quartier" :value="__('Quartier')" />
                    <x-text-input id="quartier" name="quartier" type="text" class="mt-1 block w-full"
                        :value="old('quartier', $shop->quartier)" required autocomplete="quartier" />
                    <x-input-error class="mt-2" :messages="$errors->get('quartier')" />


                </div>
                <div>
                    <x-input-label for="lieu" :value="__('Lieu')" />
                    <x-text-input id="lieu" name="lieu" type="text" class="mt-1 block w-full"
                        :value="old('lieu', $shop->lieu)" required autocomplete="lieu" />
                    <x-input-error class="mt-2" :messages="$errors->get('lieu')" />


                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600">{{ __('Enregistrer') }}</p>
                    @endif
                </div>
            </form>
        @else
        <div class="flex align-content-between items-center gap-4 text-gray-600">
            <div>
                <h2>Nom du shop : {{ $shop->nom_shop }}</h2>
            </div>
            <div>
                <h2>Name Responsable : {{ $shop->responsable }}</h2>
            </div>

        </div>
        <br>
        <div class="flex items-center gap-4 text-gray-600">
           <div><h2>email : {{ $user->email }}</h2></div> 
           <div>Téléphone : {{ $shop->telephone }}</h2></div> <h2>
        </div>
        <br>
        <div class="flex items-center gap-4 text-gray-600">
            <div>Ville : {{ $shop->ville }}</h2></div> <h2>
            <div><h2>Quartier : {{ $shop->quartier }}</h2></div> 
        </div>
        @endif
    @endif
</section>
