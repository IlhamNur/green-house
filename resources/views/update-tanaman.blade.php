@extends('layouts.default')

@section('content')


<div>
<form action="{{ route('updateTanaman', $data->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Name:</label>
        <input type="text" class="form-control" id="recipient-name" name="name" value="{{ $data->name }}">
    </div>
    <div class="form-group">
        <label for="temperature" class="col-form-label">Temperature:</label>
        <input type="text" class="form-control" id="temperature" name="temperature" value="{{ $data->temperature }}">
    </div>
    <div class="form-group">
        <label for="humidity" class="col-form-label">Humidity:</label>
        <input type="text" class="form-control" id="humidity" name="humidity" value="{{ $data->humidity }}">
    </div>
    <div class="form-group">
        <label for="ph" class="col-form-label">PH:</label>
        <input type="text" class="form-control" id="ph" name="ph" value="{{ $data->ph }}">
    </div>
    <div class="form-group">
        <label for="soil_moisture" class="col-form-label">Soil Moisture:</label>
        <input type="text" class="form-control" id="soil_moisture" name="soil_moisture" value="{{ $data->soil_moisture }}">
    </div>
    <div class="form-group">
        <label for="light_intensity" class="col-form-label">Light Intensity:</label>
        <input type="text" class="form-control" id="light_intensity" name="light_intensity" value="{{ $data->light_intensity }}">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Update Tanaman</button>
</form>
<br>
<form action="{{ route('destroyTanaman', $data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="danger" class="btn btn-danger btn-block">Delete</button>
                    </form>
                    </div>
@endsection
