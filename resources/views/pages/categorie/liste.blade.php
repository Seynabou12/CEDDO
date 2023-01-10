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

@include('pages.categorie.create')
<h6 class="mb-0 text-uppercase">Liste des Categories de Livres</h6>
<hr />
<div class="row content-body">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Libellé</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->id }}</td>
                                <td>{{ $categorie->libelle }}</td>
                                <td class="text-center text-primary cursor-event">
                                    <span onclick="$(this).edit('{{ $categorie->id }}')"><i class="fs-5 bi bi-pencil-fill"></i></span>
                                    <span class="text-danger" onclick="$(this).delete('{{ $categorie->uuid }}')"><i class="fs-5 bi bi-trash-fill"></i></span>
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
            $("#form").attr("action", "/categorie");
        }

        $.fn.edit = function(id) {
            $.get(document.location.origin + "/categorie/" + id, {
                    json: "json"
                },
                function(data, textStatus, jqXHR) {
                    $("#libelle").val(data.libelle).change();
                    $("#form").attr("action", "/categorie/" + data.id);
                },
                "json"
            );
        }

        $.fn.delete = function(id) {
            Swal.fire({
                title: 'Voulez-vous supprimer cette categorie?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = document.location.origin + "/categorie/" + id +
                        "/delete";
                }
            })
        }

    });
</script>
@endsection