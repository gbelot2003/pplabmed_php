<?php

namespace App\Http\Controllers;

use Acme\Helpers\Miselanius;
use App\Http\Requests\ImagesValidator;
use App\Image;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

       if($request->hasFile('images')){
          $name = $request->images->getClientOriginalName();
          $path = $request->file('images')->move(public_path('img/histo'), $name);
          $images = Image::create([
              'image_url' => $name,
              'link_id' => $request->get('link_id')
          ]);

       }

       return redirect()->to(action('HistopatologiaController@edit', $request->get('id')));
    }

    public function update(Request $request, $id)
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
