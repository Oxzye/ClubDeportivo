<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;

class SociosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socios = Socio::with('user')->get();

        return view('panel.socios.index', compact('socios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('panel.socios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //valid

        //guardado de datos
        Socio::create($request->all());

        //Redir
        return redirect()->route('panel.socios.create')->with('status', 'País creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
