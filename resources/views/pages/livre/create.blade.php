<div class="">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ms-auto">
            <div class="col">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Ajout Livre</button>
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Formulaire d'ajout de Livre</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="col-md-12 card card-body">
                                <form action="/livre" method="post" id="form">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="datePublication" class="control-label">Date Publication</label>
                                            <input type="date" class="form-control" name="datePublication" id="datePublication" required />
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="publication" class="control-label">publication de la livre</label>
                                            <input type="text" class="form-control" name="publication" id="publication" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="imageCouverture" class="control-label">imageCouverture du livre</label>
                                            <input type="file" class="form-control" name="imageCouverture" id="imageCouverture" required />
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="description" class="control-label">description du livre</label>
                                            <input type="text" class="form-control" name="description" id="description" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="nombrePage" class="control-label">nombrePage du livre</label>
                                            <input type="text" class="form-control" name="nombrePage" id="nombrePage" required />
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="langue" class="control-label">langue du livre</label>
                                            <input type="text" class="form-control" name="langue" id="langue" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="pdf" class="control-label">pdf du livre</label>
                                            <input type="pdf" class="form-control" name="pdf" id="pdf" required />
                                        </div>
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="isbn" class="control-label">isbn du livre</label>
                                            <input type="text" class="form-control" name="isbn" id="isbn" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-2 col-md-6">
                                            <label for="date" class="control-label">date du livre</label>
                                            <input type="date" class="form-control datepicker" name="date" id="date" required />
                                        </div>
                                        <div class="form-group mb-3 col-md-6">
                                            <label for="categorie_id" class="control-label">Catégorie</label>
                                            <select name="categorie_id" id="categorie_id" class="form-control">
                                                <option value="">Categorie</option>
                                                @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">
                                                    {{ $categorie->libelle }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <input type="reset" value="Annuler" class="btn btn-danger mr-2" onclick="$(this).resetform()">
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