<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::all();
        return $payment;
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
        $table = Payment::create([
            "no_pemesan" => $request->no_pemesan,
            "tgl_pemesan" => $request->tgl_pemesan,
            "username" => $request->username,
            "email" => $request->email,
            "no_telp" => $request->no_telp,
            "metode_pemb" => $request->metode_pemb,
            "hrg_total" => $request->hrg_total,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Pembayaran Berhasil!',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            return response()->json([
                'status' => 200,
                'data' => $payment
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan'
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        if($payment){
            $payment->no_pemesan = $request->no_pemesan ? $request->no_pemesan : $payment->no_pemesan;
            $payment->tgl_pemesan = $request->tgl_pemesan ? $request->tgl_pemesan : $payment->tgl_pemesan;
            $payment->username = $request->username ? $request->username : $payment->username;
            $payment->email = $request->email ? $request->email : $payment->email;
            $payment->no_telp = $request->no_telp ? $request->no_telp : $payment->no_telp;
            $payment->metode_pemb = $request->metode_pemb ? $request->metode_pemb : $payment->metode_pemb;
            $payment->hrg_total = $request->hrg_total ? $request->hrg_total : $payment->hrg_total;
            return response()->json([
                'status' => 200,
                'data' => $payment
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::where('id', $id)->first();
        if($payment){
            $payment->delete();
            return response()->json([
                'status' => 'Pembayaran Berhasil dihapus!',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .' tidak ditemukan'
            ], 404);
        }
    }
}
