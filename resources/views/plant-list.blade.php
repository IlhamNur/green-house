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

    <title>Plant List | SmartGrow</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    {{-- <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    /> --}}

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
            @if(Auth::user()->role == 'user')
            <li class="menu-item">
              <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            @endif

            <!-- Layouts -->
            <li class="menu-item">
            @if(Auth::user()->role == 'user')
              <a href="{{ route('greenhouse-manage') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Greenhouse Manage</div>
              </a>
            @else
              <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            @endif
            </li>

            <li class="menu-item active">
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
                            @if(Auth::user()->role == 'user')
                                <small class="text-muted">User</small>
                            @else
                                <small class="text-muted">Admin</small>
                            @endif
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
            @if (session('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Plant List</h5>
                    @if(Auth::user()->role == 'superadmin')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                            <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Add Plant List
                        </button>
                    @endif
                  </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped"">
                    <thead>
                      <tr>
                        <th>Plant Name</th>
                        <th>Picture</th>
                        <th>Latin Name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($plant_lists as $plant_list)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{ $plant_list->plant_name }}</strong></td>
                        @if (Storage::disk('public')->exists($plant_list->picture))
                            <td> <img style="height: 225px; width: 225px" src="{{ asset('storage/' . $plant_list->picture) }}" alt="{{ $plant_list->plant_name }}"> </td>
                        @else
                            <td> <img style="height: 225px; width: 225px" src="{{ $plant_list->picture }}" alt="{{ $plant_list->plant_name }}"> </td>
                        @endif
                        <td>{{ $plant_list->latin_name }}</td>
                        @if (Auth::user()->role == 'user')
                            <td>
                                <button type="button" class="btn btn-icon btn-outline-primary">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalToggle{{ $plant_list->id }}"
                                    ><span class="tf-icons bx bx-info-circle"></span></a>
                                </button>
                            </td>
                        @else
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalToggle{{ $plant_list->id }}""
                                  ><i class="bx bx-info-circle me-1"></i> More Info</a
                                >
                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#smallModal{{ $plant_list->id }}""
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        @endif
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
              @foreach ($plant_lists as $plant_list)
                <!-- Modal 1-->
                <div
                    class="modal fade"
                    id="modalToggle{{ $plant_list->id }}"
                    aria-labelledby="modalToggleLabel{{ $plant_list->id }}"
                    tabindex="-1"
                    style="display: none"
                    aria-hidden="true"
                >
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel{{ $plant_list->id }}">{{ $plant_list->plant_name }}</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                        </div>
                        <div class="modal-body">
                         <ol class="list-group list-group-numbered">
                            <li class="list-group-item"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Temperature Threshold : </strong> {{ $plant_list->temperature }}&deg;C</li>
                            <li class="list-group-item"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Humidity Threshold : </strong> {{ $plant_list->humidity }}%</li>
                            <li class="list-group-item"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Nutrition Threshold : </strong> {{ $plant_list->nutrition }}ppm</li>
                            <li class="list-group-item"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Light Threshold : </strong> {{ $plant_list->light }}lux</li>
                            <li class="list-group-item"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Water Full Threshold : </strong> {{ $plant_list->water_f }}cm</li>
                            <li class="list-group-item"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Water Emergency Threshold : </strong> {{ $plant_list->water_e }}cm</li>
                            <li class="list-group-item"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Harvest Time : </strong> {{ $plant_list->harvest_time }}day</li>
                         </ol>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        </div>
                    </div>
                    </div>
                </div>

                {{-- Delete Alert Modal --}}
                <div class="modal fade" id="smallModal{{ $plant_list->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Delete Plant</h5>
                            <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <p>Are You Sure?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                            Close
                            </button>
                            <form action="{{ route('plant-list-destroy', $plant_list->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- / Content -->

            <div
                class="modal fade"
                id="modalCenter"
                aria-hidden="true"
                aria-labelledby="modalCenter"
                tabindex="-1"
            >
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenter">Add Plant List</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    </div>
                    <form action="{{ route('plant-insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                        <div class="col mb-3">
                            <label for="plant_name" class="form-label">Plant Name</label>
                            <input type="text" id="plant_name" name="plant_name" class="form-control class="form-control @error('plant_name') is-invalid @enderror" required/>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="picture" class="form-label">Picture</label>
                            <input type="file" id="picture" name="picture" class="form-control class="form-control @error('picture') is-invalid @enderror" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="latin_name" class="form-label">Latin Name</label>
                            <input type="text" id="latin_name" name="latin_name" class="form-control class="form-control @error('latin_name') is-invalid @enderror" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="temperature" class="form-label">Temperature</label>
                            <input type="number" id="temperature" name="temperature" class="form-control class="form-control @error('temperature') is-invalid @enderror" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="humidity" class="form-label">Humidity</label>
                            <input type="number" id="humidity" name="humidity" class="form-control class="form-control @error('name') is-invalid @enderror" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="nutrition" class="form-label">Nutrition</label>
                            <input type="number" id="nutrition" name="nutrition" class="form-control class="form-control @error('nutrition') is-invalid @enderror" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="light" class="form-label">Light</label>
                            <input type="number" id="light" name="light" class="form-control class="form-control @error('light') is-invalid @enderror" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="water_f" class="form-label">Water Level Full</label>
                            <input type="number" id="water_f" name="water_f" class="form-control class="form-control @error('water_f') is-invalid @enderror" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="water_e" class="form-label">Water Full Emergency</label>
                            <input type="number" id="water_e" name="water_e" class="form-control class="form-control @error('water_e') is-invalid @enderror" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="harvest_time" class="form-label">Harvest Time</label>
                            <input type="number" id="harvest_time" name="harvest_time" class="form-control class="form-control @error('harvest_time') is-invalid @enderror" required/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button
                        class="btn btn-outline-secondary"
                        data-bs-dismiss="modal"
                    >
                        Back
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
                </div>
            </div>

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
    <script src="assets/js/main.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>