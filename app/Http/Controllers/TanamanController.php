<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;

class TanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'name' => 'required',
            'type' => 'required',
            'notes' => 'required',
        ]);

        Tanaman::create([
            'kode' => $request->kode,
            'name' => $request->name,
            'type' => $request->type,
            'notes' => $request->notes,
        ]);
        

        return redirect('/')->with('addTanaman', 'Berhasil menambahkan data Tanaman!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */

    public function data()
    {
        $tanams = Tanaman::all();

        return view('dashboard', compact('tanams'));
    }

    public function show(Tanaman $tanaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tanams = Tanaman::where('id', $id)->first();
        // kemudian arahkan/tampilkan file view yang bernama edit.blade.php dan kirim data dari $todo ke file edit tersebut dengan bantuan compact
        return view('edit', compact('tanams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'name' => 'required',
            'type' => 'required',
            'notes' => 'required',
            'growth' => 'required',
        ]);

        Tanaman::where('id', $id)->update([
            'kode' => $request->kode,
            'name' => $request->name,
            'type' => $request->type,
            'notes' => $request->notes,
            'growth' => $request->growth,
        ]);

        return redirect('')->with('successUpdate', 'Successfully changed data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tanaman::where('id', $id)->delete();
        // 
        return redirect('/')->with('successDelete', 'Successfully deleted data!');
    }
}
