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
@include('pages.livre.create')

<h6 class="mb-0 text-uppercase">Liste des livres</h6>
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
                                <th>Date Publication</th>
                                <th>publication</th>
                                <th>imageCouverture</th>
                                <th>description</th>
                                <th>nombrePage</th>
                                <th>langue</th>
                                <th>pdf</th>
                                <th>isbn</th>
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($livres as $livre)
                            <tr>
                                <td>{{ $livre->id }}</td>
                                <td>{{ $livre->datePublication }}</td>
                                <td>{{ $livre->publication }}</td>
                                <td>{{ $livre->imageCouverture }}</td>
                                <td>{{ $livre->description }}</td>
                                <td>{{ $livre->nombrePage }}</td>
                                <td>{{ $livre->langue }}</td>
                                <td>{{ $livre->pdf }}</td>
                                <td>{{ $livre->isbn }}</td>
                                <td>{{ $livre->date }}</td>

                                <td class="text-center text-primary cursor-event">
                                    {{-- <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title=""
                                                data-bs-original-title="View detail" aria-label="Views"><i
                                                    class="fs-5 bi bi-eye-fill"></i></a> --}}
                                    <span onclick="$(this).edit('{{ $livre->uuid }}')"><i class="fs-5 bi bi-pencil-fill"></i></span>
                                    <span class="text-danger" onclick="$(this).delete('{{ $livre->uuid }}')"><i class="fs-5 bi bi-trash-fill"></i></span>
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
            $("#form").attr("action", "/livre");
        }

        $.fn.edit = function(id) {
            $.get(document.location.origin + "/livre/" + id, {
                    json: "json"
                },
                function(data, textStatus, jqXHR) {
                    $("#datePublication").val(data.datePublication).change();
                    $("#publication").val(data.publication).change();
                    $("#imageCouverture").val(data.imageCouverture).change();
                    $("#nombrePage").val(data.nombrePage).change();
                    $("#langue").val(data.langue).change();                         
                    $("#pdf").val(data.pdf).change();
                    $("#isbn").val(data.isbn).change();
                    $("#date").val(data.date).change();
                    $("#categorie_id").val(data.categorie_id).change();
                    $("#form").attr("action", "/livre/" + data.uuid);
                },
                "json"
            );
        }

        $.fn.delete = function(id) {
            Swal.fire({
                title: 'Voulez-vous supprimer cette livre?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = document.location.origin + "/livre" + id +
                        "/delete";
                }
            })
        }

    });
</script>
@endsection