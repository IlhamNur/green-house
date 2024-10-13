<div wire:poll.2s="fetchData">
    @if($data)
    @foreach ($data as $suhuling)
    @if($thresholds)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">{{$suhuling->name}}</h6>
        </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Suhu Lingkungan Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card {{ ($suhuling->temperature < $thresholds[$loop->iteration - 1]->tTem) ? 'border-left-danger' : 'border-left-success' }} shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Suhu Lingkungan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if (is_null ($suhuling->temperature)) 
                                                --
                                                @else
                                                {{$suhuling->temperature}}
                                                @endif
                                            </div>
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
                        <div class="card {{ ($suhuling->humidity < $thresholds[$loop->iteration - 1]->tHum) ? 'border-left-danger' : 'border-left-success' }} shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kelembaban Lingkungan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if (is_null ($suhuling->humidity)) 
                                                --
                                                @else
                                                {{$suhuling->humidity}}
                                                @endif</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-droplet-half fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kelembaban Lingkungan Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card {{ ($suhuling->ph < 6) ? 'border-left-danger' : 'border-left-success' }} shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">PH</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if (is_null ($suhuling->ph)) 
                                                --
                                                @else
                                                {{$suhuling->ph}}
                                                @endif</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-thermometer fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kelembaban Lingkungan Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card {{ ($suhuling->soil_moisture < $thresholds[$loop->iteration - 1]->tSoil) ? 'border-left-danger' : 'border-left-success' }} shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kelembaban Tanah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if (is_null ($suhuling->soil_moisture)) 
                                                --
                                                @else
                                                {{$suhuling->soil_moisture}}
                                                @endif</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-water fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kelembaban Lingkungan Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card {{ ($suhuling->light_intensity < $thresholds[$loop->iteration - 1]->tLig) ? 'border-left-danger' : 'border-left-success' }} shadow h-100 py-2">                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Intensitas Cahaya</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if (is_null ($suhuling->light_intensity)) 
                                                --
                                                @else
                                                {{$suhuling->light_intensity}}
                                                @endif</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-lightbulb-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    @else
    <div> data tidak ditemukan</div>
    @endif
    @endforeach
    @else
    <div> Tidak ada Greenhouse yang di sematkan, anda bisa menyematkan Greenhouse pada menu Manage Greenhouse</div>
    @endif
</div>
