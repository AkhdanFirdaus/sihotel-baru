<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (!$request->user()) {
                $this->validate($request, [
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone_number' => 'required',
                ]);
            }

            $kode = $request->session()->get('kode');
            $detail = $request->session()->get('detail');
            $kodeKamar = $request->session()->get('code_room');
            $kode_verify = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8));
            $room = Room::where('code', $kodeKamar)->first();

            if ($room->status == 0) {
                DB::beginTransaction();

                if (!$request->user()) {
                    $guest = new User();
                    $guest->name = $request->name;
                    $guest->email = $request->email;
                    $guest->phone_number = $request->phone_number;
                    $guest->password = bcrypt('password');
                    $guest->role_id = 0;
                    $guest->save();
                }

                $payment = new Payment();
                $payment->code = encrypt($kode);
                $payment->code_verification = encrypt($kode_verify);
                $payment->credit_number = $request->noRek;
                $payment->status = 0;
                $payment->save();

                $reservation = new Reservation();

                if (Auth::check()) {
                    $reservation->user_id = $request->user()->id;
                } else {
                    $reservation->user_id = $guest->id;
                }

                $reservation->room_id = $room->id;
                $reservation->payment_id = $payment->id;
                $reservation->check_in = $detail['checkin'];
                $reservation->check_out = $detail['checkout'];
                $reservation->number_people = $detail['number_people'];
                $reservation->save();

                DB::commit();

                return redirect()->route('verification.show-verifikasi', [$payment->code]);
            } else {
                Session::flash('fail', 'Ada Kesalahan Input data');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('fail', 'Ada Kesalahan Input data: ' . $th);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function search(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'checkin' => 'required|date|date_format:Y-m-d|after:yesterday',
            'checkout' => 'required|date|date_format:Y-m-d|after:checkin',
            'number_people' => 'required|gt:0'
        ]);

        $search = $request->location;

        $detail = [
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'number_people' => $request->number_people,
        ];

        $request->session()->put('detail', $detail);

        $location = Location::find($search);
        $detail = Session::get('detail');
        $hotels = Location::withCount('hotels')->find($search);

        return view('reservation.reservation-search', [
            'hasil' => $hotels,
            'location' => $location,
            'search' => $search,
            'detail' => $detail,
        ]);
    }

    public function lihatVerifikasi($code)
    {
        $payment = Payment::where('code', $code)->first();
        $diff = Carbon::parse($payment->reservation->check_in)->diffInDays(Carbon::parse($payment->reservation->check_out));
        return view('reservation.verification', [
            'diff' => $diff,
            'payment' => $payment,
            'reservation' => $payment->reservation,
        ]);
    }
}
