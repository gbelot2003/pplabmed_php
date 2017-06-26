<?php
namespace Acme\Helpers;

use App\Audit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersControllerHelper {

    /**
     * @param Request $request
     */
    public function storeAndSync(Request $request)
    {
        $item = User::create($request->all());
        $this->syncFiles($request, $item);
        Audit::create([
            'title' => 'Usuario',
            'action' => 'Creacion',
            'details' => 'Usuario ID: ' . $item->id,
            'user_id' => Auth::user()->id
        ]);
    }

    /**
     * @param Request $request
     * @param $user
     */
    public function UpdateAndSync(Request $request, $user)
    {
        $user->update($request->all());
        $this->syncFiles($request, $user);
        Audit::create([
            'title' => 'Usuario',
            'action' => 'Edicion',
            'details' => 'Usuario ID: ' . $user->id,
            'user_id' => Auth::user()->id
        ]);
    }

    /**
     * @param Request $request
     * @param $item
     */
    private function syncFiles(Request $request, $item)
    {
        if ($request->input('roles_lists')) {
            if (!is_array($request->input('roles_lists'))) {
            } else {
                $item->roles()->sync($request->input('roles_lists'));
            }
        }
    }

}