<div class="author-card pb-3">
    <div class="author-card-cover"
        style="background-image: url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);"><a
            class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip" title=""
            data-original-title="You currently have 290 Reward points to spend"><i class="fa fa-user text-md"></i>
            {{ $user->role == 'klien' ? 'Klien' : 'Perawat' }}
        </a>
        {{-- status --}}
        @if ($user->status == 'aktif')
            <span class="badge bg-success text-white m-3">Akun Aktif</span>
        @else
            <span class="badge bg-danger text-white m-3">Akun Belum Aktif</span>
        @endif
    </div>
    <div class="author-card-profile">
        <div class="author-card-avatar">
            @if ($user->foto == null)
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Daniel Adams">
            @else
                <img src="{{ asset('storage/foto/' . $user->foto) }}"
                    style="width: 100px; height: 100px; object-fit: cover; object-position: center">
            @endif
        </div>
        <div class="author-card-details">
            <h5 class="author-card-name text-lg">{{ $user->name }}</h5><span class="author-card-position">Joined
                {{ $user->created_at->diffForHumans() }}</span>
            </span>
        </div>
    </div>
</div>
<div class="wizard">
    <nav class="list-group list-group-flush">
        {{-- <a class="list-group-item" href="#">
            <div class="d-flex justify-content-between align-items-center">
                <div><i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                    <div class="d-inline-block font-weight-medium text-uppercase">Orders List</div>
                </div><span class="badge badge-secondary">6</span>
            </div>
        </a> --}}
        <a class="list-group-item {{ Route::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="d-inline-block font-weight-medium text-uppercase">Pengaturan Akun</div>
                </div>
                @if ($user->no_ktp == null || $user->jenis_kelamin == null || $user->no_hp == null)
                    <span class="badge badge-danger">Lengkapi</span>
                @endif
            </div>
        </a>
        <a class="list-group-item {{ Route::is('profile.alamat') ? 'active' : '' }}"
            href="{{ route('profile.alamat') }}">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="d-inline-block font-weight-medium text-uppercase">Alamat</div>
                </div>
                @if ($user->domisili_id == null || $user->alamat == null || $user->ktp == null)
                    <span class="badge badge-danger">Lengkapi</span>
                @endif
            </div>
        </a>
        {{-- if klien --}}
        @if ($user->role == 'klien')
            <a class="list-group-item {{ Route::is('klien.ajukan.perawat') ? 'active' : '' }}"
                href="{{ route('klien.ajukan.perawat') }}">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-inline-block font-weight-medium text-uppercase">Ajukan Akun Sebagai Perawat</div>
                    </div>
                    @if ($user->ijazah == null || $user->dokstr == null)
                        <span class="badge badge-info">Opsional</span>
                    @else
                        <span class="badge badge-success">Diajukan</span>
                    @endif
                </div>
            </a>
        @else
            <a class="list-group-item {{ Route::is('perawat.jadwal') ? 'active' : '' }}"
                href="{{ route('perawat.jadwal') }}">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-inline-block font-weight-medium text-uppercase">Jadwal Anda</div>
                    </div>
                    @if ($user->jadwal->count() == 0)
                        <span class="badge badge-danger">Lengkapi</span>
                    @endif
                </div>
            </a>
            <a class="list-group-item {{ Route::is('perawat.berkas.perawat') ? 'active' : '' }}"
                href="{{ route('perawat.berkas.perawat') }}">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-inline-block font-weight-medium text-uppercase">Berkas Perawat</div>
                    </div>
                    @if ($user->ijazah == null || $user->dokstr == null)
                        <span class="badge badge-danger">Lengkapi</span>
                    @endif
                </div>
            </a>
            <a class="list-group-item {{ Route::is('perawat.penghasilan*') ? 'active' : '' }}"
                href="{{ route('perawat.penghasilan') }}">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-inline-block font-weight-medium text-uppercase">Penghasilan</div>
                    </div>
                </div>
            </a>
        @endif
        {{-- <a class="list-group-item" href="https://www.bootdey.com/snippets/view/bs4-wishlist-profile-page"
            target="__blank">
            <div class="d-flex justify-content-between align-items-center">
                <div><i class="fe-icon-heart mr-1 text-muted"></i>
                    <div class="d-inline-block font-weight-medium text-uppercase">My Wishlist</div>
                </div><span class="badge badge-secondary">3</span>
            </div>
        </a>
        <a class="list-group-item" href="https://www.bootdey.com/snippets/view/bs4-account-tickets"
            target="__blank">
            <div class="d-flex justify-content-between align-items-center">
                <div><i class="fe-icon-tag mr-1 text-muted"></i>
                    <div class="d-inline-block font-weight-medium text-uppercase">My Tickets</div>
                </div><span class="badge badge-secondary">4</span>
            </div>
        </a> --}}
    </nav>
</div>
