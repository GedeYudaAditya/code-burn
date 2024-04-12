<!-- Emergency_contact start -->
<div class="Emergency_contact">
    <div class="conatiner-fluid p-0">
        <div class="row no-gutters">
            <div class="col-xl-6">
                <div
                    class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                    <div class="info">
                        <h3>Untuk Semua Kontak Darurat</h3>
                        <p>Anda dapat menghubungi nomor darurat kami di bawah ini.</p>
                    </div>
                    <div class="info_button">
                        <a href="#" class="boxed-btn3-white">
                            {{ $no_hp }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div
                    class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                    <div class="info">
                        <h3>Buat Pesanan</h3>
                        <p>Anda dapat memesan perawat kami dengan mudah.</p>
                    </div>
                    <div class="info_button">
                        @if (auth()->check())
                            @if (auth()->user()->role == 'klien')
                                <a href="{{ route('klien.perawat.index') }}" class="boxed-btn3-white">Buat Pesanan</a>
                            @else
                                <a href="{{ route('profile') }}" class="boxed-btn3-white">Cek Profil Anda</a>
                            @endif
                        @else
                            <a href="{{ route('guest.perawat.index') }}" class="boxed-btn3-white">Buat Pesanan</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Emergency_contact end -->

<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                @if ($logo_dark)
                                    <img src="{{ asset('/storage/' . $logo_dark) }}" alt="">
                                @else
                                    <img src="{{ asset('/end_user') }}/img/footer_logo.png" alt="">
                                @endif
                            </a>
                        </div>
                        <p>
                            {{ $short_desc }}
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="{{ $facebook }}">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $twitter }}">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $instagram }}">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        {{-- <h3 class="footer_title">
                            Useful Links
                        </h3>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#"> Contact</a></li>
                            <li><a href="#"> Appointment</a></li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Menu
                        </h3>
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('contact') }}">Kontak</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Address
                        </h3>
                        <p>
                            {{ $alamat }} <br>
                            {{ $no_hp }} <br>
                            {{ $email }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
