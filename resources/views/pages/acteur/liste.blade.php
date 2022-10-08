@extends('layouts.app')


@section('content')

@if ($errors->any())
@foreach ($errors->all() as $error)
<script>
    Lobibox.notify('error', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        icon: 'bi bi-x-circle',
        delayIndicator: false,
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: "{{ $error }}"
    });
</script>
@endforeach
@endif

@if (Session::has('success'))
<script>
    Lobibox.notify('success', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        icon: 'bi bi-x-circle',
        delayIndicator: false,
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: "{{ Session::get('success') }}"
    });
</script>
@endif


<h6 class="mb-0 text-uppercase">Liste des Acteurs</h6>
<hr />
<div class="content-body">
    <div class="col-md-12">
        <form action="/acteur" method="post" id="form">

            @csrf
            <div class="form-group mb-2">
                <label for="prenom" class="control-label">Prenom de la acteur</label>
                <input type="text" class="form-control" name="prenom" id="prenom" required />
            </div>
            <div class="form-group mb-2">
                <label for="nom" class="control-label">Nom de la acteur</label>
                <input type="text" class="form-control" name="nom" id="nom" required />
            </div>
            <div class="form-group mb-2">
                <label for="fonction" class="control-label">Fonction de l'acteur</label>
                <input type="text" class="form-control" name="fonction" id="fonction" required />
            </div>
            <div class="form-group mb-2">
                <label for="biographie" class="control-label">Biographie de l'acteur</label>
                <input type="text" class="form-control" name="biographie" id="biographie" required />
            </div>
            <div class="form-group mb-2">
                <label for="photo" class="control-label">Profil de l'acteur</label>
                <input type="file" class="form-control" name="photo" id="photo" required />
            </div>
            <div class="form-group mt-4">
                <input type="reset" value="Annuler" class="btn btn-danger mr-2" onclick="$(this).resetform()">
                <input type="submit" value="Enregistrer" class="btn btn-primary">
            </div>

        </form>
    </div>
    
    <div class="col-md-12" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Fonction</th>
                                <th>Biographie</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acteurs as $acteur)
                            <tr>
                                <td>{{ $acteur->id }}</td>
                                <td>{{ $acteur->prenom }}</td>
                                <td>{{ $acteur->nom }}</td>
                                <td>{{ $acteur->fonction }}</td>
                                <td>{{ $acteur->biographie }}</td>
                                <td>{{ $acteur->photo }}</td>
                                <td class="text-center text-primary cursor-event">
                                    {{-- <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title=""
                                                data-bs-original-title="View detail" aria-label="Views"><i
                                                    class="fs-5 bi bi-eye-fill"></i></a> --}}
                                    <span onclick="$(this).edit('{{ $acteur->uuid }}')"><i class="fs-5 bi bi-pencil-fill"></i></span>
                                    <span class="text-danger" onclick="$(this).delete('{{ $acteur->uuid }}')"><i class="fs-5 bi bi-trash-fill"></i></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@section('js')
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $.fn.resetform = function() {
            $("#form").attr("action", "/acteur");
        }

        $.fn.edit = function(id) {
            $.get(document.location.origin + "/acteur/" + id, {
                    json: "json"
                },
                function(data, textStatus, jqXHR) {
                    $("#libelle").val(data.libelle).change();
                    $("#form").attr("action", "/acteur/" + data.uuid);
                },
                "json"
            );
        }

        $.fn.delete = function(id) {
            Swal.fire({
                title: 'Voulez-vous supprimer cette acteur?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = document.location.origin + "/acteur/" + id +
                        "/delete";
                }
            })
        }

    });
</script>
@endsection