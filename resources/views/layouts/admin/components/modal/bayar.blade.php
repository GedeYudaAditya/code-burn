<div class="modal fade" id="modal-{{ $item->id }}-bayar">
    <div class="modal-dialog modal-lg"> {{-- modal-dialog-centered --}}
        <div class="modal-content rounded-0 border-0">
            {{-- <form action="{{ route('admin.pesanan.konfirmasi', $item->id) }}" method="POST" enctype="multipart/form-data"> --}}
            <div class="modal-header border-0">
                <h3 class="modal-title text-primary" id="modalLabel">
                    Bukti Pembayaran
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalClose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                @csrf
                {{-- card --}}
                <div class="col-md-6">
                    <div class="card">
                        {{-- Gambar Rekening --}}
                        <img src="{{ asset('/storage') }}/bukti_pembayaran/{{ $item->detailPesanan->bukti_pembayaran }}"
                            class="card-img-top" alt="{{ $item->detailPesanan->bukti_pembayaran }}">
                    </div>

                    <small>
                        Detail Pemesan:
                    </small>
                    <br>
                    {{-- table --}}
                    <small>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Photo</td>
                                    <td>:</td>
                                    <td>
                                        @if ($item->user->foto == null)
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                style="width: 50px; height: 50px; object-fit: cover; object-position: center; border-radius: 50%;"
                                                alt="Daniel Adams">
                                        @else
                                            <img src="{{ asset('storage/foto/' . $item->user->foto) }}"
                                                style="width: 50px; height: 50px; object-fit: cover; object-position: center; border-radius: 50%;">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Pemesan</td>
                                    <td>:</td>
                                    <td>
                                        {{ $item->user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email Pemesan</td>
                                    <td>:</td>
                                    <td>
                                        {{ $item->user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. Telepon Pemesan</td>
                                    <td>:</td>
                                    <td>
                                        {{ $item->user->no_hp }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat Pemesan</td>
                                    <td>:</td>
                                    <td>
                                        {{ $item->user->alamat }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </small>
                </div>

                {{-- Detail Rekening yang bisa di kirimkan --}}
                <div class="col-md-6 mb-3">
                    {{-- Detail Rekening yang bisa di kirimkan --}}
                    <small>
                        Anda dapat melakukan pembayaran kepada perawat melalui transfer ke rekening berikut:
                    </small>
                    <br>
                    {{-- table --}}
                    <small>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Photo</td>
                                    <td>:</td>
                                    <td>
                                        @if ($item->perawat->foto == null)
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                style="width: 50px; height: 50px; object-fit: cover; object-position: center; border-radius: 50%;"
                                                alt="Daniel Adams">
                                        @else
                                            <img src="{{ asset('storage/foto/' . $item->perawat->foto) }}"
                                                style="width: 50px; height: 50px; object-fit: cover; object-position: center; border-radius: 50%;">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. Rekening</td>
                                    <td>:</td>
                                    <td>
                                        {{ $item->perawat->no_rek }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atas Nama Perawat</td>
                                    <td>:</td>
                                    <td>
                                        {{ $item->perawat->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. Telepon Perawat</td>
                                    <td>:</td>
                                    <td>
                                        {{ $item->perawat->no_hp }}
                                    </td>
                                </tr>
                                <tr>
                                    @php
                                        $harga_asli = $item->detailPesanan->akumulasi_harga - 500;
                                    @endphp
                                    <td>Pembayaran ke perawat</td>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($harga_asli, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </small>

                    {{-- detail pembayaran --}}
                    <label for="bukti_pembayaran">Detail Pembayaran</label>
                    <table class="table table-borderless">
                        <tbody>
                            @php
                                $biaya_admin = 500;
                            @endphp
                            <tr>
                                <td>Biaya Admin</td>
                                <td>:</td>
                                <td>Rp. {{ number_format($biaya_admin, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Total Pembayaran</td>
                                <td>:</td>
                                <td>Rp. {{ number_format($item->detailPesanan->akumulasi_harga, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- catatan --}}
                    <label for="catatan">Catatan</label>
                    <textarea disabled name="catatan" id="catatan" class="form-control rounded-0 @error('catatan') is-invalid @enderror"
                        value="{{ old('catatan') }}">{{ $item->detailPesanan->catatan }}</textarea>
                </div>

                <div class="col-md-12 mb-3">
                    {{-- status selesai pekerjaan --}}
                    {{-- <small> --}}
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Status Pekerjaan</td>
                                <td>:</td>
                                <td>
                                    @if ($item->detailPesanan->status == 'pending')
                                        <span class="badge badge-secondary">Menunggu Konfirmasi Perawat</span>
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
                            <tr>
                                <td>Bukti</td>
                                <td>:</td>
                                <td class="text-center">
                                    @if ($item->detailPesanan->gambar == null)
                                        <span class="badge badge-danger">Belum Ada</span>
                                    @else
                                        <img src="{{ asset('/storage/bukti/' . $item->detailPesanan->gambar) }}"
                                            style="width: 80%; object-fit: cover; object-position: center;">
                                        <br>
                                        <a href="{{ asset('/storage/bukti/' . $item->detailPesanan->gambar) }}"
                                            target="_blank" class="badge badge-success">Lihat</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td>
                                    @if ($item->detailPesanan->deskripsi == null)
                                        <span class="badge badge-secondary">Tidak ada deskripsi</span>
                                    @else
                                        {{ $item->detailPesanan->deskripsi }}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- button konfirmasi --}}
                    @if ($item->detailPesanan->status == 'selesai' && $item->status == 'diterima')
                        @php
                            $destination = $item->perawat->no_hp;
                            $message = 'Halo ' . $item->perawat->name . ', Saya admin aplikasi sistem perawat ingin mengkonfirmasi tentang pesanan dengan nomor ' . $item->kode_pemesanan . '. Apakah pesanan tersebut sudah selesai? dan apakah anda telah mengirim bukti penyelesaian pekerjaan anda dengan benar serta secara jujur? Terimakasih.';
                            $url = 'https://api.whatsapp.com/send?phone=' . $destination . '&text=' . $message;
                        @endphp
                        <div class="d-flex justify-content-between">
                            <a href="{{ $url }}" target="_blank" class="btn btn-danger">Hubungi Perawat</a>
                            <a href="{{ route('admin.manajemen-keuangan.transaksi-terkonfirmasi.approve', $item->id) }}"
                                class="btn btn-success">Selesaikan Status Pesanan</a>
                        </div>
                    @endif
                    {{-- </small> --}}
                </div>

                {{-- keterangan --}}
                <div class="col-md-12 mb-3">
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
                </div>
            </div>
            <div class="modal-footer">
                @if ($item->status == 'pending')
                    <a href="{{ route('admin.manajemen-keuangan.transaksi-masuk.reject', $item->id) }}"
                        class="btn btn-outline-danger">Tolak</a>
                    <a href="{{ route('admin.manajemen-keuangan.transaksi-masuk.approve', $item->id) }}"
                        class="btn btn-outline-success">Terima</a>
                @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
