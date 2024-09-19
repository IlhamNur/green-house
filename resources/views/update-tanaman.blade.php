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
        <label for="soil_max" class="col-form-label">Max treshold for soil moisture :</label>
        <input type="text" class="form-control" id="soil_max" name="soil_max" value="{{ $data->soil_max }}">
    </div>
    <div class="form-group">
        <label for="soil_min" class="col-form-label">Soil Moisture:</label>
        <input type="text" class="form-control" id="soil_min" name="soil_min" value="{{ $data->soil_min }}">
    </div>
    <div class="form-group">
        <label for="light_intensity" class="col-form-label">Light Intensity:</label>
        <input type="text" class="form-control" id="light_intensity" name="light_intensity" value="{{ $data->light_intensity }}">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Update Plant</button>
</form>
<br>
<form action="{{ route('destroyTanaman', $data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="danger" class="btn btn-danger btn-block">Delete</button>
                    </form>
                    </div>
@endsection
