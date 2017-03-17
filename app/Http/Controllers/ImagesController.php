<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{

    public function uploadForm(Request $request)
    {
       if($request->hasFile('images')){
          $name = $request->images->getClientOriginalName();
          //$path = Storage::put('public')->put($name, $request->get('images'));
          //$path = Storage::put($name, $request->file('images'), 'public');
          $path = $request->file('images')->move(public_path('img/histo'), $name);
          $images = Image::create([
              'image_url' => $name,
              'link_id' => $request->get('link_id')
          ]);

        return redirect()->to(action('HistopatologiaController@edit', $request->get('id')));
       }
    }

}
