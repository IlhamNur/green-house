@extends('layouts.default')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h2 class="m-0 font-weight-bold text-primary">Period List</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addperiod" >New Period</button>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Plant</th>
                    <th>Planting Date</th>
                    <th>Harvest Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td class="w-25">{{$datas->nama}}</td>
                    <td>{{$datas->tanam}}</td>
                    <td>{{$datas->panen}}</td>
                    <td class="w-25">
                        @if ($datas->done == 0)
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#editperiod{{$datas->id}}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <form action="{{ route('endPeriod', $datas->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="bi bi-stop"></i>
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('ExportData', $datas->id) }}" method="get" style="display:inline;">
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="bi bi-download"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                
                <div class="modal fade" id="editperiod{{$datas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Period</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('editPeriod', $datas->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <!-- Dropdown for jenis tanaman -->
                                <div class="form-group">
                                    <label for="jenisTanamanBtnedit" class="col-form-label">Jenis Tanaman:</label>
                                    <div class="dropdown">
                                    <button class="dropdown-toggle-edit" type="button" id="editJenisTanamanBtn{{$datas->id}}" onclick="toggleEditDropdown({{$datas->id}})">
                                            Pilih Jenis Tanaman
                                        </button>
                                        <ul class="dropdown-menu-edit" id="editDropdownMenu{{$datas->id}}">
                                            @foreach ($tanaman as $data)
                                            <li>
                                                <a class="dropdown-item-edit" href="#" onclick="selectEditItem(event, '{{$data->id}}', '{{$data->name}}', {{$datas->id}})">
                                                    {{$data->name}}
                                                </a>
                                            </li>                                            
                                            @endforeach
                                        </ul>
                                        <input type="hidden" name="edit_id_tanaman" id="edit_id_tanaman{{$datas->id}}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit"  class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>



<div class="modal fade" id="addperiod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Period</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('addPeriod', $datas->idgh) }}" method="post">
                @csrf
                <!-- Dropdown for jenis tanaman -->
                <div class="form-group">
                            <label for="jenisTanamanBtn" class="col-form-label">Jenis Tanaman:</label>
                            <div class="dropdown">
                                <button class="dropdown-toggle-van" type="button" id="jenisTanamanBtn" onclick="toggleDropdown()">
                                    Pilih Jenis Tanaman
                                </button>
                                <ul class="dropdown-menu" id="dropdownMenu">
                                    @foreach ($tanaman as $data)
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="selectItem(event, '{{$data->id}}', '{{$data->name}}', {{$datas->id}})">
                                            {{$data->name}}
                                        </a>
                                    </li>                                    
                                    @endforeach
                                </ul>
                                <input type="hidden" name="id_tanaman" id="id_tanaman">
                            </div>
                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        let angle = 0;
        let interval;

        $('#rotateBtn').on('click', function() {
            // Stop any previous rotations
            clearInterval(interval);
            
            // Start continuous rotation every 100ms (adjust for smoother animation)
            interval = setInterval(function() {
                angle += 10; // Increase the angle by 10 degrees
                $('#rotateDiv').css({
                    'transform': 'rotate(' + angle + 'deg)',
                    'transition': 'transform 0.1s linear'
                });
            }, 10); // Rotate every 100ms

            // Stop rotation and reset position after 10 seconds
            setTimeout(function() {
                clearInterval(interval); // Stop rotation after 10s
                angle = 0; // Reset angle to 0
                $('#rotateDiv').css({
                    'transform': 'rotate(0deg)',
                    'transition': 'transform 0.5s ease' // Reset animation
                });
            }, 10000); // 10 seconds (10000 ms)
        });
    });
</script>




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

<script>
    function toggleEditDropdown(id) {
        const dropdownMenu = document.getElementById("editDropdownMenu" + id);

        if (dropdownMenu) {
            dropdownMenu.classList.toggle("show");
            console.log("Dropdown toggled:", dropdownMenu.classList.contains("show"));
        } else {
            console.error("Dropdown menu element not found!");
        }
    }

    function selectEditItem(event, id, name, buttonId) {
        event.preventDefault();
        document.getElementById("editJenisTanamanBtn" + buttonId).textContent = name;
        document.getElementById("edit_id_tanaman" + buttonId).value = id; // Ensure this sets the value
        document.getElementById("editDropdownMenu" + buttonId).classList.remove("show");
    }

    // Close the dropdown in the edit modal if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-toggle-edit')) {
            var dropdowns = document.querySelectorAll(".dropdown-menu-edit");
            dropdowns.forEach(function(openDropdown) {
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            });
        }
    };
</script>

@endsection