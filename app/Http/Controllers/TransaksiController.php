<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
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
         Storage::putFile('public/bukti', $request->file('bukti_transfer'));
        
         //Path
         $file = $request->file('bukti_transfer');
         $fileName = time();
         $fileExtension = $file->getClientOriginalExtension();
         $newName = $fileName . '.' . $fileExtension; 
         $path = $request->file('bukti_transfer')->storeAs('public/bukti', $newName);
        // dd($path);

        //anon value
        $anon = 0;
        if ($request->anonim == 'on') {
            $anon = 1;
        }

         //Store DB
         $date = date('Y-m-d ');
         $transaksi = new Transaksi;
             $transaksi ->nama = $request->nama;
             $transaksi ->email = $request->email;
             $transaksi ->jumlah = $request->jumlah;
             $transaksi ->status = 0;
            //  $transaksi ->anonim = $request->anonim;
             $transaksi ->anonim = $anon;
             $transaksi ->tanggal = $date;
             $transaksi ->bukti_transfer = $path;
         $transaksi->save();
 
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
