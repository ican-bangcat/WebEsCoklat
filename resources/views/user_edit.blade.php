<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets2/images/favicon.svg') }}" type="image/x-icon">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets2/images/logo/logo.png" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>



                        <li class="sidebar-title">Forms &amp; Tables</li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Produk</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="form-element-input.html">List Produk</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-input-group.html">Input Produk</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item active ">
                            <a href="{{ route('user') }}" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>List User</span>
                            </a>
                        </li>


                        <li class="sidebar-title">Pages</li>

                        <li class="sidebar-item">
                            <a href="/" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Customer Page</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="application-checkout.html" class='sidebar-link'>
                                <i class="bi bi-basket-fill"></i>
                                <span>Checkout Page</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Authentication</span>
                            </a>
                            <ul class="submenu ">
                                {{-- <li class="submenu-item ">
                                    <a href="auth-login.html">Login</a>
                                </li> --}}
                                <li class="submenu-item ">
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="auth-forgot-password.html">Forgot Password</a>
                                </li>
                            </ul>
                        </li>
                        @auth
                            <li class="sidebar-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger w-100 text-start">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @endauth

                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>DataTable</h3>
                            <p class="text-subtitle text-muted">For user to check they list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/admin/user">User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Edit User
                        </div>
                        <div class="card-body">
                            <form action="/admin/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group mt-1 mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="name"
                                        value="{{ old('name') ?? $user->name }}">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                
                                <div class="form-group mt-1 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                        value="{{ old('email') ?? $user->email }}">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                
                                <div class="form-group mt-1 mb-3">
                                    <label for="role">Role</label>
                                    <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                        <option value="admin" {{ old('role') ?? $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="customer" {{ old('role') ?? $user->role === 'customer' ? 'selected' : '' }}>Customer</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                </div>
                                
                                
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </form>
                            
                        </div>
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets2/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets2/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{ asset('assets2/js/main.js') }}"></script>

</body>

</html>
