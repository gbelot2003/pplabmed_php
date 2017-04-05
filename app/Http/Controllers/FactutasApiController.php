<?php

namespace App\Http\Controllers;

use App\Examenes;
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
     * @param FacturasValidate $request
     * @return string
     */
    public function store(FacturasValidate $request)
    {

        $request['fecha_nacimiento'] = $this->setFecha($request->get('fecha_nacimiento'));
        $request['edad'] = $this->setEdad($request->get('edad'));
        //$factura = Factura::create($request->all());
        $examenes = $request->get('examenes');
        foreach ($examenes['examen'] as $examen){
            if(is_array($examen))
            {
                dd("es array");
            } else {
                dd("no es array");
            }
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
