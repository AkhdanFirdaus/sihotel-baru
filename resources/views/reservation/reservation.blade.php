@extends('layouts.main-layout')

@section('styles')
<style type="text/css">
    textarea {
        height: 22vh;
    }
</style>
@endsection

@section('content')
{!! Form::open(['route' => ['reservation.pesan', $room] , 'method' => 'POST']) !!}
<div class="container p-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3 shadow">
                <div class="card-header bg-primary text-light">Tinjauan Pesanan Anda</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3"
                            style="background-image: url(/img/hotel_image/default.png); background-size: cover; border-radius: 10px;">
                        </div>
                        <div class="col-lg-9">
                            <h2>{{ $room->hotel->name }}</h2>
                            <hr class="border">
                            <dl class="row mb-0">
                                <dt class="col-4">Kode Kamar</dt>
                                <dd class="col">{{ $room->code }}</dd>
                            </dl>
                            <dl class="row mb-0">
                                <dt class="col-4">Jumlah Tamu</dt>
                                <dd class="col">{{ $detail['number_people'] }}</dd>
                            </dl>
                            <dl class="row mb-0">
                                <dt class="col-4">Check In</dt>
                                <dd class="col">{{ $detail['checkin'] }}</dd>
                            </dl>
                            <dl class="row mb-0">
                                <dt class="col-4">Check Out</dt>
                                <dd class="col">{{ $detail['checkout'] }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            @guest
            <div class="card shadow">
                <div class="card-header bg-primary text-light">Detail Pemesan</div>
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Nama') }}
                        {{ Form::text('name', old('name'), ['class' => 'form-control', 'required' => 'required']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::text('email', old('email'), ['class' => 'form-control', 'required' => 'required']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('phone_number', 'No Telepon') }}
                        {{ Form::text('phone_number', old('phone_number'), ['class' => 'form-control', 'required' =>
                        'required']) }}
                    </div>

                    <div class="form-group">
                        <a href="{{ route('login') }}" class="btn btn-link">Sudah Punya Akun? Login disini</a>
                    </div>
                </div>
            </div>
            @endguest
        </div>
        <div class="col-lg-4">
            <div class="position-fixed">
                <div class="card mb-4 shadow bg-success text-light" style="width: 20rem;">
                    <div class="card-body">
                        <dl>
                            <dd>
                                <h4>Kode Pemesanan</h4>
                            </dd>
                            <dt>{{$code}}</dt>
                        </dl>
                    </div>
                </div>
                <h4><strong>Detail Harga</strong></h4>
                <div class="card shadow">
                    <div class="card-body">
                        <dl>
                            <dd>Harga per malam</dd>
                            <dt>IDR {{ number_format($room->price, null, ",", ".") }}</dt>
                        </dl>
                        <hr class="border">
                        <dl>
                            <dd>Harga per {{ $diff }} malam</dd>
                            <dt class="row">
                                <div class="col">
                                    IDR {{ number_format($room->price, null, ",", ".") }} * {{ $diff }}
                                </div>
                                <div class="col"> = IDR {{ number_format($room->price * $diff, null, ",", ".") }}</div>
                            </dt>
                        </dl>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col-6">
                        <a class="btn btn-danger btn-block shadow text-light" href="{{ route('home') }}">Batal Pesan</a>
                    </div>
                    <div class="col-6">
                        {{ Form::submit('Pesan', ['class' => 'btn btn-primary btn-block shadow'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@include('partials.message')
@endsection
