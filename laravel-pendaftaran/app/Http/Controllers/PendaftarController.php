<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail2;
use App\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pendaftar = Pendaftar::orderBy('status', 'asc')->paginate(10);

        return view('pendaftar.list', [
            'title' => 'Pendaftar',
            'pendaftars' => $pendaftar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftar $pendaftar)
    {
        return view('pendaftar.edit', [
            'title' => 'Edit Pendaftar',
            'pendaftar' => $pendaftar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftar $pendaftar)
    {
        //validate form
        $this->validate($request, [
            'nik'           => 'required|numeric|min:16',
            'nisn'          => 'required|numeric|min:10',
            'nama'     => 'required',
            'tempatlahir'   => 'required',
            'tgllahir'      => 'required',
            'alamat'      => 'required',
            'jeniskelamin'  => 'required',
            'agama'         => 'required',
            'email'    => 'required',
            'kode'     => 'required',
            'telp'     => 'required',
            'status'     => 'required',
            'sekolahasal'   => 'required',
        ]);

        $pendaftar->nik = $request->nik;
        $pendaftar->nisn = $request->nisn;
        $pendaftar->nama = $request->nama;
        $pendaftar->tempatlahir = $request->tempatlahir;
        $pendaftar->tgllahir = $request->tgllahir;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->jeniskelamin = $request->jeniskelamin;
        $pendaftar->agama = $request->agama;
        $pendaftar->email = $request->email;
        $pendaftar->kode = $request->kode;
        $pendaftar->telp = $request->telp;
        $pendaftar->status = $request->status;
        $pendaftar->sekolahasal = $request->sekolahasal;
        $pendaftar->save();

        return redirect()->route('pendaftar.index')->with('message', 'Pendaftar berhasil diupdate!');
    }

    public function show($id)
    {
        $pendaftar = Pendaftar::where('id',$id)->first();

        $data = [
            'id' => $pendaftar->id,
            'nama' => $pendaftar->nama,
            'kode' => $pendaftar->kode
        ];

        if ($pendaftar->status == 0) {
            $status =1;
            Mail::to($pendaftar->email)->send(new SendEmail2($data));
        } else {
            $status = 0;
        }

        Pendaftar::where('id', $id)->update(['status'=>$status]);
        return redirect()->route('pendaftar.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pendaftar $pendaftar)
    {
        $pendaftar->delete();

        return redirect()->route('pendaftar.index')->with('message', 'Pendaftar Berhasil Dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        $pendaftars = Pendaftar::where('pendaftars.nama', 'LIKE', '%' . $query . '%')
        ->orderBy('pendaftars.id', 'desc')
        ->paginate(10);

        return view('pendaftar.list', [
            'title' =>  'Pendaftar',
            'pendaftars' => $pendaftars,
            'query' => $query,
        ]);
    }

    public function select(Request $request)
    {
        $status = $request->status;

        $pendaftars = Pendaftar::orderBy('status','asc')
        ->where('pendaftars.status',$status)
        ->paginate(2);

        return view('pendaftar.list', [
            'title' =>  'Pendaftar',
            'pendaftars' => $pendaftars,
        ]);
    }

}
