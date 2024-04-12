<!doctype html>
<html class="no-js" lang="zxx">

@php
    $title_web = App\Models\Parameter::where('kunci', 'nama_web')->first()->nilai ?? 'Docmed';

    $logo_dark = App\Models\Parameter::where('kunci', 'logo_dark')->first()->nilai ?? null;
    $logo_light = App\Models\Parameter::where('kunci', 'logo_light')->first()->nilai ?? null;

    $short_desc = App\Models\Parameter::where('kunci', 'short_description')->first()->nilai ?? 'Tambahkan deskripsi singkat tentang website anda disini.';

    // social media
    $facebook = App\Models\Parameter::where('kunci', 'facebook')->first()->nilai ?? '#';
    $instagram = App\Models\Parameter::where('kunci', 'instagram')->first()->nilai ?? '#';
    $twitter = App\Models\Parameter::where('kunci', 'twitter')->first()->nilai ?? '#';

    // kontak
    $alamat = App\Models\Parameter::where('kunci', 'alamat')->first()->nilai ?? 'Jl. Contoh Alamat No. 1';
    $no_hp = App\Models\Parameter::where('kunci', 'tlp')->first()->nilai ?? '081234567890';
    $email = App\Models\Parameter::where('kunci', 'email')->first()->nilai ?? 'docmed@gmail.com';
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title_web }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/end_user') }}/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/admin_user') }}/plugins/fontawesome-free/css/all.min.css">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/gijgo.css">
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/slicknav.css">
    <link rel="stylesheet" href="{{ asset('/end_user') }}/css/style.css">

    {{-- cdn datatable css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    {{-- <!-- <link rel="stylesheet" href="{{ asset('/end_user') }}/css/responsive.css"> --> --}}

    <!-- Toastr -->
    {{-- <link rel="stylesheet" href="{{ asset('/admin_user') }}/plugins/toastr/toastr.min.css"> --}}

    {{-- sweet alert --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


    @yield('style')

    <style>
        .modal-backdrop {
            z-index: 999;
        }
    </style>

    {{-- jquery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script> --}}
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    @include('layouts.end_user.components.header', [
        'logo_dark' => $logo_dark,
        'logo_light' => $logo_light,
        'short_desc' => $short_desc,
        'facebook' => $facebook,
        'instagram' => $instagram,
        'twitter' => $twitter,
        'alamat' => $alamat,
        'no_hp' => $no_hp,
        'email' => $email,
    ])
    <!-- header-end -->

    {{-- success --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

    <!-- footer start -->
    @include('layouts.end_user.components.footer', [
        'logo_dark' => $logo_dark,
        'logo_light' => $logo_light,
        'short_desc' => $short_desc,
        'facebook' => $facebook,
        'instagram' => $instagram,
        'twitter' => $twitter,
        'alamat' => $alamat,
        'no_hp' => $no_hp,
        'email' => $email,
    ])
    <!-- footer end  -->
    <!-- link that opens popup -->

    <!-- form itself end-->
    <form id="test-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Make an Appointment</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-6">
                            <input id="datepicker" placeholder="Pick date">
                        </div>
                        <div class="col-xl-6">
                            <input id="datepicker2" placeholder="Suitable time">
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Select Department">Department</option>
                                <option value="1">Eye Care</option>
                                <option value="2">Physical Therapy</option>
                                <option value="3">Dental Care</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Doctors">Doctors</option>
                                <option value="1">Mirazul Alom</option>
                                <option value="2">Monzul Alom</option>
                                <option value="3">Azizul Isalm</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Phone no.">
                        </div>
                        <div class="col-xl-12">
                            <input type="email" placeholder="Email">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed-btn3">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->

    <!-- JS here -->
    <script src="{{ asset('/end_user') }}/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/popper.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/ajax-form.js"></script>
    <script src="{{ asset('/end_user') }}/js/waypoints.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/scrollIt.js"></script>
    <script src="{{ asset('/end_user') }}/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/wow.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/nice-select.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/jquery.slicknav.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/plugins.js"></script>
    <script src="{{ asset('/end_user') }}/js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="{{ asset('/end_user') }}/js/contact.js"></script>
    <script src="{{ asset('/end_user') }}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/jquery.form.js"></script>
    <script src="{{ asset('/end_user') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('/end_user') }}/js/mail-script.js"></script>

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- datatable js --}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    @yield('script')

    {{-- sweet alert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


    {{-- <script src="{{ asset('/admin_user') }}/plugins/jquery/jquery.min.js"></script> --}}
    {{-- sweet alert --}}
    @if (session('success'))
        <script>
            swal("Success!", "{{ session('success') }}", "success");
        </script>
    @elseif (session('error'))
        <script>
            swal("Error!", "{{ session('error') }}", "error");
        </script>
    @endif

    <script src="{{ asset('/end_user') }}/js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        // jika modal di buka maka notifikasi akan di set read
        $('#notificationModal').on('show.bs.modal', function(e) {
            $.ajax({
                url: "{{ route('notification.read') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });

        // jika modal di tutup refresh halaman
        $('#notificationModal').on('hidden.bs.modal', function(e) {
            location.reload();
        });
    </script>
</body>

</html>
