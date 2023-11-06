  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Your page</title>

    <meta name="description" content="" />

    <!-- Favicon -->
      <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">

      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet"
    />

      <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/materialdesignicons.css') }}">


      <!-- Menu waves for no-customizer fix -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}">


    <!-- Core CSS -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">

      <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}">

      <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

    <!-- Vendors CSS -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
      <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside
          id="layout-menu"
          class="layout-menu menu-vertical menu bg-menu-theme"
        >
          <div class="app-brand demo">
            <a href="{{ route('admin.index') }}" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-semibold ms-2"
                >ShopShose</span
              >
            </a>
            <!-- end -->
            <a
              href="javascript:void(0);"
              class="layout-menu-toggle menu-link text-large ms-auto"
            >
              <i
                class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"
              ></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <li class="menu-item">
              <a href="/admin" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div>Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('admin.categories.index') }}"  class="menu-link">
                <i class="menu-icon fa-solid fa-list"></i>
                  <div>Categories</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('admin.products.index') }}"  class="menu-link">
                <i class="menu-icon fa-brands fa-product-hunt"></i>
                <div>Products</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('admin.users.index') }}" class="menu-link">
                <i class="menu-icon fa-regular fa-user"></i>
                <div>User</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('admin.sizes.index') }}" class="menu-link">
                <i class="menu-icon fa-solid fa-palette"></i>
                <div>Size</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('admin.colors.index') }}" class="menu-link">
                <i class="menu-icon fa-solid fa-palette"></i>
                <div>Color</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('admin.carts.index') }}" class="menu-link">
                <i class="menu-icon fa-solid fa-cart-shopping"></i>
                <div>Cart</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('admin.attribute.index') }}" class="menu-link">
                <i class="menu-icon fa-solid fa-star"></i>
                <div>Attribute</div>
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
            <div
              class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none"
            >
              <a
                class="nav-item nav-link px-0 me-xl-4"
                href="javascript:void(0)"
              >
                <i class="mdi mdi-menu mdi-24px"></i>
              </a>
            </div>

            <div
              class="navbar-nav-right d-flex align-items-center"
              id="navbar-collapse"
            >
              <!-- Search -->
              <div class="navbar-nav align-items-center">Dashboard >   </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                  >
                    <div class="avatar avatar-online">
                      <img
                        src="../assets/img/avatars/1.png"
                        alt
                        class="w-px-40 h-auto rounded-circle"
                      />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                    <li>
                      <a class="dropdown-item pb-2 mb-1" href="#">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0 me-2 pe-1">
                            <div class="avatar avatar-online">
                              <img
                                src="../assets/img/avatars/1.png"
                                alt
                                class="w-px-40 h-auto rounded-circle"
                              />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0">John Doe</h6>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="mdi mdi-account-outline me-1 mdi-20px"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="mdi mdi-cog-outline me-1 mdi-20px"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i
                            class="flex-shrink-0 mdi mdi-credit-card-outline me-1 mdi-20px"
                          ></i>
                          <span class="flex-grow-1 align-middle ms-1"
                            >Billing</span
                          >
                          <span
                            class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20"
                            >4</span
                          >
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);">
                        <i class="mdi mdi-power me-1 mdi-20px"></i>
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


