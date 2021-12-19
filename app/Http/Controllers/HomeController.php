<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reservations = Reservation::orderBy('created_at', 'desc')->paginate(2);
        $recommendations = Room::orderBy('price', 'asc')->paginate(5);
        $rooms = Room::pluck('code', 'id');
        $locations = Location::pluck('location_name', 'id');
        return view('welcome', [
            'reservations' => $reservations,
            'recommendations' => $recommendations,
            'rooms' => $rooms,
            'locations' => $locations,
        ]);
    }

    public function logged()
    {
        # code...
    }

    public function email(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'pesan' => 'required'
        ]);

        $kontak = [
            'nama' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'pesan' => $request->pesan
        ];


        Mail::send('email.contactTemplate', $kontak, function ($message) use ($kontak) {
            $message->from($kontak['email']);
            $message->to('akhdan.musyaffa.firdaus@gmail.com');
            $message->subject($kontak['subject']);
        });

        $guest = new User();
        $guest->name = $kontak['name'];
        $guest->email = $kontak['email'];
        $guest->save();

        $mail = new Review();
        $mail->subject = $kontak['subject'];
        $mail->message = $kontak['pesan'];
        $mail->save();

        Session::flash('success', 'Terimakasih Atas Masukkan Anda');
        return redirect()->back();
    }
}
