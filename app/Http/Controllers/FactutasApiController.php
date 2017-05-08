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
    public function store(Request $request)
    {
       $request['fecha_nacimiento'] = $this->setFecha($request->get('fecha_nacimiento'));

       $request['edad'] = $this->setEdad($request->get('edad'));
       $factura = Factura::create($request->all());
        $examenes = $request->get('examenes');

        $examen = $this->safeArrayCombine($examenes["codigo_examen"], $examenes["nombre_examen"]);

        foreach($examen as $exam){
            $var = Examenes::create([
                'num_factura' => $request->get('num_factura'),
                'item' => $exam['codigo_examen'],
                'nombre_examen' => $exam['nombre_examen']
            ]);
        }

        return "200";

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
    public function edit($id)    {
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

    /**
    *
    **/
    public function safeArrayCombine($keys, $values) { 
    $combinedArray = array(); 
        
    for ($i=0, $keyCount = count($keys); $i < $keyCount; $i++) { 
         $combinedArray[$keys[$i]] = $values[$i]; 
    } 
        
    return $combinedArray; 
} 
}
