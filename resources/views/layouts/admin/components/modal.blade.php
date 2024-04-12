{{-- modal --}}
@foreach ($perawat as $p)
    <div class="modal fade" id="modal-xl-{{ $p->id }}">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        {{ $p->name }}
                        @if ($p->role == 'klien')
                            <span class="badge badge-success">Calon</span>
                        @endif
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                @if ($p->foto == null)
                                    <img src="{{ asset('/images/default-user.png') }}" alt="preview image"
                                        class="img-fluid"
                                        style="width: 100%; object-fit: cover; object-position: center;"
                                        id="preview-image">
                                @else
                                    <img src="{{ asset('/storage/foto/' . $p->foto) }}" alt="preview image"
                                        style="width: 100%; object-fit: cover; object-position: center;"
                                        class="img-fluid" id="preview-image">
                                @endif
                                <div class="form-group">
                                    {{-- bandge status dan approvement --}}

                                    {{-- status --}}
                                    Status:
                                    @if ($p->status == 'aktif')
                                        <span class="badge badge-success">Aktif</span> <br>
                                    @elseif($p->status == 'nonaktif')
                                        <span class="badge badge-danger">Tidak Aktif</span> <br>
                                    @else
                                        <span class="badge badge-secondary">Belum Dikonfirmasi</span> <br>
                                    @endif

                                    {{-- approvement --}}
                                    Kelengkapan:
                                    @if ($p->approve == 'approve')
                                        <span class="badge badge-success">Diterima</span>
                                    @elseif($p->approve == 'reject')
                                        <span class="badge badge-danger">Ditolak</span>
                                    @else
                                        <span class="badge badge-secondary">Belum Dikonfirmasi</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-9 mb-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input disabled type="text" class="form-control" id="exampleInputEmail1"
                                        name="name" placeholder="Nama Perawat" value="{{ $p->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input disabled type="email" class="form-control" id="exampleInputPassword1"
                                        name="email" placeholder="Email" value="{{ $p->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No. HP</label>
                                    <input disabled type="tel" class="form-control" id="exampleInputPassword1"
                                        name="no_hp" placeholder="No Telphone" value="{{ $p->no_hp }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No. HP</label>
                                    <input disabled type="text" class="form-control" id="exampleInputPassword1"
                                        name="no_rek" placeholder="No Rekening" value="{{ $p->no_rek }}">
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="col-md-12 mb-3">
                                {{-- alamat --}}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <input disabled type="text" class="form-control" id="exampleInputPassword1"
                                        name="alamat" placeholder="Alamat" value="{{ $p->alamat }}">
                                </div>

                                {{-- jenis kelamin --}}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jenis Kelamin</label>
                                    <select disabled name="jenis_kelamin" id="" class="form-control">
                                        <option value="laki-laki"
                                            {{ $p->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="perempuan"
                                            {{ $p->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>

                                {{-- domisili --}}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Domisili</label>
                                    <select disabled name="domisili_id" id="" class="form-control">
                                        @foreach ($domisili as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $p->domisili_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="col-12 border-light">
                            <h3 class="col-12">Data Pengajuan</h3>
                            <div class="col-md-4 mb-3">
                                {{-- img KTP --}}
                                <label for="exampleInputPassword1">KTP</label>
                                @if ($p->ktp == null)
                                    <img src="{{ asset('/images/default-user.png') }}" alt="preview image"
                                        class="img-fluid mb-3"
                                        style="width: 100%; object-fit: cover; object-position: center;"
                                        id="preview-image">
                                @else
                                    <img src="{{ asset('/storage/ktp/' . $p->ktp) }}" alt="preview image"
                                        style="width: 100%; object-fit: cover; object-position: center;"
                                        class="img-fluid mb-3" id="preview-image">
                                @endif
                                <p>
                                <div class="form-group">
                                    <label for="">
                                        No KTP <a href="{{ asset('/storage/ktp/' . $p->ktp) }}"
                                            class="btn badge badge-primary">Lihat</a>
                                    </label>
                                    <input disabled type="text" class="form-control" id="exampleInputPassword1"
                                        name="no_ktp" placeholder="No KTP" value="{{ $p->no_ktp }}">
                                </div>
                                </p>
                            </div>
                            <div class="col-md-4 mb-3">
                                {{-- Dok Ijazah --}}
                                <label for="exampleInputPassword1">Ijazah</label>
                                @if ($p->ijazah == null)
                                    <img src="{{ asset('/images/default-user.png') }}" alt="preview image"
                                        class="img-fluid"
                                        style="width: 100%; object-fit: cover; object-position: center;"
                                        id="preview-image">
                                @else
                                    {{-- pdf reader --}}
                                    <iframe src="{{ asset('/storage/ijazah/' . $p->ijazah) }}" frameborder="0"
                                        style="width: 100%; height: 300px;"></iframe>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                {{-- Dokstr --}}
                                <label for="exampleInputPassword1">Dokstr</label>
                                @if ($p->dokstr == null)
                                    <img src="{{ asset('/images/default-user.png') }}" alt="preview image"
                                        class="img-fluid"
                                        style="width: 100%; object-fit: cover; object-position: center;"
                                        id="preview-image">
                                @else
                                    {{-- pdf reader --}}
                                    <iframe src="{{ asset('/storage/str/' . $p->dokstr) }}" frameborder="0"
                                        style="width: 100%; height: 300px;"></iframe>
                                @endif
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    {{-- tombol aktifkan user --}}
                    @if ($p->status == 'aktif')
                        <a href="{{ route('admin.manajemen-user.perawat.nonaktifkan', $p->id) }}"
                            class="btn btn-danger">Nonaktifkan User</a>
                    @else
                        <a href="{{ route('admin.manajemen-user.perawat.aktifkan', $p->id) }}"
                            class="btn btn-success">Aktifkan User</a>
                    @endif

                    {{-- tombol terima user --}}
                    @if ($p->approve == 'approve' || $p->approve == 'reject')
                        <a href="{{ route('admin.manajemen-user.perawat.tolak', $p->id) }}"
                            class="btn btn-danger">Tolak</a>
                    @else
                        <a href="{{ route('admin.manajemen-user.perawat.terima', $p->id) }}"
                            class="btn btn-success">Terima</a>
                    @endif

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
@endforeach
