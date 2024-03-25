<?php

namespace App\Http\Controllers;

use App\Models\reservas;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $reservas = reservas::with(['cliente', 'vehiculo'])
        ->where('codigo', 'like', "%{$request->buscar}%")
        ->get();
    

        return $reservas;
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
        $reservas=Reservas::create($input);
        
        return response()->json(['res'=> true, 'message'=> 'Insertado correctamente'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $reservas = Reservas::with(['cliente', 'vehiculo'])->find($id);

        return $reservas;
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
        $reservas = Reservas::find($id);
        $reservas->update($input);
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
            Reservas::destroy($id);
            return response()->json(['res'=> true, 'message'=> 'elimando correctamente'],200);
        }
        catch (\Exception $e) {
            return response()->json(['res'=> false, 'message'=> $e->getMessage()],200);
    
        }
    }
}
