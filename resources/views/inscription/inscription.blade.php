<x-app-layout>
    <div class="container d-flex justify-content-center">
        <div class="card shadow mb-4 w-50">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Enregistrer un participant</h6>

                </div>

            </div>

            <div class="card-body">
                <section>
                   

                    <form method="post" action="{{ route('inscription') }}" class="mt-6 space-y-6">
                        @csrf
                        
                        <div>
                            <x-input-label for="titre" :value="__('Civilité')" class="form-check-label text-dark" />
                            <x-text-input id="titre" name="titre" type="text" class="form-control bg-white block text-dark"
                                :value="old('titre')" required autofocus autocomplete="titre" />
                            <x-input-error class="mt-2" :messages="$errors->get('titre')" />
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Name')" class="form-check-label text-dark" />
                            <x-text-input id="name" name="name" type="text" class="form-control bg-white block w-full text-dark"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label for="prenom" class="form-check-label text-dark" :value="__('Prénom')" />
                            <x-text-input id="prenom" name="prenom" type="text" class="form-control bg-white block w-full text-dark"
                                :value="old('prenom')" required autofocus autocomplete="prenom" />
                            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                        </div>

                        <div>
                            
                            <label for="email" class="form-check-label text-dark">Email</label>
                            <x-text-input id="email" name="email" type="email" class="form-control bg-white block w-full text-dark"
                                :value="old('email')" required autocomplete="email" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />


                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" class="btn btn-primary py-2">Enregistrer</button>
                           

                           
                        </div>
                    </form>
                   
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
