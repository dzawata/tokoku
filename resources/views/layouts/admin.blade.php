<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @stack('prepend-style')
    @include('includes.style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />
    @stack('addon-style')

</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="/images/dashboard-store-logo.svg" alt="" class="my-4" />
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('store-dashboard') }}" class="list-group-item list-group-item-action  list-group-item list-group-item-action {{ (request()->is('store/dashboard*')) ? 'active' : ''  }}">Dashboard</a>
                    <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action {{ (request()->is('store/product')) ? 'active' : ''  }}">Products</a>
                    <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('store/category*')) ? 'active' : ''  }}">Categories</a>
                    <a href="{{ route('product-gallery.index') }}" class="list-group-item list-group-item-action {{ (request()->is('store/product-gallery*')) ? 'active' : ''  }}">Gallery</a>
                    <a href="#" class="list-group-item list-group-item-action">Transactions</a>
                    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action {{ (request()->is('store/user*')) ? 'active' : ''  }}">Users</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
                    <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                        &laquo; Menu
                    </button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto d-none d-lg-flex">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="/images/icon-user.png" alt="" class="rounded-circle mr-2 profile-picture" />
                                    Hi, {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-inline-block mt-2" href="#">
                                    <img src="/images/icon-cart-empty.svg" alt="" />
                                </a>
                            </li>
                        </ul>
                        <!-- Mobile Menu -->
                        <ul class="navbar-nav d-block d-lg-none mt-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Hi, {{ Auth::user()->name }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- content -->
                @yield('content')
                <!-- end content -->
            </div>

            <!-- /#page-content-wrapper -->
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    @include('includes.script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
    @stack('addon-script')
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>