@extends('layouts.default')

@section('content')


<form action="{{ route('storeTanaman'),  }}" method="post">
    @csrf
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Name:</label>
        <input type="text" class="form-control" id="recipient-name" name="name">
    </div>
    <div class="form-group">
        <label for="temperature" class="col-form-label">temperature:</label>
        <input type="text" class="form-control" id="temperature" name="temperature">
    </div>
    <div class="form-group">
        <label for="humidityname" class="col-form-label">humidity:</label>
        <input type="text" class="form-control" id="humidityname" name="humidity">
    </div>
    <div class="form-group">
        <label for="soil_max" class="col-form-label">soil_max:</label>
        <input type="text" class="form-control" id="soil_max" name="soil_max">
    </div>
    <div class="form-group">
        <label for="soil_min" class="col-form-label">soil_min:</label>
        <input type="text" class="form-control" id="soil_min" name="soil_min">
    </div>
    <div class="form-group">
        <label for="light_intensity" class="col-form-label">light_intensity:</label>
        <input type="text" class="form-control" id="light_intensity" name="light_intensity">
    </div>

    <button type="submit"  class="btn btn-primary">Add Plant Treshold</button>
</form>


@endsection
