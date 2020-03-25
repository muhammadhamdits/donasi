<?php

namespace App\Http\Controllers;

use Mail;
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
        $data = Transaksi::where('status', 1)->get();
        // dd($data);
        return view('index', ['data' => $data]);
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
             $transaksi ->bukti_transfer = "bukti/".$newName;
         $transaksi->save();
 
         return redirect(route('home'));
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

    public function home()
    {
        $data = Transaksi::all();
        return view('admin.index', ['data' => $data]);
    }

    public function accept($id, $status)
    {
        $data = Transaksi::findOrFail($id);

        $data->status = $status;
        $data->update();

        $to_name = $data->nama;
        $to_email = $data->email;
        $data = ['name' => $data->nama, 'jumlah' => "Rp ".number_format($data->jumlah,2,',','.')];
        Mail::send("emails.mail", $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject("Terimakasih atas donasi anda");
            $message->from(env('MAIL_USERNAME'), "Universitas Andalas");
        });
        return redirect(route('admin.home'));
    }
}
