<div class="">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ms-auto">
            <div class="col">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Ajouter une categorie</button>
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Formulaire d'Ajout de Categorie de livre</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="col-md-12 card card-body ">
                                <form action="/categorie" method="post" id="form">

                                    @csrf
                                    <div class="form-group mb-2">
                                        <label for="libelle" class="control-label">Nom de la Categorie</label>
                                        <input type="text" class="form-control" name="libelle" id="libelle"
                                            required />
                                    </div>
                                    <div class="form-group mt-4">
                                        <input type="reset" value="Annuler" class="btn btn-danger mr-2"
                                            onclick="$(this).resetform()">
                                        <input type="submit" value="Enregistrer" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
