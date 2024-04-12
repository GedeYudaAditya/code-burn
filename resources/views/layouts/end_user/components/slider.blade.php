<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text ">
                            <h3> <span>Jaga Dan Rawat</span> <br>
                                Dengan Perawat Kami </h3>
                            <p>
                                Jaga dan rawat kesehatan anda dengan perawat kami yang sudah berpengalaman dan <br>
                                profesional.
                            </p>
                            @if (auth()->check())
                                @if (auth()->user()->role == 'klien')
                                    <a href="{{ route('klien.perawat.index') }}" class="boxed-btn3">Cek Perawat Kami</a>
                                @else
                                    <a href="{{ route('profile') }}" class="boxed-btn3">Cek Profil Anda</a>
                                @endif
                            @else
                                <a href="{{ route('guest.perawat.index') }}" class="boxed-btn3">Cek Perawat Kami</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text ">
                            <h3> <span>Perawat Ahli</span> <br>
                                Percayakan Kepada Kami </h3>
                            <p>
                                Kami memiliki syarat dan ketentuan yang ketat untuk perawat kami, <br>
                                sehingga anda dapat percaya kepada kami.
                            </p>
                            @if (auth()->check())
                                @if (auth()->user()->role == 'klien')
                                    <a href="{{ route('klien.perawat.index') }}" class="boxed-btn3">Cek Perawat Kami</a>
                                @else
                                    <a href="{{ route('profile') }}" class="boxed-btn3">Cek Profil Anda</a>
                                @endif
                            @else
                                <a href="{{ route('guest.perawat.index') }}" class="boxed-btn3">Cek Perawat Kami</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text ">
                            <h3> <span>Mudah Ditemukan</span> <br>
                                Dengan Domisili Anda </h3>
                            <p>
                                Kami memiliki perawat yang tersebar di seluruh Bali, sehingga anda dapat<br>
                                dengan mudah menemukan perawat kami dengan domisili anda.
                            </p>
                            @if (auth()->check())
                                @if (auth()->user()->role == 'klien')
                                    <a href="{{ route('klien.perawat.index') }}" class="boxed-btn3">Cek Perawat Kami</a>
                                @else
                                    <a href="{{ route('profile') }}" class="boxed-btn3">Cek Profil Anda</a>
                                @endif
                            @else
                                <a href="{{ route('guest.perawat.index') }}" class="boxed-btn3">Cek Perawat Kami</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
