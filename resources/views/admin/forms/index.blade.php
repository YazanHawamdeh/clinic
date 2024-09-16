


<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Page</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>




    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/css/plugins.min.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/css/kaiadmin.min.css")}}" />

    <link rel="stylesheet" href="{{asset("assets/css/demo.css")}}" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="white">
                <img src="{{ asset('assets/imgshome/logo.png') }}" alt="logo" width=170 ></a>

            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">

              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>


              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>Items</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('view-items')}}">
                        <span class="sub-item">All Items</span>
                      </a>
                      <a href="{{route('newItemPage')}}">
                        <span class="sub-item">Add Item</span>
                      </a>
                    </li>


                  </ul>
                </div>
              </li>


              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base2">
                  <i class="fa fa-heart "></i>
                  <p>Banner</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base2">
                  <ul class="nav nav-collapse">
                    <li>
                      <!-- <a href="{{route('view-items')}}">
                        <span class="sub-item">All Items</span>
                      </a> -->
                      <a href="{{route('newBannerPage')}}">
                        <span class="sub-item">Add Banner</span>
                      </a>
                      <a href="{{route('editUpdateBanner', 1)}}">
                        <span class="sub-item">update Banner</span>
                      </a>
                    </li>


                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base3">
                  <i class="fas fa-layer-group"></i>
                  <p>About Us</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base3">
                  <ul class="nav nav-collapse">
                    <li>
                      <!-- <a href="{{route('view-items')}}">
                        <span class="sub-item">All About Us</span>
                      </a> -->
                      <a href="{{route('newAboutUsPage')}}">
                        <span class="sub-item">Add About Us</span>
                      </a>
                      <a href="{{route('edit_about_us', 1)}}">
                        <span class="sub-item">update About Us</span>
                      </a>
                    </li>


                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base5">
                  <i class="fas fa-layer-group"></i>
                  <p>Cart</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base5">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('show_cart')}}">
                        <span class="sub-item">show_cart</span>
                      </a>
                      <!-- <a href="{{route('edit_about_us', 1)}}">
                        <span class="sub-item">update About Us</span>
                      </a> -->
                    </li>


                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base4">
                  <i class="fas fa-layer-group"></i>
                  <p>Order</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base4">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('order')}}">
                        <span class="sub-item">order</span>
                      </a>
                    </li>


                  </ul>
                </div>
              </li>
              

              
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base6">
                  <i class="fas fa-layer-group"></i>
                  <p>Related Link</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base6">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('related_link_view')}}">
                        <span class="sub-item">Add Related Link Section</span>
                      </a>
                      <a href="{{route('edit_related_link', 1)}}">
                        <span class="sub-item">Edit Related Link Section</span>
                      </a>
                    </li>


                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="">
                  <i class="fas fa-layer-group"></i>
                  <p>Logo</p>
                </a>

              </li>

              




              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables">
                  <i class="fas fa-pen-square"></i>
                  <p>Access</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav nav-collapse">
                    {{-- <li>
                      <a href="tables/tables.html">
                        <span class="sub-item">Show Admin</span>
                      </a>
                    </li> --}}
                    <li>
                      <a href="{{route('admins')}}">
                        <span class="sub-item">Admin Management</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>


              
              {{-- <li class="nav-item">
                <a data-bs-toggle="collapse" href="#cat">
                  <i class="fas fa-table"></i>
                  <p>Categories</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="cat">
                  <ul class="nav nav-collapse">
                    <li>
                      <a  href="{{route('view_categories')}}">
                        <span class="sub-item">All Category</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{route('addCategory')}}">
                        <span class="sub-item">Add Category</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li> --}}


<!-- 
              <li class="nav-item">
                <a href="../../documentation/index.html">
                  <i class="fas fa-file"></i>
                  <p>Documentation</p>
                  <span class="badge badge-secondary">1</span>
                </a>
              </li> -->

            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <!-- <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav> -->

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <!-- <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li> -->
                <!-- <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="messageDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-envelope"></i>
                  </a>
                  <ul
                    class="dropdown-menu messages-notif-box animated fadeIn"
                    aria-labelledby="messageDropdown"
                  >
                    <li>
                      <div
                        class="dropdown-title d-flex justify-content-between align-items-center"
                      >
                        Messages
                        <a href="#" class="small">Mark all as read</a>
                      </div>
                    </li>
                    <li>

                    </li>
                    <li>
                      <a class="see-all" href="javascript:void(0);"
                        >See all messages<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li> -->
                <!-- <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="notifDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-bell"></i>
                    <span class="notification">4</span>
                  </a>
                  <ul
                    class="dropdown-menu notif-box animated fadeIn"
                    aria-labelledby="notifDropdown"
                  >
                    <li>
                      <div class="dropdown-title">
                        You have 4 new notification
                      </div>
                    </li>
                    <li>

                    </li>
                    <li>
                      <a class="see-all" href="javascript:void(0);"
                        >See all notifications<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li> -->
                <!-- <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <i class="fas fa-layer-group"></i>
                  </a>

                </li> -->

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <!-- <div class="avatar-sm">
                      <img
                        src="assets/img/profile.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div> -->
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold"> {{ Auth::user()->name }}</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <!-- <div class="avatar-lg">
                            <img
                              src="assets/img/profile.jpg"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div> -->
                          <div class="u-text">
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                            <p class="text-muted">{{ Auth::user()->email }}</p>
                            <!-- <a
                              href="profile.html"
                              class="btn btn-xs btn-secondary btn-sm"
                              >View Profile</a
                            > -->
                          </div>
                        </div>
                      </li>
                      <li>
                        <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">My Balance</a>
                        <a class="dropdown-item" href="#">Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Account Setting</a> -->
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf
      
                          <x-responsive-nav-link :href="route('logout')"
                                  onclick="event.preventDefault();
                                              this.closest('form').submit();">
                              {{ __('Log Out') }}
                          </x-responsive-nav-link>
                      </form>                      </li>


                    </div>
                  </ul>

                                      
                </li>
              </ul>

            </div>
          </nav>
          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            {{-- <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            > --}}


            {{-- <div class="row">
              <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                  <nav class="pull-left">
                    <ul class="nav">
                      <li class="nav-item">
                        <a class="nav-link" href="http://www.themekita.com">
                          ThemeKita
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#"> Help </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#"> Licenses </a>
                      </li>
                    </ul>
                  </nav>
                  <div class="copyright">
                    2024, made with <i class="fa fa-heart heart text-danger"></i> by
                    <a href="http://www.themekita.com">ThemeKita</a>
                  </div>
                  <div>
                    Distributed by
                    <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
                  </div>
                </div>
              </footer>
      </div> --}}


      
<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
  <div class="title">Settings</div>
  <div class="custom-content">
    <div class="switcher">
      <div class="switch-block">
        <h4>Logo Header</h4>
        <div class="btnSwitch">
          <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
          <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
          <br />
          <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Sidebar</h4>
        <div class="btnSwitch">
          <button type="button" class="selected changeSideBarColor" data-color="white"></button>
          <button type="button" class="changeSideBarColor" data-color="dark"></button>
          <button type="button" class="changeSideBarColor" data-color="dark2"></button>
        </div>
      </div>
    </div>
  </div>
  <div class="custom-toggle">
    <i class="icon-settings"></i>
  </div>
</div>
<!-- End Custom template -->

    <!--   Core JS Files   -->
    <script src={{asset("assets/js/core/jquery-3.7.1.min.js")}}></script>
    <script src={{asset("assets/js/core/popper.min.js")}}></script>
    <script src={{asset("assets/js/core/bootstrap.min.js")}}></script>

    <!-- jQuery Scrollbar -->
    <script src={{asset("assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js")}}></script>

    <!-- Chart JS -->
    <script src={{asset("assets/js/plugin/chart.js/chart.min.js")}}></script>

    <!-- jQuery Sparkline -->
    <script src={{asset("assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js")}}></script>

    <!-- Chart Circle -->
    <script src={{asset("assets/js/plugin/chart-circle/circles.min.js")}}></script>

    <!-- Datatables -->
    <script src={{asset("assets/js/plugin/datatables/datatables.min.js")}}></script>

    <!-- Bootstrap Notify -->
    <script src={{asset("assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js")}}></script>

    <!-- jQuery Vector Maps -->
    <script src={{asset("assets/js/plugin/jsvectormap/jsvectormap.min.js")}}></script>
    <script src={{asset("assets/js/plugin/jsvectormap/world.js")}}></script>

    <!-- Sweet Alert -->
    <script src={{asset("assets/js/plugin/sweetalert/sweetalert.min.js")}}></script>

    <!-- Kaiadmin JS -->
    <script src={{asset("assets/js/kaiadmin.min.js")}}></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    {{-- <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script> --}}
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
  </body>
</html>


<script src="../assets/js/setting-demo2.js"></script>


<script src="assets/js/dashboard.js"></script>
{{-- <script src="multyselect/js/jquery.min.js"></script> --}}
<script src="multyselect/js/popper.js"></script>
<script src="multyselect/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="multyselect/js/main.js"></script>

