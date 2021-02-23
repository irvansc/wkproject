<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Agenda;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'agenda';
        $agendas = Agenda::all();
        return view('admin.backend.agenda.index', compact('title', 'agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'agenda create';
        return view('admin.backend.agenda.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agenda = new Agenda;
        $agenda->name = $request->name;
        $agenda->tanggal = now();
        $agenda->deskripsi = $request->deskripsi;
        $agenda->mulai = $request->mulai;
        $agenda->selesai = $request->selesai;
        $agenda->tempat = $request->tempat;
        $agenda->waktu = $request->waktu;
        $agenda->keterangan = $request->keterangan;
        $agenda->author = $request->author;

        $agenda->save();
        return redirect('aagenda')->with('sukses', 'Agenda berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Show Agenda';
        $row = Agenda::findOrFail($id);
        return view('admin.backend.agenda.show', compact('title', 'row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Agenda';
        $agenda = Agenda::findOrFail($id);
        return view('admin.backend.agenda.edit', compact('title', 'agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agenda = Agenda::findorFail($id);
        $agenda->name = $request->name;
        $agenda->tanggal = now();
        $agenda->deskripsi = $request->deskripsi;
        $agenda->mulai = $request->mulai;
        $agenda->selesai = $request->selesai;
        $agenda->tempat = $request->tempat;
        $agenda->waktu = $request->waktu;
        $agenda->keterangan = $request->keterangan;
        $agenda->author = $request->author;

        $agenda->save();
        return redirect('aagenda')->with('sukses', 'Agenda berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
    public function delete($id)
    {

        Agenda::where('id', $id)->delete();

        return redirect('aagenda')->with('sukses', 'Agenda Berhasil Dihapus');
    }
}
