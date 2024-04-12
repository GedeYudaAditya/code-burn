<div class="modal fade" id="modal-{{ $item->id }}-konfirmasi">
    <div class="modal-dialog modal-lg"> {{-- modal-dialog-centered --}}
        <div class="modal-content rounded-0 border-0">
            <form action="{{ route('perawat.pesanan.konfirmasi', $item->detailPesanan->id) }}" method="POST"
                enctype="multipart/form-data">
                <div class="modal-header border-0">
                    <h3 class="modal-title text-primary" id="modalLabel">
                        Konfirmasi Pesanan
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
                            <img src="{{ asset('/end_user') }}/img/rekening.jpg" class="card-img-top" alt="...">
                        </div>
                    </div>

                    {{-- Detail Rekening yang bisa di kirimkan --}}
                    <div class="col-md-6 mb-3">

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

                        <hr>

                        @if ($item->detailPesanan->status != 'pending')
                            {{-- Bukti untuk setiap status yang di ubah --}}
                            <label for="bukti-status">Bukti Pelaksanaan Pekerjaan</label>
                            <input type="file" name="image" id="bukti-status"
                                class="form-control rounded-0 @error('bukti_status') is-invalid @enderror">
                            @error('bukti_status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif

                        {{-- deskripsi --}}
                        <label for="deskripsi">Deskripsi <small class="text-info">(Opsional)</small></label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control rounded-0 @error('deskripsi') is-invalid @enderror"
                            value="{{ old('deskripsi') }}"></textarea>

                        @if ($item->detailPesanan->status == 'pending')
                            {{-- option untuk keputusan perawat --}}
                            <label for="status">Status Pesanan</label>
                            <select name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror">
                                <option disabled {{ $item->detailPesanan->status == 'pending' ? 'selected' : '' }}>--
                                    Pilih Status --</option>
                                <option value="diterima"
                                    {{ $item->detailPesanan->status == 'diterima' ? 'selected' : '' }}>
                                    Diterima</option>
                                <option value="ditolak"
                                    {{ $item->detailPesanan->status == 'ditolak' ? 'selected' : '' }}>
                                    Ditolak</option>
                            </select>
                        @else
                            {{-- option untuk keputusan perawat --}}
                            <label for="status">Status Pesanan</label>
                            <select name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror">
                                <option disabled {{ $item->detailPesanan->status == 'diterima' ? 'selected' : '' }}>--
                                    Pilih Status --</option>
                                {{-- <option value="pending" {{ $item->detailPesanan->status == 'pending' ? 'selected' : '' }}>
                                    Pending</option> --}}
                                <option value="perjalanan"
                                    {{ $item->detailPesanan->status == 'perjalanan' ? 'selected' : '' }}>
                                    Dalam Perjalanan</option>
                                <option value="proses"
                                    {{ $item->detailPesanan->status == 'proses' ? 'selected' : '' }}>
                                    Proses</option>
                                <option value="batal" {{ $item->detailPesanan->status == 'batal' ? 'selected' : '' }}>
                                    Batal</option>
                                <option value="selesai"
                                    {{ $item->detailPesanan->status == 'selesai' ? 'selected' : '' }}>
                                    Selesai</option>
                            </select>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="genric-btn danger-border" data-dismiss="modal">Batal</button>
                    <button type="submit" class="genric-btn primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
