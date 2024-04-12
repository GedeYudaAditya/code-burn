<header>
    <div class="header-area ">
        <div class="header-top_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 ">
                        <div class="social_media_links">
                            <a href="{{ $twitter }}">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="{{ $facebook }}">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="mailto:{{ $email }}">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="short_contact_list">
                            <ul>
                                <li><a href="#"> <i class="fa fa-envelope"></i> {{ $email }}</a></li>
                                <li><a href="#"> <i class="fa fa-phone"></i> {{ $no_hp }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area" style="padding-bottom: 0px">
            <div>
                <div class="container">
                    <div class="row align-items-center pb-3">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="{{ route('index') }}">
                                    @if ($logo_light)
                                        <img src="{{ asset('/storage/' . $logo_light) }}" alt="">
                                    @else
                                        <img src="{{ asset('/end_user') }}/img/logo.png" alt="">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        @auth
                                            @if (Auth::user()->role == 'klien')
                                                <li><a class="{{ Route::is('klien.index') ? 'active' : '' }}"
                                                        href="{{ route('klien.index') }}">Home</a>
                                                </li>
                                                <li><a class="{{ Route::is('klien.perawat.*') ? 'active' : '' }}"
                                                        href="{{ route('klien.perawat.index') }}">Perawat</a></li>
                                                <li><a href="#">Pesanan<i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li class="hover"><a
                                                                href="{{ route('klien.pesanan.index') }}">Sedang
                                                                Berlangsung</a></li>
                                                        <li class="hover"><a
                                                                href="{{ route('klien.pesanan.history') }}">History
                                                                Pesanan</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @else
                                                <li><a class="{{ Route::is('perawat.index') ? 'active' : '' }}"
                                                        href="{{ route('perawat.index') }}">Home</a>
                                                </li>
                                                <li><a href="#">Pesanan<i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="{{ route('perawat.pesanan.index') }}">Masuk</a></li>
                                                        <li><a href="{{ route('perawat.pesanan.berlangsung') }}">Sedang
                                                                Berlangsung</a></li>
                                                        <li><a href="{{ route('perawat.pesanan.history') }}">History
                                                                Pesanan</a></li>
                                                    </ul>
                                                </li>
                                            @endif
                                            <li><a class="{{ Route::is('contact') ? 'active' : '' }}"
                                                    href="{{ route('contact') }}">Kontak</a></li>
                                        @else
                                            <li><a class="{{ Route::is('index') ? 'active' : '' }}"
                                                    href="{{ route('index') }}">Home</a>
                                            </li>
                                            <li><a class="{{ Route::is('guest.perawat.index') ? 'active' : '' }}"
                                                    href="{{ route('guest.perawat.index') }}">Perawat</a></li>
                                            <li><a class="{{ Route::is('contact') ? 'active' : '' }}"
                                                    href="{{ route('contact') }}">Kontak</a></li>
                                        @endauth

                                        {{-- show login and register --}}
                                        <li class="d-sm d-xl-none">
                                            <a href="#" data-toggle="modal"
                                                data-target="#notificationModal">Notification
                                                @php
                                                    $not_read = 0;
                                                    // check is_read
                                                    foreach (Auth::user()->notification as $notifs) {
                                                        if (!$notifs->is_read) {
                                                            $not_read += 1;
                                                        }
                                                    }
                                                @endphp
                                                @if ($not_read > 0)
                                                    <span
                                                        style="font-size: 12px; position: absolute; top: 0; right: -1;"
                                                        class="badge badge-danger">{{ $not_read }}</span>
                                                @endif
                                            </a>
                                        </li>
                                        <hr class="d-sm d-xl-none m-0">
                                        @auth
                                            {{-- account --}}
                                            <li class="d-sm d-xl-none">
                                                <a href="{{ route('profile') }}">Akun</a>
                                            </li>

                                            <li class="d-sm d-xl-none">
                                                <a href="{{ route('logout') }}">Keluar</a>
                                            </li>
                                        @else
                                            {{-- login --}}
                                            <li class="d-sm d-xl-none">
                                                <a href="{{ route('login') }}">Masuk</a>
                                            </li>

                                            {{-- register --}}
                                            <li class="d-sm d-xl-none">
                                                <a href="{{ route('register') }}">Daftar</a>
                                            </li>
                                        @endauth
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                @auth
                                    <div class="notification_icon mx-3" style="position: relative">
                                        <a href="#" data-toggle="modal" data-target="#notificationModal">
                                            <i class="fa fa-bell"></i>
                                            @php
                                                $not_read = 0;
                                                // check is_read
                                                foreach (Auth::user()->notification as $notifs) {
                                                    if (!$notifs->is_read) {
                                                        $not_read += 1;
                                                    }
                                                }
                                            @endphp
                                            @if ($not_read > 0)
                                                <span style="font-size: 12px; position: absolute; top: 0; right: -1;"
                                                    class="badge badge-danger">{{ $not_read }}</span>
                                            @endif
                                        </a>
                                    </div>
                                    {{-- end notification icon --}}

                                    {{-- account --}}
                                    <div class="m-2 book_btn d-none d-lg-block">
                                        <a href="{{ route('profile') }}">Akun</a>
                                    </div>

                                    <div class="m-2 book_btn d-none d-lg-block">
                                        <a href="{{ route('logout') }}">Keluar</a>
                                    </div>
                                @else
                                    {{-- login --}}
                                    <div class="m-2 book_btn d-none d-lg-block">
                                        <a href="{{ route('login') }}">Masuk</a>
                                    </div>

                                    {{-- register --}}
                                    <div class="m-2 book_btn d-none d-lg-block">
                                        <a href="{{ route('register') }}">Daftar</a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
                {{-- check user sudah melengkapi data --}}
                @if (Auth::check())
                    @if (Auth::user()->role == 'klien')
                        @if (Auth::user()->no_ktp == null ||
                                Auth::user()->alamat == null ||
                                Auth::user()->no_hp == null ||
                                Auth::user()->ktp == null)
                            <div class="alert alert-danger text-center" role="alert" style="margin: 0px">
                                <strong>Perhatian!</strong> Silahkan lengkapi data diri anda terlebih dahulu.
                                <a href="{{ route('profile') }}" class="alert-link">Klik disini</a> untuk melengkapi
                                data.
                            </div>
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>
</header>

@if (Auth::check())
    @if (Auth::user()->status == 'pending')
        <div class="alert alert-warning text-center" role="alert" style="margin: 0px">
            <strong>Perhatian!</strong> Akun anda belum aktif, data anda sedang di proses admin, jika ini terjadi lebih
            dari 3x24 jam silahkan hubungi admin.
        </div>
    @elseif(Auth::user()->status == 'nonaktif')
        <div class="alert alert-danger text-center" role="alert" style="margin: 0px">
            <strong>Perhatian!</strong> Akun anda tidak aktif, Ini mungkin terjadi karena anda melakukan pelanggaran
            tertentu, silahkan hubungi admin untuk mengaktifkan kembali.
        </div>
    @endif
@endif

@auth
    <style>
        .notification_container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .notification_header {
            width: 100%;
            padding: 10px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .notification_header h5 {
            margin: 0px;
        }

        .notification_body {
            width: 100%;
            padding: 10px;
        }

        .notification_list {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .notification_item {
            width: 100%;
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }

        .notification_item_content {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .notification_item_content p {
            margin: 0px;
        }

        .notification_item_content span {
            font-size: 12px;
            color: #6c757d;
        }

        .readed {
            background-color: #f8f9fa;
        }
    </style>
    {{-- modal notification --}}
    <div class="modal fade bd-example-modal-md" id="notificationModal" tabindex="-1" role="dialog"
        aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3" style="overflow-y: auto; max-height: 400px;">
                    <div class="notification_container">
                        {{-- <div class="notification_header">
                    <h5>Notifikasi</h5>
                </div> --}}
                        <div class="notification_body">
                            <div class="notification_list">
                                @if (Auth::user()->notification->count() > 0)
                                    @php
                                        $notification = Auth::user()->notification->sortByDesc('created_at');
                                    @endphp
                                    @foreach ($notification as $notif)
                                        <div
                                            class="notification_item card p-3 mb-3 {{ $notif->is_read == true ? 'readed' : '' }}">
                                            <div class="row align-items-center">
                                                <div class="col-1 text-center">
                                                    <i class="fa fa-bell" style="font-size: large"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="notification_item_content">
                                                        <h6>{{ $notif->title }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-2">
                                            <div class="notification_item_content">
                                                <p>{{ $notif->message }}</p>
                                                <span>{{ $notif->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="notification_item">
                                        <div class="notification_item_content text-center">
                                            <p>Tidak ada notifikasi</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth
{{-- end modal notification --}}
