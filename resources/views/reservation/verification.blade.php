@extends('layouts.main-layout')

@section('content')
<div class="container mt-5">
    @include('partials.message')
    <div class="row">
        <div class="col-lg-7">
            {!! Form::open(['route' => ['verification.update', $payment], 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('code_verification', 'Kode Verifikasi') }}
                {{ Form::text('code_verification', $payment->code_verification, ['class' => 'form-control', 'readonly'])
                }}
            </div>

            <div class="form-row">
                <div class="col-lg-4 form-group">
                    {{ Form::label('status', 'Status') }}
                    {{ Form::select('status', ['Uang Muka', 'Lunas'], old('status'), ['placeholder' => 'Status
                    Pembayaran...', 'class' => 'custom-select', 'id' => 'pilihan']) }}
                </div>
                <div class="col-lg-8 form-group">
                    {{ Form::label('total', 'Jumlah') }}
                    {{ Form::text('total', old('total'), ['placeholder' => 'Minimal 50% dari harga sewa', 'class' =>
                    'form-control', 'id' => 'jmlPembayaran']) }}
                </div>
            </div>

            <div class="form-row">
                <div class="col form-group">
                    {{ Form::label('tipePem', 'Tipe Pembayaran') }}
                    {{ Form::select('tipePem', ['Di Tempat', 'Transaksi'], old('tipePem'), ['placeholder' => 'Tipe
                    Pembayaran...', 'class' => 'custom-select']) }}
                </div>
                <div class="col form-group">
                    {{ Form::label('payment_method', 'Bank') }}
                    {{ Form::select('payment_method', ['BCA', 'BRI', 'BNI'], old('payment_method'), ['placeholder' =>
                    'Pilih
                    Bank', 'class'
                    => 'custom-select']) }}
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    {{ Form::label('credit_number', 'No Rekening') }}
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-credit-card"></i></span>
                        </div>
                        {{ Form::text('credit_number', old('credit_number'), ['placeholder' => 'Ex. BCA: 8502 344 123',
                        'class' =>
                        'form-control']) }}
                    </div>
                </div>
            </div>

            <hr class="border">
            <h3 class="mt-4">Butuh Pesanan Khusus?</h3>

            <div class="form-group">
                {{ Form::label('note', '(Opsional)') }}
                {{ Form::textarea('note', old('review'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('rate', 'Rating') }}
                {{ Form::number('rate', old('rate'), ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Verifikasi', ['class' => 'btn btn-primary btn-block']) }}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-lg-5">
            <div class="">
                <div class="card" style="width: 25rem;">
                    <div class="card-header bg-primary text-light">Detail Pemesanan</div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-5">Kode Pemesanan</dt>
                            <dd class="col">{{ decrypt($payment->code) }}</dd>
                        </dl>
                        <hr>
                        <dl class="row mb-0">
                            <dt class="col-5">Nama Pemesan</dt>
                            <dd class="col">{{
                                $reservation->user['name'] }}</dd>
                        </dl>
                        <hr>
                        <dl class="row mb-0">
                            <dt class="col-5">Email</dt>
                            <dd class="col"> {{$reservation->user['email'] }}</dd>
                        </dl>
                        <hr>
                        <dl class="row mb-0">
                            <dt class="col-5">Memesan</dt>
                            <dd class="col">{{ $reservation->room['code'] }} di
                                {{-- {{$reservation->kamar->hotel->name }} --}}
                            </dd>
                        </dl>
                        <hr>
                        <dl class="row mb-0">
                            <dt class="col-5">Waktu</dt>
                            <dd class="col">{{ $diff }} hari <br> {{ $reservation->check_in }} hingga {{
                                $reservation->check_out }}</dd>
                        </dl>
                        <hr>
                        <dl class="row mb-0">
                            <dt class="col-5">Total Harga Sewa</dt>
                            <dd class="col">IDR {{ number_format($reservation->room['price'], null, ',', '.')
                                }} </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var total = {{ $reservation->room->price }};
</script>
@endsection
