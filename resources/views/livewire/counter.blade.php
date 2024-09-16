<div>
        <div wire:poll.2s="fetchData">
           <div class="row">
                    
                    @foreach ($data as $suhuling)

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-lg-4 col-md-6 mb-4" wire:poll>
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

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Kelembaban lingkungan
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suhuling->humidity}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-droplet-half fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Intensitas Cahaya</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suhuling->light_intensity}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-brightness-high-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Kelembaban Tanah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suhuling->soil_moisture}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-flower2 fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                PH Tanah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suhuling->ph}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-thermometer-half fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
        </div>
</div>
