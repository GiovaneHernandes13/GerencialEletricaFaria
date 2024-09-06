<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientesPF;

class ClientesPFController extends Controller
{
    public readonly ClientesPF $cliente;

    public function __construct()
    {
        $this->cliente = new ClientesPF();
    }

    public function index()
    {
        $clientes = $this->cliente->all();
        return view('layout.clientes', ['clientes' => $this->cliente]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
