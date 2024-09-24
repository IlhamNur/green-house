<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard | SmartGrow</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ route('home') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">SmartGrow</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="{{ route('greenhouse-manage') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Greenhouse Manage</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="{{ route('plant-list') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Plant List</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="assets/img/avatars/farmer.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets/img/avatars/farmer.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                @if (isset($sensorDatas[0]))
                    <div class="col-lg-8 mb-4 order-0">
                @else
                    <div class="col-lg mb-4 order-0">
                @endif
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Welcome {{ Auth::user()->name }}! 🎉</h5>
                          <p class="mb-4">
                            @if (isset($greenhouse))
                                This is your <span class="fw-bold">{{ $greenhouse->name }}</span> dashboard monitoring.
                                @if (!isset($sensorDatas[0]))
                                    This greenhouse has no data.
                                @endif
                                    Change the greenhouse data you want to display by clicking the button below.
                            @else
                                No <span class="fw-bold">Greenhouse Data</span> pinned. Pin the greenhouse data you want to display by clicking the button below.
                            @endif
                          </p>

                          <a href="{{ route('greenhouse-manage') }}" class="btn btn-sm btn-outline-primary">Manage Greenhouse</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="Add Greenhouse"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @if (isset($sensorDatas[0]))
                    <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="assets/img/icons/unicons/temperature.png" alt="temperature" class="rounded"/>
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">Temperature</span>
                                    <h3 class="card-title mb-2 temperature">{{ $sensorDatas[0]->temperature }}&deg;C</h3>
                                    <small class="temperature-diff">
                                        @if ((($sensorDatas[0]->temperature) - ($sensorDatas[1]->temperature)) >= 0)
                                            <small class="text-success fw-semibold">
                                                <i class="bx bx-up-arrow-alt"></i>
                                        @else
                                            <small class="text-danger fw-semibold">
                                                <i class="bx bx-down-arrow-alt"></i>
                                        @endif
                                        {{ ($sensorDatas[0]->temperature) - ($sensorDatas[1]->temperature) }}&deg;C</small>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="assets/img/icons/unicons/humidity.png" alt="humidity" class="rounded"/>
                                        </div>
                                    </div>
                                    <span>Humidity</span>
                                    <h3 class="card-title text-nowrap mb-1 humidity">{{ $sensorDatas[0]->humidity }}%</h3>
                                    <small class="humidity-diff">
                                        @if ((($sensorDatas[0]->humidity) - ($sensorDatas[1]->humidity)) >= 0)
                                            <small class="text-success fw-semibold">
                                                <i class="bx bx-up-arrow-alt"></i>
                                        @else
                                            <small class="text-danger fw-semibold">
                                                <i class="bx bx-down-arrow-alt"></i>
                                        @endif
                                        {{ ($sensorDatas[0]->humidity) - ($sensorDatas[1]->humidity) }}%</small>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <!-- Total Light -->
                    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="card">
                        <div class="row row-bordered g-0">
                        <div class="col-md-8">
                            <h5 class="card-header m-0 me-2 pb-3">Light Intensity</h5>
                            <div id="totalLightChart" class="px-2"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                            <div class="text-center">
                            </div>
                            </div>
                            <div id="LightChart"></div>
                            <div class="text-center fw-semibold pt-3 mb-2">The LED will turn on if it is less than the threshold </div>

                            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-center">
                            <div class="d-flex">
                                <div class="me-2">
                                <span class="badge bg-label-danger p-2"><i class="bx bx-down-arrow-alt text-danger"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                <small>Threshold</small>
                                <h6 class="mb-0">{{ $greenhouse->light }}lux</h6>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!--/ Total Light -->
                    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="assets/img/icons/unicons/phosphorus.png" alt="Nutrition" class="rounded" />
                                        </div>
                                    </div>
                                    <span class="d-block mb-1">Nutrition</span>
                                    <h3 class="card-title text-nowrap mb-2 nutrition">{{ $sensorDatas[0]->nutrition }}ppm</h3>
                                    <small class="nutrition-diff">
                                        @if ((($sensorDatas[0]->nutrition) - ($sensorDatas[1]->nutrition)) >= 0)
                                            <small class="text-success fw-semibold">
                                                <i class="bx bx-up-arrow-alt"></i>
                                        @else
                                            <small class="text-danger fw-semibold">
                                                <i class="bx bx-down-arrow-alt"></i>
                                        @endif
                                        {{ ($sensorDatas[0]->nutrition) - ($sensorDatas[1]->nutrition) }}ppm</small>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="assets/img/icons/unicons/ph-balance.png" alt="pH" class="rounded"/>
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">pH</span>
                                    <h3 class="card-title mb-2 ph-level">ph {{ $sensorDatas[0]->ph }}</h3>
                                    <small class="ph-diff">
                                        @if ((($sensorDatas[0]->ph) - ($sensorDatas[1]->ph)) >= 0)
                                            <small class="text-success fw-semibold">
                                                <i class="bx bx-up-arrow-alt"></i>
                                        @else
                                            <small class="text-danger fw-semibold">
                                                <i class="bx bx-down-arrow-alt"></i>
                                        @endif
                                        {{ ($sensorDatas[0]->ph) - ($sensorDatas[1]->ph) }}ph</small>
                                    </small>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                <div class="card-title">
                                                    <h5 class="text-nowrap mb-2">Water Level</h5>
                                                    <span class="badge bg-label-warning rounded-pill">distance from lid to water</span>
                                                </div>
                                                <div class="mt-sm-auto">
                                                    <small class="water-level-diff">
                                                        @if ((($sensorDatas[0]->water_level) - ($sensorDatas[1]->water_level)) >= 0)
                                                            <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i>
                                                        @else
                                                            <small class="text-danger text-nowrap fw-semibold"><i class="bx bx-chevron-down"></i>
                                                        @endif
                                                        {{ ($sensorDatas[0]->water_level) - ($sensorDatas[1]->water_level) }}cm</small>
                                                    </small>
                                                    <h3 class="water-level mb-0">{{ $sensorDatas[0]->water_level }}cm</h3>
                                                </div>
                                            </div>
                                            <div id="waterLevelChart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endif
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                      document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://github.com/IlhamNur" target="_blank" class="footer-link fw-bolder">IlhamNur</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <!-- Pass PHP data to JavaScript using inline script -->
    @if (isset($sensorDatas[0]))
        @php
            $lights = [];
            $waters = [];
        @endphp
        @foreach ($sensorDatas as $data)
            @php
                $lights[] = $data->light;
                $waters[] = $data->water_level;
            @endphp
        @endforeach
        <script>
        var lights = @json($lights);
        var waters = @json($waters);
        </script>
    @endif
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    {{-- <script src="assets/js/dashboards-analytics.js"></script> --}}

    <script>
        /**
         * Dashboard Analytics
         */

        'use strict';

        let LightChart;
        let totalLightChart;
        let waterLevelChart;

        (function () {
        let cardColor, headingColor, axisColor, shadeColor, borderColor;

        cardColor = config.colors.white;
        headingColor = config.colors.headingColor;
        axisColor = config.colors.axisColor;
        borderColor = config.colors.borderColor;

        // Total Light Report Chart - Bar Chart
        // --------------------------------------------------------------------
        const totalLightChartEl = document.querySelector('#totalLightChart'),
            totalLightChartOptions = {
            series: [
                {
                name: 'Sensor BH1750',
                data: lights
                }
            ],
            chart: {
                height: 300,
                stacked: true,
                type: 'bar',
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                horizontal: false,
                columnWidth: '33%',
                borderRadius: 12,
                startingShape: 'rounded',
                endingShape: 'rounded'
                }
            },
            colors: [config.colors.primary, config.colors.info],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 6,
                lineCap: 'round',
                colors: [cardColor]
            },
            legend: {
                show: true,
                horizontalAlign: 'left',
                position: 'top',
                markers: {
                height: 8,
                width: 8,
                radius: 12,
                offsetX: -3
                },
                labels: {
                colors: axisColor
                },
                itemMargin: {
                horizontal: 10
                }
            },
            grid: {
                borderColor: borderColor,
                padding: {
                top: 0,
                bottom: -8,
                left: 20,
                right: 20
                }
            },
            xaxis: {
                categories: ['60 seconds ago', '50 seconds ago', '40 seconds ago', '30 seconds ago', '20 seconds ago', '10 seconds ago', 'Now'],
                labels: {
                style: {
                    fontSize: '13px',
                    colors: axisColor
                }
                },
                axisTicks: {
                show: false
                },
                axisBorder: {
                show: false
                }
            },
            yaxis: {
                labels: {
                style: {
                    fontSize: '13px',
                    colors: axisColor
                }
                }
            },
            responsive: [
                {
                breakpoint: 1700,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '32%'
                    }
                    }
                }
                },
                {
                breakpoint: 1580,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '35%'
                    }
                    }
                }
                },
                {
                breakpoint: 1440,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '42%'
                    }
                    }
                }
                },
                {
                breakpoint: 1300,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '48%'
                    }
                    }
                }
                },
                {
                breakpoint: 1200,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '40%'
                    }
                    }
                }
                },
                {
                breakpoint: 1040,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 11,
                        columnWidth: '48%'
                    }
                    }
                }
                },
                {
                breakpoint: 991,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '30%'
                    }
                    }
                }
                },
                {
                breakpoint: 840,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '35%'
                    }
                    }
                }
                },
                {
                breakpoint: 768,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '28%'
                    }
                    }
                }
                },
                {
                breakpoint: 640,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '32%'
                    }
                    }
                }
                },
                {
                breakpoint: 576,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '37%'
                    }
                    }
                }
                },
                {
                breakpoint: 480,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '45%'
                    }
                    }
                }
                },
                {
                breakpoint: 420,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '52%'
                    }
                    }
                }
                },
                {
                breakpoint: 380,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '60%'
                    }
                    }
                }
                }
            ],
            states: {
                hover: {
                filter: {
                    type: 'none'
                }
                },
                active: {
                filter: {
                    type: 'none'
                }
                }
            }
            };
        if (typeof totalLightChartEl !== undefined && totalLightChartEl !== null) {
            const totalLightChart = new ApexCharts(totalLightChartEl, totalLightChartOptions);
            totalLightChart.render();
        }

        // Light Chart - Radial Bar Chart
        // --------------------------------------------------------------------
        const LightChartEl = document.querySelector('#LightChart'),
            LightChartOptions = {
            series: [lights[0]],
            labels: ['lux'],
            chart: {
                height: 240,
                type: 'radialBar'
            },
            plotOptions: {
                radialBar: {
                size: 150,
                offsetY: 10,
                startAngle: -150,
                endAngle: 150,
                hollow: {
                    size: '55%'
                },
                track: {
                    background: cardColor,
                    strokeWidth: '100%'
                },
                dataLabels: {
                    name: {
                    offsetY: 15,
                    color: headingColor,
                    fontSize: '15px',
                    fontWeight: '600',
                    fontFamily: 'Public Sans'
                    },
                    value: {
                    offsetY: -25,
                    color: headingColor,
                    fontSize: '22px',
                    fontWeight: '500',
                    fontFamily: 'Public Sans',
                    formatter: function(value) {
                        return value.toFixed(0);
                    }
                    }
                }
                }
            },
            colors: [config.colors.primary],
            fill: {
                type: 'gradient',
                gradient: {
                shade: 'dark',
                shadeIntensity: 0.5,
                gradientToColors: [config.colors.primary],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 0.6,
                stops: [30, 70, 100]
                }
            },
            stroke: {
                dashArray: 5
            },
            grid: {
                padding: {
                top: -35,
                bottom: -10
                }
            },
            states: {
                hover: {
                filter: {
                    type: 'none'
                }
                },
                active: {
                filter: {
                    type: 'none'
                }
                }
            }
            };
        if (typeof LightChartEl !== undefined && LightChartEl !== null) {
            const LightChart = new ApexCharts(LightChartEl, LightChartOptions);
            LightChart.render();
        }

        // Water Level Line Chart
        // --------------------------------------------------------------------
        const waterLevelChartEl = document.querySelector('#waterLevelChart'),
            waterLevelChartConfig = {
            chart: {
                height: 80,
                // width: 175,
                type: 'line',
                toolbar: {
                show: false
                },
                dropShadow: {
                enabled: true,
                top: 10,
                left: 5,
                blur: 3,
                color: config.colors.warning,
                opacity: 0.15
                },
                sparkline: {
                enabled: true
                }
            },
            grid: {
                show: false,
                padding: {
                right: 8
                }
            },
            colors: [config.colors.warning],
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 5,
                curve: 'smooth'
            },
            series: [
                {
                name: 'Water Level',
                data: waters
                }
            ],
            xaxis: {
                show: false,
                lines: {
                show: false
                },
                labels: {
                show: false
                },
                axisBorder: {
                show: false
                }
            },
            yaxis: {
                show: false
            }
            };
        if (typeof waterLevelChartEl !== undefined && waterLevelChartEl !== null) {
            const waterLevelChart = new ApexCharts(waterLevelChartEl, waterLevelChartConfig);
            waterLevelChart.render();
        }
    })();
    </script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        // Function to fetch sensor data via AJAX
        function fetchSensorData() {
            $.ajax({
                url: "{{ route('getSensorData') }}", // Replace with your route to fetch sensor data
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.length > 0) {
                        let sensorData = response[0]; // Latest sensor data

                        // Update temperature
                        $('.temperature').text(sensorData.temperature + '°C');
                        if ((sensorData.temperature - response[1].temperature) >= 0) {
                            $('.temperature-diff').html(`<small class="text-success fw-semibold">
                                <i class="bx bx-up-arrow-alt"></i> ${sensorData.temperature - response[1].temperature}°C</small>`);
                        } else {
                            $('.temperature-diff').html(`<small class="text-danger fw-semibold">
                                <i class="bx bx-down-arrow-alt"></i> ${sensorData.temperature - response[1].temperature}°C</small>`);
                        }

                        // Update humidity
                        $('.humidity').text(sensorData.humidity + '%');
                        if ((sensorData.humidity - response[1].humidity) >= 0) {
                            $('.humidity-diff').html(`<small class="text-success fw-semibold">
                                <i class="bx bx-up-arrow-alt"></i> ${sensorData.humidity - response[1].humidity}%</small>`);
                        } else {
                            $('.humidity-diff').html(`<small class="text-danger fw-semibold">
                                <i class="bx bx-down-arrow-alt"></i> ${sensorData.humidity - response[1].humidity}%</small>`);
                        }

                        // Update nutrition
                        $('.nutrition').text(sensorData.nutrition + 'ppm');
                        if ((sensorData.nutrition - response[1].nutrition) >= 0) {
                            $('.nutrition-diff').html(`<small class="text-success fw-semibold">
                                <i class="bx bx-up-arrow-alt"></i> ${sensorData.nutrition - response[1].nutrition}ppm</small>`);
                        } else {
                            $('.nutrition-diff').html(`<small class="text-danger fw-semibold">
                                <i class="bx bx-down-arrow-alt"></i> ${sensorData.nutrition - response[1].nutrition}ppm</small>`);
                        }

                        // Update water level
                        $('.water-level').text(sensorData.water_level + 'cm');
                        if ((sensorData.water_level - response[1].water_level) >= 0) {
                            $('.water-level-diff').html(`<small class="text-success fw-semibold">
                                <i class="bx bx-up-arrow-alt"></i> ${sensorData.water_level - response[1].water_level}cm</small>`);
                        } else {
                            $('.water-level-diff').html(`<small class="text-danger fw-semibold">
                                <i class="bx bx-down-arrow-alt"></i> ${sensorData.water_level - response[1].water_level}cm</small>`);
                        }

                        // Update pH
                        $('.ph-level').text('ph ' + sensorData.ph);
                        if ((sensorData.ph - response[1].ph) >= 0) {
                            $('.ph-diff').html(`<small class="text-success fw-semibold">
                                <i class="bx bx-up-arrow-alt"></i> ${sensorData.ph - response[1].ph}</small>`);
                        } else {
                            $('.ph-diff').html(`<small class="text-danger fw-semibold">
                                <i class="bx bx-down-arrow-alt"></i> ${sensorData.ph - response[1].ph}</small>`);
                        }

                        if (sensorData.light !== undefined && LightChart) {
                            LightChart.updateSeries([sensorData.light]);
                        }

                        if (sensorData.light !== undefined && totalLightChart) {
                            totalLightChart.updateSeries([[
                                name: 'Sensor BH1750',
                                data: [response[0].light, response[1].light, response[2].light, response[3].light, response[4].light, response[5].light, response[6].light]
                            ]])
                        }

                        if (sensorData.water_level !== undefined && waterLevelChart) {
                            waterLevelChart.updateSeries([[
                                name: 'Water Level',
                                data: [response[0].water_level, response[1].water_level, response[2].water_level, response[3].water_level, response[4].water_level, response[5].water_level, response[6].water_level]
                            ]])
                        }

                    }
                },
                error: function(xhr) {
                    console.log('Error fetching sensor data:', xhr);
                }
            });
        }

        // Call the fetchSensorData function every 5 seconds
        $(document).ready(function() {
            setInterval(fetchSensorData, 5000);
        });
    </script>
  </body>
</html>
