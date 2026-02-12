@include('enteteadmin')


<div class="content mt-3">
    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong>Bienvenue dans ton tableau de bord </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br>
    <div class="container">
        <div class="card p-5">
            <form method="POST" action="/confirm-inscription/{{ $id }}" class="w-100  d-flex justify-content-center">
                @csrf
                <div class="input-group w-50 justify-content-center">
                    <div class="form-outline  w-50">
                        <label for="montant" class="form-label">Entrez le montant Payé</label>
                        <input type="number" name="montant" id="montant" required class="form-control" />
                        <br>
                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>



</div>


@include('footeradmin')
