<div wire:poll.2s="fetchData">
    @foreach ($data as $suhuling)
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Sensor Data</h6>
    </div>
    <div class="card-body">
           <div class="row">
                    <!-- Suhu Lingkungan Card -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Suhu Lingkungan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suhuling->temperature}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-thermometer-sun fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kelembaban Lingkungan Card -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kelembaban Lingkungan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suhuling->humidity}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-droplet-half fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Intensitas Cahaya Card -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Intensitas Cahaya</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suhuling->light_intensity}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-brightness-high-fill fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kelembaban Tanah Card -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kelembaban Tanah</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suhuling->soil_moisture}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-flower2 fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PH Tanah Card -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">PH Tanah</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suhuling->ph}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-thermometer-half fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
