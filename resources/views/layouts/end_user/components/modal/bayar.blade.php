<div class="modal fade" id="modal-{{ $item->id }}-bayar">
    <div class="modal-dialog modal-lg"> {{-- modal-dialog-centered --}}
        <div class="modal-content rounded-0 border-0">
            <form action="{{ route('klien.pesanan.bayar', $item->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-header border-0">
                    <h3 class="modal-title text-primary" id="modalLabel">
                        Unggah Bukti Pembayaran
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
                                <img src="{{ asset('/end_user') }}/img/rekening.jpg" class="card-img-top"
                                    alt="...">
                                <small class="badge badge-danger">
                                    Bukti Pembayaran Belum Di Upload
                                </small>
                            @endif
                        </div>
                    </div>

                    {{-- Detail Rekening yang bisa di kirimkan --}}
                    <div class="col-md-6 mb-3">
                        <small>
                            Anda dapat melakukan pembayaran melalui transfer ke rekening berikut:
                        </small>
                        <br>
                        {{-- table --}}
                        <small>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Kode Pesanan</td>
                                        <td>:</td>
                                        <td>{{ $item->kode_pemesanan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bank</td>
                                        <td>:</td>
                                        <td>BCA</td>
                                    </tr>
                                    <tr>
                                        <td>No. Rekening</td>
                                        <td>:</td>
                                        <td>1234567890</td>
                                    </tr>
                                    <tr>
                                        <td>Atas Nama</td>
                                        <td>:</td>
                                        <td>PT. Sewa Ruangan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </small>

                        {{-- upload bukti pembayaran --}}
                        <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                            class="form-control rounded-0 @error('bukti_pembayaran') is-invalid @enderror"
                            value="{{ old('bukti_pembayaran') }}">
                        @error('bukti_pembayaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

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
                    <button type="button" class="genric-btn danger-border" data-dismiss="modal">Batal</button>
                    <button type="submit" class="genric-btn primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
