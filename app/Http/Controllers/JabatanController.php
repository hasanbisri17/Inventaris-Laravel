<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Employee;
use Log;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.jabatan.index',[
            'data'=>Jabatan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jabatan::create($request->all());
        return redirect()->route('jabatan.index')->with('message','create a Jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        return view('pages.jabatan.edit',[
            'data' => $jabatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        Jabatan::find($jabatan->id)->update($request->except('_method','_token'));
        return redirect()->route('jabatan.index')->with('message','edit a jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        $cek = Employee::where('jabatan_id',$jabatan->id)->count();
        if ($cek > 0) {
            return redirect()->back()->withError('This jabatan is already in use');
        }else{
            Log::info('Melakukan penghapusan ruangan');
            $jabatan->delete();
            return redirect()->route('room.index')->with('message','delete a room');
        }
    }
}
