@extends('layouts.app')

@section('css')
<link href="/assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
<link href="/assets/plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
<link href="/assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
<link rel="stylesheet" href="/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection

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
@include('pages.nouveaute.create')

<h6 class="mb-0 text-uppercase">Liste des nouveautés de livre</h6>
<hr />
<div class="content-body">
    <div class="col-md-12" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Titre du Livre</th>
                                <th>Contexte du Livre</th>
                                <th>Nombre de Page </th>
                                <th>Image de Couverture</th>
                                <th>Nom deAuteur</th>
                                <th>Biographie de l'Auteur</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nouveautes as $nouveaute)
                            <tr>
                                <td>{{ $nouveaute->id }}</td>
                                <td>{{ $nouveaute->titre }}</td>
                                <td>{{ $nouveaute->contexte }}</td>
                                <td>{{ $nouveaute->nombrePage }}</td>
                                <td>{{ $nouveaute->imageCouverture }}</td>
                                <td>{{ $nouveaute->nomAuteur }}</td>
                                <td>{{ $nouveaute->biographie }}</td>

                                <td class="text-center text-primary cursor-event">
                                    <span onclick="$(this).edit('{{ $nouveaute->uuid }}')"><i class="fs-5 bi bi-pencil-fill"></i></span>
                                    <span class="text-danger" onclick="$(this).delete('{{ $nouveaute->uuid }}')"><i class="fs-5 bi bi-trash-fill"></i></span>
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
<script src="/assets/plugins/datetimepicker/js/legacy.js"></script>
<script src="/assets/plugins/datetimepicker/js/picker.js"></script>
<script src="/assets/plugins/datetimepicker/js/picker.time.js"></script>
<script src="/assets/plugins/datetimepicker/js/picker.date.js"></script>
<script src="/assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
<script src="/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
<script src="/assets/js/form-date-time-pickes.js"></script>
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $.fn.resetform = function() {
            $("#form").attr("action", "/nouveaute");
        }

        $.fn.edit = function(id) {
            $.get(document.location.origin + "/nouveaute/" + id, {
                    json: "json"
                },
                function(data, textStatus, jqXHR) {
                    $("#titre").val(data.titre).change();
                    $("#contexte").val(data.contexte).change();
                    $("#nombrePage").val(data.nombrePage).change();
                    $("#imageCouverture").val(data.imageCouverture).change();
                    $("#nomAuteur").val(data.nomAuteur).change();                         
                    $("#biographie").val(data.biographie).change();
                    $("#form").attr("action", "/nouveaute/" + data.uuid);
                },
                "json"
            );
        }

        $.fn.delete = function(id) {
            Swal.fire({
                title: 'Voulez-vous supprimer cette nouveaute?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = document.location.origin + "/nouveaute/" + id +
                        "/delete";
                }
            })
        }

    });
</script>
@endsection