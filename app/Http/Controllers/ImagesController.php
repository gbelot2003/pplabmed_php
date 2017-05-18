<?php

namespace App\Http\Controllers;

use Acme\Helpers\Miselanius;
use App\Http\Requests\ImagesValidator;
use App\Image;
use Illuminate\Http\Request;

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
        if($request->hasFile('images')){
            $helpers->getImagesForUpload($request);
        }

        return redirect()->to(action('HistopatologiaController@edit', $request->get('id')));
    }

    public function update(ImagesValidator $request, $id)
    {
        $helpers = new Miselanius();
        $images = Image::findOrfail($id);
        $name = $helpers->setImges($request);
        $images->update(['image_url' => $name]);
    }

    public function delete($id)
    {
        $images = Image::findOrfail($id);
        $images->delete();

        return $id;
    }



}
