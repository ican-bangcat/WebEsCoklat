<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Es Coklat Mantap | Checkout</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/assets/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/lightbox/assets/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    {{-- <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: #d9534f !important; /* Ubah sesuai warna yang diinginkan */
            color: white !important;
            border: none !important;
        }
    
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #c9302c !important; /* Warna saat hover */
            color: white !important;
        }
    
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #6C370B !important; /* Warna untuk halaman aktif */
            color: white !important;
        }
    </style> --}}
    

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar  d-none d-lg-block" style="background-color:#6C370B ">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-white">Jalan Sekolah</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-white">amelia23si@mahasiswa.pcr.ac.id</a></small>
                </div>
                {{-- <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                    <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div> --}}
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text display-6" style="color:#6C370B ">Es Coklat Mantap</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="/" class="nav-item nav-link active" style="color: #6C370B;">Beranda</a>
                        <a href="{{ route('produk.customer') }}" class="nav-item nav-link"
                            style="color: #6C370B;">Daftar Menu</a>
                        <a href="{{ route('cart') }}" class="nav-item nav-link" style="color: #6C370B;">Keranjang</a>
                       
                        <a href="{{ route('checkout.show') }}" class="nav-item nav-link" style="color: #6C370B;">Checkout</a>
                    </div>


                    {{-- <a href="{{ route('contact.index') }}" class="nav-item nav-link">Contact</a> --}}
                    <div class="d-flex m-3 me-0">
                        {{-- <button
                            class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                            data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="fas fa-search text " style="color:#6C370B "></i>
                        </button> --}}
                        <a href="{{ route('cart') }}" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x" style="color:#6C370B "></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                        </a>

                        <a href="#" class="my-auto">
                            <i class="fas fa-user fa-2x" style="color:#6C370B "></i>
                        </a>

                        {{-- <!-- Tambahkan tombol Login di sini -->
                            <a href="{{ url('/login') }}" class="btn btn-outline-primary my-auto me-3">Login</a>
                            <!-- Ikon User --> --}}


                    </div>
                    <div class="d-flex m-3 me-0">
                        <!-- Jika user sudah login, tampilkan tombol Logout -->
                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger my-auto me-3">Logout</button>
                            </form>
                        @else
                            <!-- Jika user belum login, tampilkan tombol Login -->
                            <a href="{{ url('/login') }}" class="btn btn-custom my-auto me-3">Login</a>

                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#" class="text-secondary">Beranda</a></li>
            {{-- <li class="breadcrumb-item"><a href="#" class="text-secondary">Pages</a></li> --}}

            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->
    <!-- Cart Page Start -->
    <div class="container py-5">
        <div class="row">
           
            <div class="col-md-8">
                <!-- Card Daftar Pemesanan -->
                <div class="card shadow">
                    <div class="card-header  text-white" style="background-color: #6C370B">
                        <h4 class="mb-0 text-white" style="">Daftar Pemesanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="pemesananTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal Pemesanan</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Status</th>
                                        {{-- <th scope="col">Aksi</th> --}}
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->tanggal_pemesanan->format('d M Y, H:i') }}</td>
                                            <td>Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                            <td>{{ $item->status }}
                                                @if (is_null($item->bukti_pembayaran))
                                                    <span class="badge bg-danger">Belum Dibayar</span>
                                                    <p class="text-muted small">Harap Upload Bukti Pembayaran</p>
                                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#uploadModal{{ $item->id_pemesanan }}">
                                                        Upload Bukti Pembayaran
                                                    </button>
                                                @elseif ($item->status === 'Pending')
                                                    <span class="badge bg-warning">Menunggu Konfirmasi</span>
                                                @elseif ($item->status === 'Approved')
                                                    <span class="badge bg-success">Pembayaran Disetujui</span>
                                                @endif
    
    
                                                <!-- Modal -->
                                                <div class="modal fade" id="uploadModal{{ $item->id_pemesanan  }}"
                                                    tabindex="-1" aria-labelledby="uploadModalLabel{{ $item->id_pemesanan  }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="uploadModalLabel{{ $item->id_pemesanan  }}">
                                                                    Upload Bukti Pembayaran
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form
                                                                action="{{ route('pemesanan.upload', $item->id_pemesanan) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="bukti_pembayaran" class="form-label">
                                                                            Unggah Bukti Pembayaran
                                                                        </label>
                                                                        <input type="file" name="bukti_pembayaran"
                                                                            class="form-control" id="bukti_pembayaran"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Unggah
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td>
                                                <!-- Tombol untuk bayar -->
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#paymentModal{{ $item->id }}">
                                                    Bayar Kesini
                                                </button>
    
                                                <!-- Modal -->
                                                <div class="modal fade" id="paymentModal{{ $item->id }}"
                                                    tabindex="-1" aria-labelledby="paymentModalLabel{{ $item->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="paymentModalLabel{{ $item->id }}">Bayar Disini
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ asset('path/to/your/image.png') }}"
                                                                    alt="Metode Pembayaran" class="img-fluid rounded"
                                                                    style="max-width: 100%; height: auto;">
                                                                <p class="mt-3">Silakan lakukan pembayaran menggunakan QR
                                                                    Code atau informasi di atas.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td> --}}
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id_pemesanan }}" >
                                                    <i class="bi bi-info-circle"></i>
                                                </button>
                                            
                                                <!-- Modal untuk detail pemesanan -->
                                                <div class="modal fade" id="detailModal{{ $item->id_pemesanan }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id_pemesanan }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailModalLabel{{ $item->id_pemesanan }}">Detail Pemesanan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Informasi detail pemesanan -->
                                                                <p><strong>ID Pemesanan:</strong> {{ $item->id_pemesanan }}</p>
                                                                <p><strong>Tanggal:</strong> {{ $item->tanggal_pemesanan->format('d M Y, H:i') }}</p>
                                                                <p><strong>Status:</strong> {{ $item->status }}</p>
                                                                <p><strong>Total Harga:</strong> Rp{{ number_format($item->total_harga, 0, ',', '.') }}</p>
                                                                <hr>
                                                                <h6>Detail Produk</h6>
                                                                <ul>
                                                                    {{-- @foreach ($item->detailPemesanan as $detail) --}}
                                                                    @foreach ($item->detailPemesanan ?? [] as $detail)
                                                                    <li>
                                                                        {{ $detail->produk->nama_produk }} - {{ $detail->jumlah }} x Rp{{ number_format($detail->harga_total / $detail->jumlah, 0, ',', '.') }} 
                                                                        = <strong>Rp{{ number_format($detail->harga_total, 0, ',', '.') }}</strong>
                                                                    </li>
                                                                @endforeach
                                                                
                                                                   
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                </div>
            </div>
            <div class="col-md-4">
                <!-- Card Metode Pembayaran -->
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Metode Pembayaran</h5>
                        <p class="mb-3">Harap lakukan pembayaran melalui metode berikut:</p>
                        <img src="{{ asset('assets/img/dana.jpg') }}" alt="Metode Pembayaran" class="img-fluid rounded" style="max-width: 200px;">
                        <p class="mt-3 text-muted">Silakan unggah bukti pembayaran di bagian "Daftar Pemesanan" setelah membayar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    






    <!-- Back to Top -->
     <!-- Back to Top -->
     <a href="#" class="btn btn border-3 border-warning rounded-circle back-to-top"><i
        class="fa fa-arrow-up"  style="color: #6C370B"></i></a>


    {{-- <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/lightbox/assets/js/lightbox.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script> --}}
    <!-- JQuery Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


    <link href="{{ asset('assets/lib/easing/easing.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/waypoints/waypoints.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/lightbox/assets/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000 // Waktu dalam milidetik
            });
        </script>
    @endif
    <!-- jQuery dan DataTables JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pemesananTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/Indonesian.json"
                }
            });
        });
    </script>

</body>

</html>
