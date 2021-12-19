<section class="collapse warna-hijau" id="collapseExample">
    <div class="container p-5">
        <table class="table table-light">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Review</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $index => $reservation)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $reservation->created_at->toDateString() }}</td>
                    <td>{{ $reservation->user['name'] }}</td>
                    <td>
                        @if ($reservation->review != null)
                        {{ $reservation->review['message'] }}
                        @else
                        &nbsp;
                        @endif
                    </td>
                </tr>
                @endforeach
                {{-- {{ $reservations->links() }} --}}
            </tbody>
        </table>
    </div>
</section>

<section class="collapse warna-hijau" id="collapseExample2">
    <div class="container p-5">
        <table class="table table-light">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recommendations as $index => $recommendation)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $recommendation->hotel->location['location_name'] }}</td>
                    <td>{{ $recommendation->hotel['name'] }}</td>
                    <td>{{ $recommendation->code }}</td>
                    <td>{{ number_format($recommendation->price) }}</td>
                </tr>
                @endforeach
                {{-- {{ $reservations->links() }} --}}
            </tbody>
        </table>
    </div>
</section>

<section class="collapse warna-hijau" id="collapseExample3">
    <div class="container p-5">
        <h3 class="text-light">Cek Status Booking Anda</h3>
        {!! Form::open(['route' => 'room.search', 'method' => 'POST']) !!}
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Masukkan kode booking"
                aria-label="Recipient's username" aria-describedby="button-addon2" name="cari">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</section>
