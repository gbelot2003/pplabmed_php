<?php

namespace App\Http\Controllers;

use Acme\Helpers\Miselanius;
use App\Histopatologia;
use App\Http\Requests\ImagesValidator;
use App\Image;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ImagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageHisto');
    }


    public function uploadForm(ImagesValidator $request)
    {
        $helpers = new Miselanius();

        $histo = Histopatologia::findOrFail($request->get('id'));


        if($request->hasFile('images')){
            $helpers->getImagesForUpload($request);
        }

        return redirect()->to(action('HistopatologiaController@edit', $histo->id));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = Image::findOrFail($id);
        return View('resultados.histopatologia.image.edit', compact('item'));
    }


    public function update(ImagesValidator $request, $id)
    {
        //dd($request->all());
        $images = Image::findOrfail($id);

        if($request->has('descripcion'))
        {
            $images->descripcion = $request->get('descripcion');
        }

        if($request->has('order'))
        {
            $images->order = $request->get('order');
        }

        $images->save();
        return redirect()->to('/histopatologia/' .$images->histo->id ."/edit");

    }

    public function delete($id)
    {
        $images = Image::findOrfail($id);
        $images->delete();
        flash('La imágen a sido retirada exitosamente', 'success')->important();
        return redirect()->to('/histopatologia/' .$images->histo->id ."/edit");
    }



}
