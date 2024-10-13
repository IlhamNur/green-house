@extends('layouts.default')

@section('content')
  
@livewireStyles

@livewire('info-data', ['id' => $data->id])

@livewireScripts

<div class="row" id="rotateDiv">
    <div class= "col-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editGreenhouse">
            Edit Greenhouse
        </button>
    </div>
    <div class="col">
        <form action="{{ route('publishtreshGreenhouse', $data -> id) }}" method="post">
            @CSRF
            <button type="submit" class="btn btn-primary">
                Publish Plant Treshold
            </button>
        </form>
    </div>
</div>



<div class="modal fade" id="editGreenhouse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Greenhouse</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('updateGreenhouse', $data -> id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" id="recipient-name" name="name" value="{{$data->name}}">
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
@endsection