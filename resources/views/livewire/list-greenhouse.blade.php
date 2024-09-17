<div wire:poll.2s="fetchData">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Greenhouse Name</th>
                <th>Plant Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $datas)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$datas->greenhouse}}</td>
                <td>{{$datas->tanaman}}</td>
                <td>
                    <a href="{{ route('editGreenhouse', $datas->id) }}"><button type="button" class="btn btn-outline-primary">More Info</button></a>                    
                    <!-- <button type="button" class="btn btn-outline-secondary" wire:click="$emit('editGreenhouse', {{$datas->id}})">Edit</button> -->
                    <form action="{{ route('destroyGreenhouse', $datas->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script>
    window.addEventListener('show-modal', event => {
        $('#editGreenhouseModal').modal('show');
    });

    window.addEventListener('hide-modal', event => {
        $('#editGreenhouseModal').modal('hide');
    });
</script>
