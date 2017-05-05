<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoApiController extends Controller
{

    public function mobilImages(Request $request)
    {

        $username = $request->get('username');
        $password = $request->get('password');
        $fname = $request->get('name');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            if($request->has('images')){
                $name = str_replace('.jpg', '.png', $fname);
                $img = $request->get('images');
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $img = base64_decode($img);
                file_put_contents('img/histo/'.$name, $img);

                $images = Image::create([
                    'image_url' => $name,
                    'link_id' => $request->get('link_id')
                ]);

                return $images->image_url;
            }
        }
    }


    public function user(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
           return 'ok';
        }

        return 'denie';
    }


    public function uploadImage(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {

            if($request->hasFile('images')){
                $name = $request->images->getClientOriginalName();
                $path = $request->file('images')->move(public_path('img/histo'), $name);
                $images = Image::create([
                    'image_url' => $name,
                    'link_id' => $request->get('link_id')
                ]);

                return 'ok';

            }
            return 'error';
        }

        return 'denie';


    }
}
