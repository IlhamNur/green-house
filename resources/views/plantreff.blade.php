@extends('layouts.default')

@section('content')

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Plant Threshold Refference</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="plantReff" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center align-middle">
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Latin Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td class="text-center align-middle">
                            <img src="{{ asset($data->picture) }}" alt="{{ $data->name }}" style="width: 100px; height: auto;">
                        </td>
                        <td class="text-center">{{$data->name}}</td>
                        <td class="text-center">{{$data->latin_name}}</td>
                        <td class="text-center">
                            <button type="submit" class="btn btn-outline-primary" data-toggle="modal" data-target="#showData{{$data->id}}">
                            <i class="bi bi-eye"></i>
                            </button>       
                            <form action="{{ route('addTanamanfromAdmin', $data -> id) }}" method="post" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">
                                <i class="bi bi-copy"></i>
                                </button>        
                            </form> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($datas as $data)
<!-- show threshold data -->

<div class="modal fade" id="showData{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $data->name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <ol class="list-group list-group-numbered">
                <li class="list-group-item"><i class="bi bi-dot"></i> <strong>Temperature Threshold : </strong> {{ $data->temperature }}&deg;C</li>
                <li class="list-group-item"><i class="bi bi-dot"></i> <strong>Humidity Threshold : </strong> {{ $data->humidity }}%</li>
                <li class="list-group-item"><i class="bi bi-dot"></i> <strong>Light Threshold : </strong> {{ $data->light_intensity }}lux</li>
                <li class="list-group-item"><i class="bi bi-dot"></i> <strong>Soil Max Threshold : </strong> {{ $data->soil_max }}cm</li>
                <li class="list-group-item"><i class="bi bi-dot"></i> <strong>Soil Min Threshold : </strong> {{ $data->soil_min }}cm</li>
            </ol>
        </div>
        </div>
    </div>
</div>
@endforeach

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>


<script>
    $(document).ready( function () {
  var table = $('#plantReff').DataTable( {
    pageLength : 4,
    lengthMenu: [[4, 10, 20, -1], [4, 10, 20, 'all']]
  } )
} );
</script>


@endsection
