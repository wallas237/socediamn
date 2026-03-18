<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Information sur le profil') }}
        </p>
    </header>
    <br>
    @php
        $shop = DB::table('shop_agrees')
            ->where('matricule_shop', $user->name)
            ->first();

    @endphp
    @if (!empty($shop))
        <div class="flex items-center gap-4 text-gray-600">
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
    @else
        <div class="flex items-center gap-4 text-gray-600">
            <h2>Name : {{ $user->name }}</h2>
        </div>
        br
        <div class="flex items-center gap-4 text-gray-600">
            <h2>email : {{ $user->email }}</h2>
        </div>
    @endif

</section>
