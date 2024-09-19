@extends('layouts.default')


@livewireStyles
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Greenhouse Manager</h1>
    <p class="mb-4">Manage your greenhouse such as edit, delete, or add a greenhouse</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">List of Greenhouse</h6>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGreenhouse" >Add Greenhouse</button>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        @livewire('list-greenhouse')
        </div>
        </div>
    </div>
</div>

@livewireScripts

<div class="modal fade" id="addGreenhouse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Greenhouse</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('storeGreenhouse') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" id="recipient-name" name="name">
                </div>
                <!-- Dropdown for jenis tanaman -->
                <div class="form-group">
                            <label for="jenisTanamanBtn" class="col-form-label">Jenis Tanaman:</label>
                            <div class="dropdown">
                                <button class="dropdown-toggle-van" type="button" id="jenisTanamanBtn" onclick="toggleDropdown()">
                                    Pilih Jenis Tanaman
                                </button>
                                <ul class="dropdown-menu" id="dropdownMenu">
                                    @foreach ($tanaman as $data)
                                    <li><a class="dropdown-item" href="#" onclick="selectItem(event, '{{$data->id}}', '{{$data->name}}')">{{$data->name}}</a></li>
                                    @endforeach
                                </ul>
                                <input type="hidden" name="id_tanaman" id="id_tanaman">
                            </div>
                        </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Add Greenhouse</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
        function toggleDropdown() {
            document.getElementById("dropdownMenu").classList.toggle("show");
        }

        function selectItem(event, id, name) {
            event.preventDefault();
            document.getElementById("jenisTanamanBtn").textContent = name;
            document.getElementById("id_tanaman").value = id;
            document.getElementById("dropdownMenu").classList.remove("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-toggle-van')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>


@endsection
