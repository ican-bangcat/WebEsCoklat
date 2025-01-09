<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daftar Menu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
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


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Daftar Menu</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#" class="text-secondary">Beranda</a></li>
            {{-- <li class="breadcrumb-item"><a href="#" class="text-secondary">Pages</a></li> --}}
            <li class="breadcrumb-item active text-white">Daftar Menu</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h2 class="text-center fw-bold mb-4">Daftar Menu</h2>
            <div class="row g-4">
                <div class="col-lg-12">

                    <div class="row g-4">

                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                @foreach ($produk as $item)
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset('storage/' . $item->foto_produk) }}"
                                                    class="img-fluid w-100 rounded-top"
                                                    alt="{{ $item->nama_produk }}">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">{{ $item->kategori }}</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{ $item->nama_produk }}</h4>
                                                <p>{{ $item->deskripsi }}</p>
                                                {{-- <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">
                                                        Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary">
                                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart
                                                    </a>
                                                </div> --}}
                                                <div class="card h-100">
                                                    <div class="card-body d-flex flex-column justify-content-between">
                                                        <h5 class="card-title">{{ $item->nama }}</h5>
                                                        <p class="card-text">{{ $item->deskripsi }}</p>
                                                        <div class="d-flex justify-content-between align-items-center mt-auto">
                                                            <p class="text-dark fs-5 fw-bold mb-0">
                                                                Rp{{ number_format($item->harga, 0, ',', '.') }}
                                                            </p>
                                                            <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                                <button type="submit" class="btn btn-outline-primary rounded-pill">
                                                                    <i class="fa fa-shopping-bag me-2"></i> +Keranjang
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>
                                        <a href="#" class="rounded">4</a>
                                        <a href="#" class="rounded">5</a>
                                        <a href="#" class="rounded">6</a>
                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


    <!-- Footer Start -->
    
    <!-- Footer End -->

    
    <!-- Copyright End -->



     <!-- Back to Top -->
     <a href="#" class="btn btn border-3 border-warning rounded-circle back-to-top"><i
        class="fa fa-arrow-up"  style="color: #6C370B"></i></a>


    <!-- JavaScript Libraries -->
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
</body>

</html>
