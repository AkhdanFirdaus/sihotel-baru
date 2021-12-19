<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'code_verification' => 'required',
            'credit_number' => 'required',
            'payment_method' => 'required',
            'status' => 'required',
            'total' => 'required',
            'rate' => 'required'
        ]);

        dd($payment);

        $setengahnya = (50 / 100) * $payment->reservation->room->price;

        if (decrypt($payment->code_verification) == $request->code_verification) {
            if ($request->jumlah < $setengahnya) {
                Session::flash('fail', 'Nominal minimal 50% dari harga sewa');
                return redirect()->back();
            } else {
                DB::beginTransaction();
                $feedback = new Review();
                $feedback->subject = 'Review';
                $feedback->message = $request->note;
                $feedback->rating = $request->rate;
                $feedback->hotel_id = $payment->reservation->room->hotel->id;
                $feedback->user_id = $payment->reservation->user_id;
                $feedback->save();

                if ($request->jumlah >= $setengahnya && $request->jumlah < $payment->reservasi->kamar['harga']) {
                    $status = 'Uang Muka';
                } else {
                    $status = 'Lunas';
                }

                $payment->reservasi->kamar->update('kamar', 'Terisi');
                $payment->update([
                    'status' => $status,
                    'total' => $request->jumlah
                ]);

                DB::commit();

                Session::flash('success', 'Terimakasih telah memesan hotel di siHotel, silahkan masukkan kode booking anda untuk mendapatkan password kamar');
                return redirect()->route('home');
            }
        } else {
            DB::rollBack();
            Session::flash('fail', 'Kode Verifikasi Salah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
