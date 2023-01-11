<div class="">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ms-auto">
            <div class="col">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Ajout Livre</button>
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Formulaire d'ajout de Nouveau Livres</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="col-md-12 card card-body">
                                <form action="/nouveaute" method="post" id="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="titre" class="control-label">Titre du Livre</label>
                                            <input type="date" class="form-control" name="titre" id="titre"
                                                required />
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="contexte" class="control-label">contexte du Livre</label>
                                            <input type="text" class="form-control" name="contexte" id="contexte"
                                                required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="nombrePage" class="control-label">nombre de Page du
                                                livre</label>
                                            <input type="text" class="form-control" name="nombrePage" id="nombrePage"
                                                required />
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="imageCouverture" class="control-label">image de Couverture du
                                                livre</label>
                                            <input type="file" class="form-control" name="imageCouverture"
                                                id="imageCouverture" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="nomAuteur" class="control-label">Nom de l'Auteur</label>
                                            <input type="text" class="form-control" name="nomAuteur" id="nomAuteur"
                                                required />
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="biographie" class="control-label">Biographie du l'Auteur</label>
                                            <input type="text" class="form-control" name="biographie" id="biographie" required />
                                        </div>
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
