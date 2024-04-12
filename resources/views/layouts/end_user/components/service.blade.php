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

<div class="service_area">
    <div class="container p-0">
        <div class="row no-gutters">
            <div class="col-xl-4 col-md-4">
                <div class="single_service">
                    <div class="icon">
                        <i class="flaticon-electrocardiogram"></i>
                    </div>
                    <h3>Berbagai Perawat</h3>
                    <p>
                        Kami memiliki berbagai Perawat yang siap melayani anda.
                    </p>
                    @if (auth()->check())
                        @if (auth()->user()->role == 'klien')
                            <a href="{{ route('klien.perawat.index') }}" class="boxed-btn3-white">Lihat Perawat</a>
                        @else
                            <a href="{{ route('profile') }}" class="boxed-btn3-white">Cek Profil Anda</a>
                        @endif
                    @else
                        <a href="{{ route('guest.perawat.index') }}" class="boxed-btn3-white">Lihat Perawat</a>
                    @endif
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service">
                    <div class="icon">
                        <i class="flaticon-emergency-call"></i>
                    </div>
                    <h3>Nomor Darurat kami</h3>
                    <p>
                        Anda dapat menghubungi nomor darurat kami di bawah ini.
                    </p>
                    <a href="#" class="boxed-btn3-white">{{ $no_hp }}</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service">
                    <div class="icon">
                        <i class="flaticon-first-aid-kit"></i>
                    </div>
                    <h3>Pesan Dengan Mudah</h3>
                    <p>
                        Anda dapat memesan perawat kami dengan mudah.
                    </p>
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
