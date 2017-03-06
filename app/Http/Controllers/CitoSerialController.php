<?php

namespace App\Http\Controllers;

use App\CitoSerial;
use Illuminate\Http\Request;

class CitoSerialController extends Controller
{
    public function citologiaUpdate(Request $request)
    {
        $serial = CitoSerial::findOrFail(1);
        $serial->serial = $request->input('serial');
        $serial->update();
        return redirect()->to(action('CitologiaController@index'));
    }

    public function histoUpdate(Request $request)
    {
        $serial = CitoSerial::findOrFail(2);
        $serial->serial = $request->input('serial');
        $serial->update();
    }
}
