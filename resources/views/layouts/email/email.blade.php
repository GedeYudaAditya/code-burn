<!-- layouts/email/email.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $logo_dark = App\Models\Parameter::where('kunci', 'logo_dark')->first()->nilai ?? null;
        $logo_light = App\Models\Parameter::where('kunci', 'logo_light')->first()->nilai ?? null;

        // social media
        $facebook = App\Models\Parameter::where('kunci', 'facebook')->first()->nilai ?? '#';
        $instagram = App\Models\Parameter::where('kunci', 'instagram')->first()->nilai ?? '#';
        $twitter = App\Models\Parameter::where('kunci', 'twitter')->first()->nilai ?? '#';

        // kontak
        $alamat = App\Models\Parameter::where('kunci', 'alamat')->first()->nilai ?? 'Jl. Contoh Alamat No. 1';
        $no_hp = App\Models\Parameter::where('kunci', 'tlp')->first()->nilai ?? '081234567890';
        $email = App\Models\Parameter::where('kunci', 'email')->first()->nilai ?? 'docmed@gmail.com';
    @endphp
    <title>{{ $data['subject'] }}</title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('/end_user') }}/img/logo.png" alt="logo" class="mx-auto my-5">
            </div>
        </div>
        <h1 class="text-center mb-4">{{ $data['subject'] }}</h1>
        {!! $data['message'] !!}
        <hr>
        <p class="text-center"><small class="text-mute">Terima kasih telah menggunakan layanan kami.</small></p>
        {{-- social media --}}
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ $facebook }}" class="mx-2"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="{{ $instagram }}" class="mx-2"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="{{ $twitter }}" class="mx-2"><i class="fab fa-twitter fa-2x"></i></a>
            </div>
        </div>

    </div>
</body>

</html>
