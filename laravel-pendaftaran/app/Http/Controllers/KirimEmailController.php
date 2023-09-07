<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use App\Pendaftar;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class KirimEmailController extends Controller
{
    public function index()
    {
        return view('emails.formemail');
    }

    public function index2()
    {
        return view('emails.formemail2');
    }

    public function index3($id)
    {

        $pendaftar = Pendaftar::where('id',$id)->first();

        return view('emails.formemail3', compact('pendaftar'));
    }


    public function kirim(Request $request)
    {

        $kode = Str::random(5);
        $status = 0;
        $image = 0;
        $foto = 0;

        $this->validate($request, [
            'email' => 'required',
            'nama' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'kode' => $kode
        ];

        Pendaftar::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'kode' => $kode,
            'status' => $status,
            'image' => $image,
            'foto' => $foto,
        ]);

        Mail::to($request->email)->send(new SendEmail($data));

        return redirect()->route('email.index')->with('message', 'Pendaftaran Anda Berhasil, Cek Email Anda Sekarang!');
    }

    public function kirim2(Request $request)
    {
        $kodepenting = $request->kode;

        $pendaftar = Pendaftar::where('kode', $kodepenting)->first();

        $pendaftars = $pendaftar ? $pendaftar->kode :'';

        $status = 0;

        $this->validate($request, [
            'email'     => 'required',
            'nama'      => 'required',
            'kode'      => 'required',
            'telp'      => 'required',
        ]);

        if($pendaftars == $kodepenting)
        {
            $image = $request->file('image');
            $image->storeAs('public/assets', $image->hashName());
    
            Pendaftar::where('kode', $kodepenting)->update([
                'email' => $request->email,
                'kode' => $kodepenting,
                'telp' => $request->telp,
                'status' => $status,
                'image' => $image->hashName(),
            ]);
    
            return redirect()->route('email.index2')->with('message', 'Verifikasi Anda Berhasil, Tunggu pemberitahuan yang akan dikirim ke Email anda !');
            
        } else {
            return redirect()->route('email.index2')->with('danger', 'No Registrasi salah, Pastikan No registrasi anda sesuai dengan yang di Email !');
        }
        
    }

    public function kirim3(Request $request)
    {

        //validate form
        $this->validate($request, [
            'foto'           => 'required',
            'nik'           => 'required|numeric|min:16',
            'nisn'          => 'required|numeric|min:10',
            'tempatlahir'   => 'required',
            'tgllahir'      => 'required',
            'alamat'      => 'required',
            'jeniskelamin'  => 'required',
            'agama'         => 'required',
            'sekolahasal'   => 'required',
            
        ]);

        $image = $request->file('foto');
        $image->storeAs('public/assets', $image->hashName());

        Pendaftar::where('id', $request->id)->update([
            'foto'     => $image->hashName(),
            'nik'     => $request->nik,
            'nisn'   => $request->nisn,
            'tempatlahir'   => $request->tempatlahir,
            'tgllahir'   => $request->tgllahir,
            'alamat'   => $request->alamat,
            'jeniskelamin'   => $request->jeniskelamin,
            'agama'   => $request->agama,
            'sekolahasal'   => $request->sekolahasal,
            
        ]);
    
        return redirect()->route('email.index3', $request->id)->with('message', 'Pendaftaran Anda Berhasil!');
            
        
        
    }
}