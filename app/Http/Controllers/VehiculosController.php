<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $vehiculos= vehiculos::with(['reservas'])
        ->where('placa','like',"%{$request->buscar}%")
        ->get();
        return $vehiculos;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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
        $vehiculos=vehiculos::create($input);
        
        return response()->json(['res'=> true, 'message'=> 'Insertado correctamente'],200);
    }
        /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $vehiculos = vehiculos::with (['reservas'])->find($id);
        return $vehiculos;
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
        $vehiculos = vehiculos::find($id);
        $vehiculos->update($input);
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
            vehiculos::destroy($id);
            return response()->json(['res'=> true, 'message'=> 'Eliminado correctamente'],200);
        }
        catch (\Exception $e) {
            return response()->json(['res'=> false, 'message'=> $e->getMessage()],200);
    
        }
    }
    
}
