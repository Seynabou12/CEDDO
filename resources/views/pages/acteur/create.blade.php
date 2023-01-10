<div class="">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ms-auto">
            <div class="col">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Ajout Acteur</button>
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un Auteur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="col-md-12 card card-body">
                                <form action="/acteur" method="post" id="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="prenom" class="control-label">Prenom de la acteur</label>
                                            <input type="text" class="form-control" name="prenom" id="prenom"
                                                required />
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="nom" class="control-label">Nom de la acteur</label>
                                            <input type="text" class="form-control" name="nom" id="nom"
                                                required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="fonction" class="control-label">Fonction de l'acteur</label>
                                            <input type="text" class="form-control" name="fonction" id="fonction"
                                                required />
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="biographie" class="control-label">Biographie de l'acteur</label>
                                            <input type="text" class="form-control" name="biographie" id="biographie"
                                                required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="photo" class="control-label">Profil de l'acteur</label>
                                            <input type="file" class="form-file-input form-control" id="photo"
                                                placeholder="Entrer votre photo.." required="" name="photo">
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
