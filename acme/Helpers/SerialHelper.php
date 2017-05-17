<?php
namespace Acme\Helpers;

use App\CitoSerial;

class SerialHelper{

    /**
     * @param $req
     */
    public function setSerial($req, $cod)
    {

        $preserial = CitoSerial::findOrFail($cod);
        $serial = ($preserial->serial + 1);

        if($serial != $req){
            $getSerial = CitoUnbind::where('unbind', $req)->first();
            $getSerial->delete();
        } else {
            $getSerial = CitoSerial::findOrFail($cod);
            $getSerial->serial = $req;
            $getSerial->update();
        }
    }

    /**
     * @return mixed
     */
    public function getSerial($cod)
    {
        $getSerial = CitoSerial::findOrFail($cod);
        $sserial = $getSerial->serial;
        $serial = ($sserial + 1);
        return $serial;
    }
}