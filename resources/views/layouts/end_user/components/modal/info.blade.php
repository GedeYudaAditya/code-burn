<div class="modal fade" id="modal-{{ $item->id }}-info">
    <div class="modal-dialog modal-lg"> {{-- modal-dialog-centered --}}
        <div class="modal-content rounded-0 border-0">
            {{-- <form action="{{ route('klien.pesanan.bayar', $item->id) }}" method="POST" enctype="multipart/form-data"> --}}
            <div class="modal-header border-0">
                <h3 class="modal-title text-primary" id="modalLabel">
                    Informasi Pesanan
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalClose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                @csrf
                {{-- card --}}
                <div class="col-md-6">
                    <div class="card mb-3">
                        @if (isset($item->detailPesanan->bukti_pembayaran))
                            <img src="{{ asset('/storage/bukti_pembayaran/' . $item->detailPesanan->bukti_pembayaran) }}"
                                class="card-img-top" alt="...">
                            {{-- badge --}}
                            <a class="badge badge-info"
                                href="{{ asset('/storage/bukti_pembayaran/' . $item->detailPesanan->bukti_pembayaran) }}"
                                target="_blank">
                                Bukti Pembayaran
                            </a>
                        @else
                            <img src="{{ asset('/end_user') }}/img/rekening.jpg" class="card-img-top" alt="...">
                            <small class="badge badge-danger">
                                Bukti Pembayaran Belum Di Upload
                            </small>
                        @endif
                    </div>

                    <div class="card mb-3">
                        @if ($item->detailPesanan->gambar == null)
                            @if (Auth::user()->role == 'klien')
                                <span class="badge badge-secondary">
                                    Belum ada bukti penyelesaian pekerjaan
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    Bukti Penyelesaian Pekerjaan Belum Di Upload
                                </span>
                            @endif
                        @else
                            <img src="{{ asset('/storage/bukti/' . $item->detailPesanan->gambar) }}"
                                style="width: 100%; object-fit: cover; object-position: center;">
                            <a href="{{ asset('/storage/bukti/' . $item->detailPesanan->gambar) }}" target="_blank"
                                class="badge badge-success">
                                Bukti Penyelesaian Pekerjaan
                            </a>
                        @endif
                    </div>

                    {{-- status pesanan --}}
                    <div class="card">
                        <div class="card-header">
                            Status Pesanan
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Status Pesanan</td>
                                        <td>:</td>
                                        <td>
                                            @if ($item->status == 'draft')
                                                <span class="badge badge-warning">Menunggu Pembayaran</span>
                                            @elseif($item->status == 'pending')
                                                <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                            @elseif($item->status == 'diterima')
                                                <span class="badge badge-success">Diterima</span>
                                            @elseif($item->status == 'ditolak')
                                                <span class="badge badge-danger">Ditolak</span>
                                            @elseif($item->status == 'selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status Pekerjaan</td>
                                        <td>:</td>
                                        <td>
                                            @if ($item->detailPesanan->status == 'pending')
                                                <span class="badge badge-secondary">Menunggu Konfirmasi Perawat</span>
                                            @elseif($item->detailPesanan->status == 'diterima')
                                                <span class="badge badge-success">Diterima</span>
                                            @elseif($item->detailPesanan->status == 'perjalanan')
                                                <span class="badge badge-info">Perjalanan</span>
                                            @elseif($item->detailPesanan->status == 'proses')
                                                <span class="badge badge-info">Perawat Sedang Bekerja</span>
                                            @elseif($item->detailPesanan->status == 'selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @elseif($item->detailPesanan->status == 'batal')
                                                <span class="badge badge-danger">Batal</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Detail Rekening yang bisa di kirimkan --}}
                <div class="col-md-6 mb-3">
                    <small>
                        Berikut merupakan detail pesanan anda:
                    </small>
                    <br>
                    <br>
                    {{-- table --}}
                    <small>
                        {{-- Kode Pesanan --}}
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Kode Pesanan</td>
                                    <td>:</td>
                                    <td>{{ $item->kode_pemesanan }}</td>
                                </tr>
                                <tr>
                                    @php
                                        $tgl_awal = date('d M Y', strtotime($item->detailPesanan->hari_kerja_awal));
                                        $tgl_akhir = date('d M Y', strtotime($item->detailPesanan->hari_kerja_akhir));
                                    @endphp
                                    <td>Pekerjaan di mulai pada</td>
                                    <td>:</td>
                                    <td>
                                        {{ $tgl_awal }} |
                                        {{ $item->detailPesanan->jam_kerja_awal }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan selesai</td>
                                    <td>:</td>
                                    <td>
                                        {{ $tgl_akhir }} |
                                        {{ $item->detailPesanan->jam_kerja_akhir }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Total Harga
                                    </td>
                                    <td>:</td>
                                    <td>
                                        Rp. {{ number_format($item->detailPesanan->akumulasi_harga, 0, ',', '.') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alamat Pemesan
                                    </td>
                                    <td>:</td>
                                    <td>
                                        {{ $item->user->alamat }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </small>

                    {{-- catatan --}}
                    <label for="catatan">Catatan <small class="text-info">(Opsional)</small></label>
                    <textarea disabled name="catatan" id="catatan" class="form-control rounded-0 @error('catatan') is-invalid @enderror"
                        value="{{ old('catatan') }}">{{ $item->detailPesanan->catatan }}</textarea>
                    @error('catatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- keterangan --}}
                {{-- <div class="col-md-12 mb-3">
                    <small>
                        <p>
                            <b>Perhatian!</b> <br>
                            - Perhatikan dengan baik tanggal dan waktu yang anda pilih. <br>
                            - Pastikan anda sudah memasukkan nominal yang sesuai dengan akumulasi harga.
                            <br>
                            - Pastikan bukti pembayaran yang anda upload sudah benar. Jika tidak, maka
                            pesanan anda akan ditolak. <br>
                        </p>
                    </small>
                </div> --}}
            </div>
            <div class="modal-footer">
                {{-- timeline pesanan --}}
                <a href="{{ route('klien.pesanan.timeline', $item->id) }}" class="genric-btn info-border small p-0"
                    style="width: 40%">
                    <i class="fa fa-clock-o"></i> Lihat Timeline Pesanan
                </a>
                <button type="button" class="genric-btn danger-border" data-dismiss="modal">Kembali</button>
                {{-- <button type="submit" class="genric-btn primary">Kirim</button> --}}
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
