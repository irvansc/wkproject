<?php

namespace App\Http\Controllers;

use App\Models\Foot;
use App\Models\Kontak;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Contact';
        $p = Foot::all()->first();
        return view('frontend.contact.index', compact('title', 'p'));
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'telp' => 'required',
            'pesan' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'telp.required' => 'Telphone wajib diisi',
            'pesan.required' => 'Pesan wajib diisi',
            'email.email' => 'Email tidak valid'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $contact = new Kontak;
            $contact->nama = $request->nama;
            $contact->email = $request->email;
            $contact->telp = $request->telp;
            $contact->pesan = $request->pesan;
            $contact->save();
            return response()->json(['status' => 1, 'message' => 'Terimakasih Pesan berhasil dikirim, kami akan segera menghubungi anda']);
            // return response()->json(['success' => 'Terimakasih Pesan berhasil dikirim, kami akan segera menghubungi anda']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}