<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = Kamar::all();
        return $kamar;
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
        $table = Kamar::create([
            "type" => $request->type,
            "harga" => $request->harga,
            "desc" => $request->desc,
            "fas" => $request->fas,
            "kebijakan" => $request->kebijakan,
            "jmlh_kamar" => $request->jmlh_kamar,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Kamar Berhasil Ditambahkan!',
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
        $kamar = Kamar::find($id);
        if ($kamar) {
            return response()->json([
                'status' => 200,
                'data' => $kamar
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . 'tidak ditemukan'
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
        $kamar = Kamar::find($id);
        if($kamar){
            $kamar->type = $request->type ? $request->type : $kamar->type;
            $kamar->harga = $request->harga ? $request->harga : $kamar->harga;
            $kamar->desc = $request->desc ? $request->desc : $kamar->desc;
            $kamar->fas = $request->fas ? $request->fas : $kamar->fas;
            $kamar->kebijakan = $request->kebijakan ? $request->kebijakan : $kamar->kebijakan;
            $kamar->jmlh_kamar = $request->jmlh_kamar ? $request->jmlh_kamar : $kamar->jmlh_kamar;
            $kamar->save();
            return response()->json([
                'status' => 200,
                'data' => $kamar
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
        $kamar = Kamar::where('id', $id)->first();
        if($kamar){
            $kamar->delete();
            return response()->json([
                'status' => 200,
                'data' => $kamar
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .' tidak ditemukan'
            ], 404);
        }
    }
}


