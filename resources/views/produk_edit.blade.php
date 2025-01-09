<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable - List Produk</title>

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
                            {{-- <a href="index.html"> <img src="{{ asset('assets2/images/logo/logo.png') }}" alt="Logo"
                                    srcset=""></a> --}}
                                    <a href="">Es Coklat Mantap</a>
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
                            <a href="{{ route('dashboardAdmin') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>



                        <li class="sidebar-title">Forms &amp; Tables</li>

                        <li class="sidebar-item has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Produk</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item ">
                                    <a href="{{ route('produk') }}">List Produk</a>
                                </li>
                                <li class="submenu-item active">
                                    <a href="form-element-input-group.html">Input Produk</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
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
                            <h3>Edit Produk</h3>
                            <p class="text-subtitle text-muted">Silahkan edit produk</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item " aria-current="page"><a href="{{ route('produk') }}">Produk</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Produk</h4>
                        </div>
                        <div class="card-body">
                            <form id="editProdukForm" action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" id="nama_produk" name="nama_produk" class="form-control"
                                        value="{{ $produk->nama_produk }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" id="harga" name="harga" class="form-control"
                                        value="{{ $produk->harga }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4">{{ $produk->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" id="stok" name="stok" class="form-control"
                                        value="{{ $produk->stok }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="foto_produk">Foto Produk</label>
                                    <input type="file" id="foto_produk" name="foto_produk" class="form-control">
                                    @if ($produk->foto_produk)
                                        <img src="{{ asset('storage/' . $produk->foto_produk) }}" alt="Foto Produk" class="img-thumbnail mt-2" style="width: 150px;">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                </div>
                                <!-- Tombol Update -->
                                <div class="form-group mt-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                        Update
                                    </button>
                                    <a href="{{ route('produk') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                
                <!-- Modal Konfirmasi Update -->
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Edit Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin mengedit produk <strong>{{ $produk->nama_produk }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <!-- Formulir ini hanya akan diproses jika tombol Ya diklik -->
                                <button type="submit" class="btn btn-primary" form="editProdukForm">Ya, Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            {{-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>
    <script src="{{ asset('assets2/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets2/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{ asset('assets2/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
