<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        //
        $clientes= clientes::with(['reservas'])
        ->where('cedula','like',"%{$request->buscar}%")
        ->orwhere('nombre','like',"%{$request->buscar}%")
        ->get();
        return $clientes;
        
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
        $input = $request->all(); 
        $input['user_id']= auth()->user()->id; 
        $clientes=Clientes::create($input);
        
        return response()->json(['res'=> true, 'message'=> 'Insertado correctamente'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $clientes = clientes::with (['clientes'])->find($id);
        return $clientes;
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
        $input = $request->all();
        $clientes = Clientes::find($id);
        $clientes->update($input);
        return response()->json(['res'=> true,'message'=> 'Modificado correctamente'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
            //
            Clientes::destroy($id);
            return response()->json(['res'=> true, 'message'=> 'Eliminado correctamente'],200);
        }
        catch (\Exception $e) {
            return response()->json(['res'=> false, 'message'=> $e->getMessage()],200);
    
        }
    }
}
