<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Nonracikan;
use RealRashid\SweetAlert\Facades\Alert;

class NonracikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = DB::table('obatalkes_m')->orderBy('obatalkes_nama', 'asc')->get();
        $signa = DB::table('signa_m')->get();
        return view('nonracikan', [
            'obats' => $obat,
            'signas' => $signa
        ]);
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
        $this->validate($request, [
            'obat' => 'required',
            'stok' => 'required',
            'signa' => 'required'
        ]);

        $nonracikan = Nonracikan::create([
            'obatalkes_nama'    => $request->obat,
            'stok'              => $request->stok,
            'signa_nama'        => $request->signa
        ]);

         // return redirect('home');
         return view('home');
        // return redirect()->route('home')
        //     ->with('success_message', 'Berhasil menambah pasien baru');
        // return $nonracikan;
        // dd($nonracikan);
        // return redirect('nonracikan')->with('success', 'Task Created Successfully!');
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
