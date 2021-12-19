@extends('layouts.main-layout')

@section('styles')
<style type="text/css">
    a:hover {
        text-decoration: none;
    }
</style>
@endsection

@section('content')

<div class="warna-oren">
    @include('partials.navbar')
</div>

<section class="container mt-5">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <i class="fas fa-search-location fa-4x fa-pull-left"></i>
                    <h1 class="headingtfa">{{ $hotel->name }}</h1>
                    <p class="lead">{{ $hotel->tagline }}</p>
                </div>
                <div class="col text-justify">
                    <dl class="row">
                        <dt class="col-3">Kota</dt>
                        <dd class="col">{{ $hotel->location->location_name }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3">Alamat</dt>
                        <dd class="col">{{ $hotel->address }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3">Jumlah Kamar</dt>
                        <dd class="col">{{ $hotel->rooms->count() }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3">Email</dt>
                        <dd class="col">{{ $hotel->email }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="fas fa-swimming-pool fa-2x"></i>
                    <p class="lead"><strong>Kolam Renang</strong></p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-wifi fa-2x"></i>
                    <p class="lead"><strong>Free WiFi</strong></p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-utensils fa-2x"></i>
                    <p class="lead"><strong>Restaurant</strong></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container my-4">
    <div class="card shadow">
        <table class="table table-strip">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Kamar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            @foreach($hotel->rooms as $index => $room)

            <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $room->code }}</td>
                <td>{{ $room->status == 0 ? 'Tersedia' : 'Terisi' }}</td>
                <td>
                    @if ($room->status == 0)
                    <a href="{{ route('reservation.show-form', $room) }}" class="btn btn-primary">Pesan Kamar</a>
                    @else
                    &nbsp;
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</section>


@include('partials.footer')

@endsection
