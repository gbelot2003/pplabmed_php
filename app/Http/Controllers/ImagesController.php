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

        $images = Image::findOrfail($id);

        $fname = $request->get('name');
        $name = str_replace('.jpg', '.png', $fname);
        $img = $request->get('images');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $img = base64_decode($img);

        file_put_contents('img/histo/'.$name, $img);

        $images->update([
            'image_url' => $name,
        ]);
    }

    public function delete($id)
    {
        $images = Image::findOrfail($id);
        $images->delete();
        return $id;
    }

}
