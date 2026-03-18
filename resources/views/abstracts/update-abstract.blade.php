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
                    $abstract = DB::table('abstracts')
                    ->where('id', $id)
                    ->first();
                    @endphp

                    @if(!empty($abstract))
                        <form method="post" action="{{ route('update.abstract', ['id' => $id]) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div>
                                <x-input-label for="civilite" class="form-check-label text-dark" :value="__('Civilité')" />
                                <x-text-input id="civilite" name="civilite" type="text" class="form-control bg-white block text-dark"
                                    :value="old('civilite', $abstract->civilite)" required autofocus autocomplete="civilite" />
                                <x-input-error class="mt-2" :messages="$errors->get('civilite')" />
                            </div>
                            <div>
                                <x-input-label for="name" class="form-check-label text-dark" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="form-control bg-white block text-dark"
                                    :value="old('name', $abstract->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            

                            <div>
                                <x-input-label for="email" class="form-check-label text-dark" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="form-control bg-white block text-dark"
                                    :value="old('email', $abstract->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />


                            </div>
                            <div>
                                <x-input-label for="titre" class="form-check-label text-dark" :value="__('Titre')" />
                                <textarea name="titre" id="" cols="30" rows="15" class="form-control bg-white block text-dark">{{  $abstract->titre }}</textarea>
                                
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
