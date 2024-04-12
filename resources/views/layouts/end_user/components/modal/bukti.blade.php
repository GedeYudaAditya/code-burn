<div class="modal fade" id="modal-{{ $item->id }}-bukti">
    <div class="modal-dialog modal-lg"> {{-- modal-dialog-centered --}}
        <div class="modal-content rounded-0 border-0">
            <form action="{{ route('perawat.pesanan.bukti', $item->detailPesanan->id) }}" method="POST"
                enctype="multipart/form-data">
                <div class="modal-header border-0">
                    <h3 class="modal-title text-primary" id="modalLabel">
                        Unggah Bukti Penyelesaian Pekerjaan
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
                            @if (isset($item->detailPesanan->gambar))
                                <img src="{{ asset('/storage/bukti/' . $item->detailPesanan->gambar) }}"
                                    class="card-img-top" alt="...">
                                {{-- badge --}}
                                <a class="badge badge-info"
                                    href="{{ asset('/storage/bukti/' . $item->detailPesanan->gambar) }}"
                                    target="_blank">
                                    Bukti Penyelesaian Pekerjaan
                                </a>
                            @else
                                <img src="{{ asset('/end_user') }}/img/rekening.jpg" class="card-img-top"
                                    alt="...">
                                <small class="badge badge-danger">
                                    Bukti Penyelesaian Pekerjaan Belum Di Upload
                                </small>
                            @endif
                        </div>
                    </div>

                    {{-- Detail Rekening yang bisa di kirimkan --}}
                    <div class="col-md-6 mb-3">

                        {{-- upload bukti pembayaran --}}
                        <label for="gambar">Upload Bukti Penyelesaian Kerja</label>
                        <input type="file" name="gambar" id="gambar"
                            class="form-control rounded-0 @error('gambar') is-invalid @enderror"
                            value="{{ old('gambar') }}">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- catatan --}}
                        <label for="deskripsi">Deskripsi <small class="text-info">(Opsional)</small></label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control rounded-0 @error('deskripsi') is-invalid @enderror"
                            value="{{ old('deskripsi') }}">{{ $item->detailPesanan->deskripsi }}</textarea>
                        @error('deskripsi')
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
                                - Perhatikan dengan file yang anda kirim <br>
                                - Pastikan mengirimkan bukti penyelesaian pekerjaan yang sesuai dengan pesanan anda.<br>
                                - Pastikan bukti yang anda upload sudah benar. Jika tidak, maka
                                pesanan anda akan ditolak untuk di selesaikan <br>
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
