<?php
namespace Acme\Helpers;

use App\User;
use Illuminate\Http\Request;

class UsersControllerHelper {

    /**
     * @param Request $request
     */
    public function storeAndSync(Request $request)
    {
        $item = User::create($request->all());
        $this->syncFiles($request, $item);
    }

    /**
     * @param Request $request
     * @param $user
     */
    public function UpdateAndSync(Request $request, $user)
    {
        $user->update($request->all());
        $this->syncFiles($request, $user);
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