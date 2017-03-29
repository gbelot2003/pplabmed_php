<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Http\Requests\FacturasValidate;
use Illuminate\Http\Request;

class FactutasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Pagina Principal';
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
     * @return string
     */
    public function store(FacturasValidate $request)
    {

        $request['fecha_nacimiento'] = $this->setFecha($request->get('fecha_nacimiento'));
        $request['edad'] = $this->setEdad($request->get('edad'));
        $factura = Factura::create($request->all());
        $examenes = $factura->examenes;
        foreach ($examenes as $examen){
            $factura->examenes->create($request->all());
        }

        $result = '200';
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
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
        dd($request->all(), $id);
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

    public function setFecha($edad){
        return date('Y-m-d H:i:s', strtotime($edad));
    }

    public function setEdad($edad){
        return intval(date('Y', time() - strtotime($edad))) - 1970;
    }
}
