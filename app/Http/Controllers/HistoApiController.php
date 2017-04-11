<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoApiController extends Controller
{

    public function movilImages(Request $request)
    {
        return $request->all();
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


       /// dd($request->all());
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
