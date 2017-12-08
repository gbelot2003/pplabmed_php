<?php

namespace App\Http\Controllers;

use App\Histopatologia;
use App\HistopatologiasEng;
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

                return '200';
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

    /**
     * Funcion de salida para API
     */
    public function histoData(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $serial = $request->get('serial');
        $factura = $request->get('factura');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $histo = Histopatologia::where('serial', $serial)
            ->where('factura_id', $factura)
            ->with('images', 'facturas', 'firma', 'firma2')->first();
            return $histo;
        }
        return "null";
    }

    public function histDatEng(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $serial = $request->get('serial');
        $factura = $request->get('factura');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $histo = HistopatologiasEng::where('serial', $serial)
                ->where('factura_id', $factura)
                ->with('images', 'facturas', 'firma', 'firma2')->first();
            return $histo;
        }
        return "null";
    }

}
