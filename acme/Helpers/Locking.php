<?php
/**
 * Created by PhpStorm.
 * User: Gerardo
 * Date: 25/3/2019
 * Time: 12:09
 */

namespace Acme\Helpers;


use App\Histopatologia;
use App\User;
use Illuminate\Support\Facades\Auth;

class Locking
{
    public static function lockedHisto($item, $user)
    {
        if ($item->locked_at === true) {
            if ($item->locked_user != $user->id) {
                $luser = User::findOrFail($item->locked_user);
                flash('Este registro esta siendo actualizado por: ' . $luser->username, 'warning')->important();
                //return redirect()->to('/histopatologia');

                return $locked = true;
            }
        } else {
            $item->locked_at = true;
            $item->locked_user = Auth::Id();
            $record = Histopatologia::findOrFail($item->id);
            $record->update([
                'locked_at' => $item->locked_at,
                'locked_user' => $item->locked_user
            ]);

            return $locked = false;
        }
    }

}