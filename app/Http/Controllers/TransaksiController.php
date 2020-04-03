<?php

namespace App\Http\Controllers;

use Mail;
use DB;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::where('status', 1)->get();
        $total = DB::table('totals')->first();
        // dd($data);
        return view('index', ['data' => $data, 'total' => $total]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $transaksi = new Transaksi;

        if ($request->file != null) {
            Storage::putFile('public/bukti', $request->file('bukti_transfer'));
           
            //Path
            $file = $request->file('bukti_transfer');
            $fileName = time();
            $fileExtension = $file->getClientOriginalExtension();
            $newName = $fileName . '.' . $fileExtension; 
            $path = $request->file('bukti_transfer')->storeAs('public/bukti', $newName);

            $transaksi ->bukti_transfer = "bukti/".$newName;
        }
        // dd($path);

        //anon value
        $anon = 0;
        if ($request->anonim == 'on') {
            $anon = 1;
        }

         //Store DB
             $transaksi ->nama = $request->nama;
             $transaksi ->email = $request->email;
             $transaksi ->jumlah = $request->jumlah;
            //  $transaksi ->bank = $request->bank;
             $transaksi ->status = 0;
             $transaksi ->anonim = $anon;
             $transaksi ->tanggal = date('Y-m-d ');
         $transaksi->save();
 
        //  toastr()->success('Terima Kasih Atas Donasi Anda');
         return redirect(route('terima_kasih'));
    }

    public function terima_kasih(Transaksi $transaksi)
    {
        return view('terima_kasih');
    }

    public function edit(Request $request)
    {
        // dd($request->all());
        $data = explode(",", $request->nagari);
        $nagari= "";
        foreach($data as $d){
            $nagari .= $d;
        }
        $data = explode(",", $request->bni);
        $bni= "";
        foreach($data as $d){
            $bni .= $d;
        }
        $data = explode(",", $request->bsm);
        $bsm= "";
        foreach($data as $d){
            $bsm .= $d;
        }
        $data = explode(",", $request->mandiri);
        $mandiri= "";
        foreach($data as $d){
            $mandiri .= $d;
        }
        DB::table('totals')->where('id', 1)->update([
            'nagari' => (int)$nagari,
            'bni' => (int)$bni,
            'bsm' => (int)$bsm,
            'mandiri' => (int)$mandiri
        ]);
        toastr()->success('Data telah diperbaharui');
        return redirect(route('admin.home'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $data = Transaksi::findOrFail($request->id_trans);
        $data->bank = $request->bank;
        $data->update();
        toastr()->success('Data telah diperbaharui');
        return redirect(route('admin.home'));
    }

    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function home()
    {
        $data = Transaksi::orderBy('status', 'asc')->get();
        $bank = Transaksi::$bank;
        $total = DB::table('totals')->first();
        // dd($bank);
        return view('admin.index', compact('data', 'bank', 'total'));
    }

    public function accept($id, $status)
    {
        $data = Transaksi::findOrFail($id);

        $data->status = $status;
        $data->update();
        // dd($status);
        if($status == 1){
            $to_name = $data->nama;
            $to_email = $data->email;
            $data = ['name' => $data->nama, 'jumlah' => "Rp ".number_format($data->jumlah,2,',','.')];
            Mail::send("emails.mail", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject("Terimakasih atas donasi anda");
                $message->from(env('MAIL_USERNAME'), "Universitas Andalas");
            });
            toastr()->success('Data telah di terima');
        }
        else{
            toastr()->warning('Data telah di tolak');
        }
        return redirect(route('admin.home'));
    }

    public function changepass()
    {
        return view('auth/change');
    }

    public function passchange(Request $request)
    {
        $user = auth()->user();
        if(Hash::check($request->oldpass, $user->password)){
            $user->password = Hash::make($request->newpass);
            $user->update();
            
            toastr()->success('Password telah berhasil diganti!');
            return redirect()->route('admin.home');
        }else{
            toastr()->error('Password lama tidak sesuai');
            return redirect()->back();
        }
        // dd($request->all());
    }
}
