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

        return redirect()->to(action('HistopatologiaController@edit', $histo->serial));
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
        $helpers = new Miselanius();
        $images = Image::findOrfail($id);
        $name = $helpers->setImges($request);

        $images->image_url = $name;
        if($request->has('descripcion'))
        {
            $images->descripcion = $request->get('descripcion');
        }

        $images->save();

    }

    public function delete($id)
    {
        $images = Image::findOrfail($id);
        $images->delete();
        flash('La imágen a sido retirada exitosamente', 'success')->important();
        return redirect()->to('/histopatologia/' .$images->histo->serial ."/edit");
    }



}
