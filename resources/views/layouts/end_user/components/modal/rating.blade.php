<style>
    * {
        margin: 0;
        padding: 0;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>

<div class="modal fade" id="modal-{{ $item->id }}-rating">
    <div class="modal-dialog modal-lg"> {{-- modal-dialog-centered --}}
        <div class="modal-content rounded-0 border-0">
            <form action="{{ route('klien.rating', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="perawat_id" value="{{ $item->perawat->id }}">
                <div class="modal-header border-0">
                    <h3 class="modal-title text-primary" id="modalLabel">
                        Berikanlah Rating Setelah Anda Memesan Perawat
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalClose">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row justify-content-center">
                    {{-- pilih rating --}}
                    {{-- kalimat --}}
                    <div class="col-md-12 mb-2 text-center">
                        <small>
                            Pilih Rating Anda untuk Perawat {{ $item->perawat->name }}
                        </small>
                    </div>
                    <div class="rate mb-3">
                        <input type="radio" id="star5-{{ $item->id }}" name="rate-{{ $item->id }}"
                            value="5" />
                        <label for="star5-{{ $item->id }}" title="text">5 stars</label>
                        <input type="radio" id="star4-{{ $item->id }}" name="rate-{{ $item->id }}"
                            value="4" />
                        <label for="star4-{{ $item->id }}" title="text">4 stars</label>
                        <input type="radio" id="star3-{{ $item->id }}" name="rate-{{ $item->id }}"
                            value="3" />
                        <label for="star3-{{ $item->id }}" title="text">3 stars</label>
                        <input type="radio" id="star2-{{ $item->id }}" name="rate-{{ $item->id }}"
                            value="2" />
                        <label for="star2-{{ $item->id }}" title="text">2 stars</label>
                        <input type="radio" id="star1-{{ $item->id }}" name="rate-{{ $item->id }}"
                            value="1" />
                        <label for="star1-{{ $item->id }}" title="text">1 star</label>
                    </div>
                    {{-- komentar --}}
                    <div class="col-md-12 mb-3 text-center">
                        <small>
                            Berikanlah Komentar Anda untuk Perawat {{ $item->perawat->name }}
                        </small>
                        <textarea name="komentar" id="komentar" cols="30" rows="10" class="form-control mt-3"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary btn-block">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-{{ $item->id }}-rating-2">
    <div class="modal-dialog modal-lg"> {{-- modal-dialog-centered --}}
        <div class="modal-content rounded-0 border-0">
            {{-- <form action="{{ route('klien.rating', $item->id) }}" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <input type="hidden" name="perawat_id" value="{{ $item->perawat->id }}">
            <div class="modal-header border-0">
                <h3 class="modal-title text-primary" id="modalLabel">
                    Detail Rating Perawat {{ $item->perawat->name }}
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalClose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row justify-content-center">
                {{-- pilih rating --}}
                {{-- kalimat --}}
                <div class="col-md-12 mb-2 text-center">
                    <small>
                        Rating {{ $item->perawat->name }}
                    </small>
                </div>
                <div class="rate mb-3">
                    @if ($item->rating != null)
                        <input type="radio" id="a-star5-{{ $item->id }}" name="rate-{{ $item->id }}"
                            disabled {{ $item->rating->rating == 5 ? 'checked' : '' }} value="5" />
                        <label for="a-star5-{{ $item->id }}" title="text">5 stars</label>
                        <input type="radio" id="a-star4-{{ $item->id }}" name="rate-{{ $item->id }}"
                            disabled {{ $item->rating->rating == 4 ? 'checked' : '' }} value="4" />
                        <label for="a-star4-{{ $item->id }}" title="text">4 stars</label>
                        <input type="radio" id="a-star3-{{ $item->id }}" name="rate-{{ $item->id }}"
                            disabled {{ $item->rating->rating == 3 ? 'checked' : '' }} value="3" />
                        <label for="a-star3-{{ $item->id }}" title="text">3 stars</label>
                        <input type="radio" id="a-star2-{{ $item->id }}" name="rate-{{ $item->id }}"
                            disabled {{ $item->rating->rating == 2 ? 'checked' : '' }} value="2" />
                        <label for="a-star2-{{ $item->id }}" title="text">2 stars</label>
                        <input type="radio" id="a-star1-{{ $item->id }}" name="rate-{{ $item->id }}"
                            disabled {{ $item->rating->rating == 1 ? 'checked' : '' }} value="1" />
                        <label for="a-star1-{{ $item->id }}" title="text">1 star</label>
                    @else
                    @endif
                </div>
                {{-- komentar --}}
                <div class="col-md-12 mb-3 text-center">
                    <small>
                        Berikanlah Komentar Anda untuk Perawat {{ $item->perawat->name }}
                    </small>
                    @if ($item->comment != null)
                        <textarea name="komentar" id="komentar" cols="30" rows="10" class="form-control mt-3" disabled>{{ $item->comment->comment }}</textarea>
                    @endif
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>

<div class="modal fade" id="modal-{{ $item->id }}-rating-3">
    <div class="modal-dialog modal-lg"> {{-- modal-dialog-centered --}}
        <div class="modal-content rounded-0 border-0">
            {{-- <form action="{{ route('klien.rating', $item->id) }}" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            {{-- <input type="hidden" name="perawat_id" value="{{ $item->perawat->id }}"> --}}
            <div class="modal-header border-0">
                <h3 class="modal-title text-primary" id="modalLabel">
                    Detail Rating dari {{ $item->user->name }}
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalClose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row justify-content-center">
                {{-- pilih rating --}}
                {{-- kalimat --}}
                <div class="col-md-12 mb-2 text-center">
                    <small>
                        Rating {{ $item->user->name }}
                    </small>
                </div>
                <div class="rate mb-3">
                    @if ($item->rating != null)
                        <input type="radio" id="a-star5-{{ $item->id }}" name="rate-{{ $item->id }}"
                            disabled {{ $item->rating->rating == 5 ? 'checked' : '' }} value="5" />
                        <label for="a-star5-{{ $item->id }}" title="text">5 stars</label>
                        <input type="radio" id="a-star4-{{ $item->id }}" name="rate-{{ $item->id }}"
                            disabled {{ $item->rating->rating == 4 ? 'checked' : '' }} value="4" />
                        <label for="a-star4-{{ $item->id }}" title="text">4 stars</label>
                        <input type="radio" id="a-star3-{{ $item->id }}" name="rate-{{ $item->id }}"
                            disabled {{ $item->rating->rating == 3 ? 'checked' : '' }} value="3" />
                        <label for="a-star3-{{ $item->id }}" title="text">3 stars</label>
                        <input type="radio" id="a-star2-{{ $item->id }}" name="rate-{{ $item->id }}"
                            disabled {{ $item->rating->rating == 2 ? 'checked' : '' }} value="2" />
                        <label for="a-star2-{{ $item->id }}" title="text">2 stars</label>
                        <input type="radio" id="a-star1-{{ $item->id }}" name="rate-{{ $item->id }}"
                            disabled {{ $item->rating->rating == 1 ? 'checked' : '' }} value="1" />
                        <label for="a-star1-{{ $item->id }}" title="text">1 star</label>
                    @else
                    @endif
                </div>
                {{-- komentar --}}
                <div class="col-md-12 mb-3 text-center">
                    <small>
                        Komentar {{ $item->user->name }} untuk Perawat {{ $item->perawat->name }}
                    </small>
                    @if ($item->comment != null)
                        <textarea name="komentar" id="komentar" cols="30" rows="10" class="form-control mt-3" disabled>{{ $item->comment->comment }}</textarea>
                    @endif
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
