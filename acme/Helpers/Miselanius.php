<?php
namespace Acme\Helpers;

use Illuminate\Http\Request;

Class Miselanius {

    /**
     * @param Request $request
     * @return Request
     */
    public function checkRequestStatus(Request $request)
    {
        if ($request['status'] == 'on'):
            $status = 1;
        else:
            $status = 0;
        endif;
        return $status;
    }
}