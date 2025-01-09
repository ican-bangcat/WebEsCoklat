<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets2/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.0/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

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

                        <li class="sidebar-item  active">
                            <a href="{{ route('dashboardAdmin') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>



                        <li class="sidebar-title">Form &amp; Tabel</li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Produk</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('produk') }}">List Produk</a>
                                </li>
                                <li class="submenu-item ">
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
                                <span>Dashboard Customer</span>
                            </a>
                        </li>

                        {{-- <li class="sidebar-item  ">
                            <a href="application-checkout.html" class='sidebar-link'>
                                <i class="bi bi-basket-fill"></i>
                                <span>Checkout Page</span>
                            </a>
                        </li> --}}

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Autentikasi</span>
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

            {{-- <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Profile Views</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Followers</h6>
                                                <h6 class="font-extrabold mb-0">183.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Following</h6>
                                                <h6 class="font-extrabold mb-0">80.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('assets2/images/faces/1.jpg') }}" alt="Face 1">

                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                        <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>


                    </div>
                </section>
            </div> --}}
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>List Pesanan</h3>
                            <p class="text-subtitle text-muted">Daftar Pesanan yang tersedia</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                {{-- <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                                </ol> --}}

                                <!-- Button with user icon and username -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="User Info">
                                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                                </button>
                            </nav>
                        </div>

                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Data Pesanan</h4>
                            {{-- <a href="{{ route('') }}" class="btn btn-primary btn-sm">
                                Tambah Produk

                            </a> --}}
                            <div class="divButton">

                                <button class="btn btn-outline-primary" id="Print">Print</button>
                                <button class="btn btn-outline-danger" id="PDF">PDF</button>
                                <button class="btn btn-outline-success" id="Excel">Excel</button>
                                <button class="btn btn-outline-success" id="CSV">CSV</button>
                                <button class="btn btn-outline-info" id="Copy">Copy</button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('flash_notification'))
                                <div class="alert alert-success">
                                    {{ session('flash_notification.message') }}
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="tableData">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Pemesanan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Status</th>
                                        <th>Total Harga</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemesanan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id_pemesanan }}</td>
                                            <td>{{ $item->tanggal_pemesanan->format('d M Y') }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->status == 'Approved' ? 'bg-success' : ($item->status == 'Rejected' ? 'bg-danger' : 'bg-warning') }}">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td>Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($item->bukti_pembayaran)
                                                    <!-- Gambar Bukti Pembayaran -->
                                                    <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" 
                                                         alt="Bukti Pembayaran" width="50" height="50" 
                                                         style="cursor: pointer;" 
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#buktiPembayaranModal{{ $item->id_pemesanan }}">
                                                         
                                                    <!-- Modal untuk Pop-Up Gambar -->
                                                    <div class="modal fade" id="buktiPembayaranModal{{ $item->id_pemesanan }}" tabindex="-1" 
                                                         aria-labelledby="buktiPembayaranLabel{{ $item->id_pemesanan }}" 
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="buktiPembayaranLabel{{ $item->id_pemesanan }}">
                                                                        Bukti Pembayaran
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" 
                                                                         alt="Bukti Pembayaran" class="img-fluid">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span>-</span>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <!-- Tombol Detail -->
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{ $item->id_pemesanan }}">
                                                    <i class="bi bi-info-circle"></i>
                                                </button>

                                                <!-- Modal untuk Detail Pemesanan -->
                                                <div class="modal fade" id="detailModal{{ $item->id_pemesanan }}"
                                                    tabindex="-1"
                                                    aria-labelledby="detailModalLabel{{ $item->id_pemesanan }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="detailModalLabel{{ $item->id_pemesanan }}">
                                                                    Detail Pemesanan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Informasi Detail Pemesanan -->
                                                                <p><strong>ID Pemesanan:</strong>
                                                                    {{ $item->id_pemesanan }}</p>
                                                                <p><strong>Tanggal Pemesanan:</strong>
                                                                    {{ $item->tanggal_pemesanan->format('d M Y, H:i') }}
                                                                </p>
                                                                <p><strong>Status:</strong> {{ $item->status }}</p>
                                                                <p><strong>Total Harga:</strong>
                                                                    Rp{{ number_format($item->total_harga, 0, ',', '.') }}
                                                                </p>
                                                                <hr>
                                                                <h6>Detail Produk</h6>
                                                                <ul>
                                                                    @forelse ($item->detailPemesanan as $detail)
                                                                        <li>
                                                                            {{ $detail->produk->nama_produk }} -
                                                                            {{ $detail->jumlah }} x
                                                                            Rp{{ number_format($detail->harga_total / $detail->jumlah, 0, ',', '.') }}
                                                                            =
                                                                            <strong>Rp{{ number_format($detail->harga_total, 0, ',', '.') }}</strong>
                                                                        </li>
                                                                    @empty
                                                                        <li>Tidak ada detail produk.</li>
                                                                    @endforelse
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <!-- Tombol Update -->
                                                <button type="button" class="btn btn-info btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#updateModal{{ $item->id_pemesanan }}">
                                                    <i class="bi bi-pencil-square"></i> Update Status
                                                </button>

                                                <!-- Modal Update Status -->
                                                <div class="modal fade" id="updateModal{{ $item->id_pemesanan }}"
                                                    tabindex="-1"
                                                    aria-labelledby="updateModalLabel{{ $item->id_pemesanan }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="updateModalLabel{{ $item->id_pemesanan }}">
                                                                    Update Status Pemesanan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('pemesanan.updateStatus', $item->id_pemesanan) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="status"
                                                                            class="form-label">Status Pemesanan</label>
                                                                        <select class="form-select" name="status"
                                                                            id="status" required>
                                                                            <option value="Pending"
                                                                                {{ $item->status == 'Pending' ? 'selected' : '' }}>
                                                                                Pending</option>
                                                                            <option value="Approved"
                                                                                {{ $item->status == 'Approved' ? 'selected' : '' }}>
                                                                                Approved</option>
                                                                            <option value="Rejected"
                                                                                {{ $item->status == 'Rejected' ? 'selected' : '' }}>
                                                                                Rejected</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Update
                                                                            Status</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>



                        </div>
                    </div>
                </section>
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
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets2/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets2/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets2/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets2/js/main.js') }}"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
        <!-- Load jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

        <!-- Load DataTables JS -->
        <script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script>

        <!-- Load Buttons JS (untuk export) -->

        <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
   
        <!-- end  EXPORT FILE  -->
    @endif
    {{-- <script>
        $(document).ready(function() {
            $('#tableData').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    // {
                    //     extend: 'copy',
                    //     text: 'Copy'
                    // },
                    // {
                    //     extend: 'csv',
                    //     text: 'Export CSV'
                    // },
                    // {
                    //     extend: 'excel',
                    //     text: 'Export Excel'
                    // },
                    {
                        extend: 'pdf',
                        text: 'Export PDF'
                    },
                    {
                        extend: 'print',
                        text: 'Print'
                    }
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script> --}}
    
        <script type="text/javascript">
            $(document).ready(function() {
    var table = new DataTable('#tableData', {
        dom: '<"top"lf>Brt<"bottom"ip>',
        buttons: [
            {
                extend: 'excel',
                init: function(api, node, config) {
                    $(node).hide();
                }
            },
            {
                extend: 'copy',
                init: function(api, node, config) {
                    $(node).hide();
                }
            },
            {
                extend: 'csv',
                init: function(api, node, config) {
                    $(node).hide();
                }
            },
            {
                extend: 'print',
                init: function(api, node, config) {
                    $(node).hide();
                }
            },
            {
                extend: 'pdf',
                init: function(api, node, config) {
                    $(node).hide();
                }
            }
        ],
        lengthMenu: [10, 25, 50, 100], // Tambahkan opsi dropdown untuk jumlah entri
        pageLength: 10 // Jumlah entri default
    });

    // Menyambungkan tombol dengan button DataTables
    $('#Print').on('click', function() {
        table.button('.buttons-print').trigger();
    });
    $('#PDF').on('click', function() {
        table.button('.buttons-pdf').trigger();
    });
    $('#CSV').on('click', function() {
        table.button('.buttons-csv').trigger();
    });
    $('#Excel').on('click', function() {
        table.button('.buttons-excel').trigger();
    });
    $('#Copy').on('click', function() {
        table.button('.buttons-copy').trigger();
    });
});

        </script>

</body>

</html>
