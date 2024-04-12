{{-- modal --}}
<div class="modal fade" id="modal-login">
    <div class="modal-dialog modal-lg"> {{-- modal-dialog-centered --}}
        <div
            class="modal-content {{ !Auth::check() || Auth::user()->status != 'aktif' ? 'bg-danger' : '' }} rounded-0 border-0">
            <div class="modal-header border-0">
                <h3 class="modal-title {{ !Auth::check() || Auth::user()->status != 'aktif' ? 'text-light' : 'text-primary' }}"
                    id="modalLabel">
                    @if (Auth::check())
                        @if (Auth::user()->status != 'aktif')
                            Ups! Akun kamu masih belum aktif.
                        @else
                            Buat Pesanan Sekarang
                        @endif
                    @else
                        Ups! Kamu harus login terlebih dahulu.
                    @endif
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalClose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                @if (Auth::check())
                    @if (Auth::user()->status != 'aktif')
                        {{-- tampilkan error code --}}
                        <h1 class="text-center text-warning" style="font-size: 10rem">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{-- 403 --}}
                        </h1>

                        {{-- tampilkan pesan --}}
                        <h2 class="text-center text-light">
                            403 Forbidden
                        </h2>
                    @else
                        <form action="{{ route('klien.perawat.pesan', $perawat->id) }}" method="post"
                            enctype="multipart/form-data" id="form-pesanan">
                            @csrf
                            <div class="row">
                                {{-- date picker first date --}}
                                <div class="col-md-6 mb-3">
                                    <label for="first_date">Tanggal Pertama</label>
                                    <input name="first_date" id="first_date" autocomplete="off"
                                        class="form-control rounded-0 @error('first_date') is-invalid @enderror"
                                        value="{{ old('first_date') }}">
                                    @error('first_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- date picker last date --}}
                                <div class="col-md-6 mb-3">
                                    <label for="last_date">Tanggal Terakhir</label>
                                    <input name="last_date" id="last_date" autocomplete="off"
                                        class="form-control rounded-0 @error('last_date') is-invalid @enderror"
                                        value="{{ old('last_date') }}">
                                    @error('last_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- time picker --}}
                                <div class="col-md-6 mb-3">
                                    <label for="time_mulai">Waktu Mulai</label>
                                    <input name="time_mulai" id="time_mulai" autocomplete="off"
                                        class="form-control rounded-0 @error('time_mulai') is-invalid @enderror"
                                        value="{{ old('time_mulai') }}">
                                    @error('time_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- time picker --}}
                                <div class="col-md-6 mb-3">
                                    <label for="time_selesai">Waktu Selesai</label>
                                    <input name="time_selesai" id="time_selesai" autocomplete="off"
                                        class="form-control rounded-0 @error('time_selesai') is-invalid @enderror"
                                        value="{{ old('time_selesai') }}">
                                    @error('time_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- tampilkan selisih hari dan waktu --}}
                                <div class="col-md-12 mb-3">
                                    <label for="selisih">Selisih</label>
                                    <input type="text" name="selisih" id="selisih"
                                        class="form-control rounded-0 @error('selisih') is-invalid @enderror"
                                        value="{{ old('selisih') }}" readonly>
                                    @error('selisih')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- akumulasi harga --}}
                                <div class="col-md-12 mb-3">
                                    <label for="akumulasi_harga">Akumulasi Harga</label>
                                    <input type="text" name="akumulasi_harga" id="akumulasi_harga"
                                        class="form-control rounded-0 @error('akumulasi_harga') is-invalid @enderror"
                                        value="Rp. {{ old('akumulasi_harga') }}" readonly>
                                    @error('akumulasi_harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- card --}}
                                {{-- <div class="col-md-6">
                                    <div class="card"> --}}
                                {{-- Gambar Rekening --}}
                                {{-- <img src="{{ asset('/end_user') }}/img/rekening.jpg" class="card-img-top"
                                            alt="...">
                                    </div>
                                </div> --}}

                                {{-- Detail Rekening yang bisa di kirimkan --}}
                                <div class="col-md-12 mb-3">
                                    {{-- <small>
                                        Anda dapat melakukan pembayaran melalui transfer ke rekening berikut:
                                    </small>
                                    <br> --}}
                                    {{-- table --}}
                                    {{-- <small>
                                        <table class="table table-borderless">
                                            <tbody>
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
                                    </small> --}}

                                    {{-- upload bukti pembayaran --}}
                                    {{-- <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                                        class="form-control rounded-0 @error('bukti_pembayaran') is-invalid @enderror"
                                        value="{{ old('bukti_pembayaran') }}">
                                    @error('bukti_pembayaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror --}}

                                    {{-- catatan --}}
                                    <label for="catatan">Catatan <small class="text-info">(Opsional)</small></label>
                                    <textarea name="catatan" id="catatan" class="form-control rounded-0 @error('catatan') is-invalid @enderror"
                                        value="{{ old('catatan') }}"></textarea>
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
                        </form>
                    @endif
                @else
                    {{-- tampilkan error code --}}
                    <h1 class="text-center text-warning" style="font-size: 10rem">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{-- 401 --}}
                    </h1>

                    {{-- tampilkan pesan --}}
                    <h2 class="text-center text-light">
                        401 Unauthorized
                    </h2>
                @endif
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalCloseBtn">Close</button>
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="btn btn-primary" id="modalSaveBtn">Login</a>
                @else
                    @if (Auth::user()->status == 'aktif')
                        <button type="submit" class="btn btn-primary" id="modalSaveBtn">Buat Pesanan</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        // date picker
        $(function() {
            $("#first_date").datepicker({
                dateFormat: "yy-mm-dd",
                minDate: 0,
                onSelect: function(date) {
                    $("#last_date").datepicker('option', 'minDate', date);
                }
            });
            $("#last_date").datepicker({
                dateFormat: "yy-mm-dd",
                minDate: 0,
                onSelect: function(date) {
                    $("#first_date").datepicker('option', 'maxDate', date);
                }
            });

            $("#time_mulai").timepicker({
                timeFormat: 'HH:mm',
                interval: 30,
                minTime: '08:00',
                maxTime: '17:00',
                defaultTime: '08:00',
                startTime: '08:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });

            $("#time_selesai").timepicker({
                timeFormat: 'HH:mm',
                interval: 30,
                minTime: '08:00',
                maxTime: '17:00',
                defaultTime: '08:00',
                startTime: '08:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });

            // hitung selisih hari dan jam
            $("input").change(function() {
                // ambil tanggal pertama
                var first_date = $("#first_date").val();
                // ambil tanggal terakhir
                var last_date = $("#last_date").val();
                // ambil waktu mulai
                var time_mulai = $("#time_mulai").val();
                // ambil waktu selesai
                var time_selesai = $("#time_selesai").val();

                // hitung selisih hari
                var selisih_hari = new Date(last_date) - new Date(first_date);
                // hitung selisih jam
                var selisih_jam = new Date("1970-01-01T" + time_selesai + "Z") - new Date("1970-01-01T" +
                    time_mulai +
                    "Z");

                // konversi selisih hari ke milisecond
                var selisih_hari_milisecond = selisih_hari / 86400000;
                // konversi selisih jam ke milisecond
                var selisih_jam_milisecond = selisih_jam / 3600000;

                // hitung selisih hari dan jam
                var selisih = selisih_hari_milisecond + selisih_jam_milisecond;

                // tampilkan selisih hari dan jam dengan format __ hari __ jam
                var hari = selisih_hari_milisecond
                var jam = selisih_jam_milisecond;

                // check jika hasil selisih bukan angka
                if (isNaN(hari) || isNaN(jam)) {
                    hari = 0;
                    jam = 0;
                }

                if (jam < 0) {
                    jam = 24 + jam;
                    hari = hari - 1;
                }

                jam = jam.toFixed(2);

                console.log(selisih);

                // check apakah inputan tanggal pertama lebih besar dari tanggal terakhir
                if (hari < 0) {
                    $("#first_date").addClass("is-invalid");
                    $("#last_date").addClass("is-invalid");
                    $("#modalSaveBtn").attr("disabled", true);
                } else {
                    $("#first_date").removeClass("is-invalid");
                    $("#last_date").removeClass("is-invalid");
                    $("#modalSaveBtn").attr("disabled", false);
                }

                $("#selisih").val(hari + " hari " + jam + " jam");

                // hitung akumulasi harga
                var akumulasi_harga = hari * {{ $per_hari }} + jam * {{ $per_jam }} +
                    {{ $admin }};

                // perlihatkan angka tanpa koma
                akumulasi_harga = akumulasi_harga.toFixed(0);

                // ubah format akumulasi harga
                akumulasi_harga = akumulasi_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")

                // tampilkan akumulasi harga
                $("#akumulasi_harga").val("Rp. " + akumulasi_harga);
            });

            // check jika tanggal pertama atau tanggal terakhir kosong
            if ($("#first_date").val() == "" || $("#last_date").val() == "") {
                $("#modalSaveBtn").attr("disabled", true);
            } else {
                $("#modalSaveBtn").attr("disabled", false);
            }

            // check jika waktu mulai atau waktu selesai kosong
            if ($("#time_mulai").val() == "" || $("#time_selesai").val() == "") {
                $("#modalSaveBtn").attr("disabled", true);
            } else {
                $("#modalSaveBtn").attr("disabled", false);
            }

            // check jika user mengklik tombol #modalSaveBtn
            $("#modalSaveBtn").click(function() {
                // submit form #form-pesanan
                $("#form-pesanan").submit();
            });
        });
    </script>
@endsection
