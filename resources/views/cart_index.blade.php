<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <h1 class="text-center text-white display-6">Keranjang</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#" class="text-secondary">Beranda</a></li>
            {{-- <li class="breadcrumb-item"><a href="#" class="text-secondary">Pages</a></li> --}}

            <li class="breadcrumb-item active text-white">Keranjagt</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->
    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr data-id="{{ $item->id_keranjang }}">
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $item->produk->foto_produk) }}"
                                            class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                            alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{ $item->produk->nama_produk }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4 price" data-price="{{ $item->produk->harga }}">
                                        Rp{{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4 ">{{ $item->jumlah }}</p>

                                </td>
                                <td>
                                    <p class="mb-0 mt-4 total-price">
                                        Rp{{ number_format($item->jumlah * $item->produk->harga, 0, ',', '.') }}</p>
                                </td>
                                <td>
                                    {{-- <form action="{{ route('cart.remove', $item->id_keranjang) }}" method="POST">
                                        @csrf --}}
                                    <button class="btn btn-md rounded-circle bg-light border mt-4"
                                        data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_keranjang }}">
                                        <i class="fa fa-pencil-alt " style="color: #6C370B"></i>
                                    </button>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $item->id_keranjang }}">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                    {{-- </form> --}}

                                </td>
                                <!-- Tombol Edit -->


                            </tr>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $item->id_keranjang }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $item->id_keranjang }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $item->id_keranjang }}">Edit
                                                Item</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('cart.update', $item->id_keranjang) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="jumlah{{ $item->id_keranjang }}"
                                                        class="form-label">Jumlah</label>
                                                    <input type="number" class="form-control"
                                                        id="jumlah{{ $item->id_keranjang }}" name="jumlah"
                                                        value="{{ $item->jumlah }}" min="1">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal{{ $item->id_keranjang }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $item->id_keranjang }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">
                                                Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus produk
                                            <strong>{{ $item->produk->nama_produk }}</strong> dari keranjang?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('cart.remove', $item->id_keranjang) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text fw-bold">Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="fw-bold">Rp{{ number_format($total, 0, ',', '.') }}</td>
                            {{-- <td colspan="3" class="text-end"> --}}
                            <!-- Form Checkout -->
                            <form action="{{ route('checkout.add') }}" method="POST">
                                <td>
                                    @csrf
                                    <input type="hidden" name="total_harga" value="{{ $total }}">
                                    <button class="btn  text-uppercase rounded-pill px-4 py-2  text-white h-100"
                                        type="submit" style="background-color: #6C370B">
                                        Checkout
                                    </button>
                            </form>
                            </td>

                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>



    <!-- Footer Start -->
    {{-- <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0">Fruitables</h1>
                            <p class="text-secondary mb-0">Fresh products</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number"
                                placeholder="Your Email">
                            <button type="submit"
                                class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white"
                                style="top: 0; right: 0;">Subscribe Now</button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why People Like us!</h4>
                        <p class="mb-4">typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                        <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read
                            More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Shop Info</h4>
                        <a class="btn-link" href="">About Us</a>
                        <a class="btn-link" href="">Contact Us</a>
                        <a class="btn-link" href="">Privacy Policy</a>
                        <a class="btn-link" href="">Terms & Condition</a>
                        <a class="btn-link" href="">Return Policy</a>
                        <a class="btn-link" href="">FAQs & Help</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Account</h4>
                        <a class="btn-link" href="">My Account</a>
                        <a class="btn-link" href="">Shop details</a>
                        <a class="btn-link" href="">Shopping Cart</a>
                        <a class="btn-link" href="">Wishlist</a>
                        <a class="btn-link" href="">Order History</a>
                        <a class="btn-link" href="">International Orders</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: 1429 Netus Rd, NY 48247</p>
                        <p>Email: Example@gmail.com</p>
                        <p>Phone: +0123 4567 8910</p>
                        <p>Payment Accepted</p>
                        <img src="img/payment.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Footer End -->

    <!-- Copyright Start -->
    {{-- <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your
                            Site Name</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a
                        class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    
    {{-- <script>
        document.querySelectorAll('.increase-btn, .decrease-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default action (form submission)

                const action = this.getAttribute('data-action');
                const row = this.closest('tr');
                const quantityInput = row.querySelector('.quantity-input');
                let currentQuantity = parseInt(quantityInput.value);
                if (isNaN(currentQuantity)) currentQuantity = 1; // Default to 1 if invalid
                const idKeranjang = row.getAttribute('data-id');

                // Adjust quantity based on action (increase or decrease)
                if (action === 'increase') {
                    currentQuantity++;
                } else if (action === 'decrease' && currentQuantity > 1) {
                    currentQuantity--;
                }

                // Update the quantity display
                quantityInput.value = currentQuantity;

                // Get the price from the data-price attribute
                const price = parseInt(row.querySelector('.price').getAttribute('data-price'));

                // Calculate the new total price
                const totalPrice = currentQuantity * price;

                // Update the total price display
                const totalPriceElement = row.querySelector('.total-price');
                totalPriceElement.textContent = `Rp${totalPrice.toLocaleString('id-ID')}`;

                // Send the update request to the backend using AJAX (Fetch API)
                fetch(`/cart/update/${id_keranjang}/${action}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error('Error updating cart:', data.error);
                        } else {
                            // Update quantity and total price on the frontend
                            quantityInput.value = data.newQuantity;
                            row.querySelector('.total-price').textContent = `Rp${data.newTotalPrice}`;
                        }
                    })
                    .catch(error => {
                        console.error('Error updating cart:', error);
                    });
            });
        });
    </script> --}}



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
