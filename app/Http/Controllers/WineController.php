<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use App\Models\Wine;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $wines = Wine::orderBy('name')->paginate(3);
        if ($request->ajax()) {
            $ret = '';

            foreach ($wines as $wine) {
                $atts = [
                    'wine' => $wine
                ];
                $ret .= view ('components.wine', $atts)->render();
            }
            return response()->json (['scrollHTML' => $ret]);
        }

        return view ('wines.index', compact('wines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $bars = Bar::orderBy ('name')->get();
        return view ('wines.create', compact('bars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd ($request);
        try {
            $wine = Wine::create ([
                 'name' => $request->name,
                 'description' => $request->description,
                 'winery' => $request->winery,
                 'price' => $request->price,
                 'vol' => $request->vol
             ]);
             $wine->bars()->attach($request->bars);
             $wine->saveOrFail ();

        }
        catch(Exception $e) {
            //dd($e);
            return redirect()->route('wine.index')->with ('code', 240)->with ('message', 'El vino NO se ha podido guardar');
        }
        return redirect()->route('wine.index')->with ('code', 0)->with ('message', 'El vino se ha guardado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {
        //
        try {
            $host = 'api.frankfurter.app';
            $operation = 'latest';
            $endpoint = "https://$host/$operation";
            //dd($wine);
            $response = Http::get ($endpoint, [
                    'to' => 'USD,GBP,CHF,JPY,NOK',
                    'amount' => $wine['price']
                ]);
            $json = $response->json();
            $rates = $json['rates'];

            
            
        }
        catch (Exception $e) {
            // codigo en caso de error
            return view ('wines.show', compact('wine'));
        }
        return view ('wines.show', compact('wine', 'rates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wine $wine)
    {
        //
        $bars = Bar::orderBy ('name')->get();
        return view ('wines.edit', compact('wine', 'bars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wine $wine)
    {
        //
        try {
            $wine->name = $request->name;
            $wine->description = $request->description;
            $wine->winery = $request->winery;
            $wine->price = $request->price;
            $wine->vol = $request->vol;
            
            $wine->bars()->sync($request->bars);

            $wine->saveOrFail();
        }
        catch(Exception $e) {
            return redirect()->route('wine.index')->with ('code', 240)->with ('message', 'El vino NO se ha podido actualizar');
        }

        return redirect()->route('wine.index')->with ('code', 0)->with ('message', 'El vino se ha actualizado correctamente');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wine $wine)
    {
        //
        try {
             $wine->bars()->detach();
             $wine->deleteOrFail();
        }
        catch(Exception $e) {
            return redirect()->route('wine.index')->with ('code', 240)->with ('message', 'El vino NO se ha podido eliminar');
        }
         
        return redirect()->route('wine.index')->with ('code', 0)->with ('message', 'El vino se ha borrado correctamente');
    
    }
}
