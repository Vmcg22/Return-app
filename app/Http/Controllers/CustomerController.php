<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('layouts.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return response()->json($request);
        $customer = new Customer();

        $customer->contact = $request->contact; //Snow Shadow
        $customer->email = $request->email; //snow.shadow@gmail.com
        $customer->code_country = $request->codigo_pais; //+52
        $customer->phone_number = $request->phone_number; //8673065369

        //Datos Google Maps
        $customer->address = $request->addressGoogleMaps; //Avenida Reforma
        $customer->number = $request->numberGoogleMaps; //2007                              -> Pend. de crear columna en BD
        $customer->colony = $request->colonyGoogleMaps; //Infonavit Fundadores              -> Pend. de crear columna en BD
        $customer->city = $request->cityGoogleMaps; //Nuevo Laredo
        $customer->state = $request->stateGoogleMaps; //Tamaulipas
        $customer->zip = $request->zipGoogleMaps; //88275
        $customer->complete_address = $request->completeAddress; //Avenida Reforma          -> Pend. de crear columna en BD  
        $customer->geoCoord = $request->geoCoordGoogleMaps; //27.45331, -99.51580399999999  -> Pend. de crear columna en BD
        
        $customer->type = $request->type;
        $customer->credit_limit = $request->credit_limit;
        $customer->active = true;

       $customer->save(); 

       alert()->success('Cliente guardado correctamente');

       return redirect()->route('customers.index');
        //return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
