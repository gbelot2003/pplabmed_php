<?php
namespace Acme\Helpers;

use App\Http\Requests\ImagesValidator;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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

    /**
     * @param Request $request
     * @return mixed
     */
    public function setImges(Request $request)
    {
        $fname = $request->get('name');
        $name = str_replace('.jpg', '.png', $fname);
        $img = $request->get('images');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $img = base64_decode($img);

        file_put_contents('img/histo/' . $name, $img);
        return $name;
    }

    /**
     * @param ImagesValidator $request
     */
    public function getImagesForUpload(ImagesValidator $request)
    {
        $name = $request->images->getClientOriginalName();
        $path = $request->file('images')->move(public_path('img/histo'), $name);
        $images = Image::create([
            'image_url' => $name,
            'link_id' => $request->get('link_id')
        ]);
    }

    /**
     * @param Request $request
     * @return Request
     */
    private function checkPassworldStatus(Request $request)
    {
        if ($request->input('password')):
            $request['password'] = bcrypt($request->input('password'));
            unset($request['password_confirmation']);
        else:
            unset($request['password']);
            unset($request['password_confirmation']);
        endif;
        return $request;
    }
}