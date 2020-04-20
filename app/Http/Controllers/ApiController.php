<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Record;

class ApiController extends Controller
{
    /**
     * We dont need api authentication at this point
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     * @version   GIT: $Id; Crdev ltd. 2019 $
     */
    public function put(Request $request)
    {
        $data = [
            'uid'           => $request->get('uid'),
            'long'          => $request->get('long'),
            'lat'           => $request->get('lat'),
            'symptoms'      => $request->get('symptoms'),
            'tested'        => $request->get('tested'),
            'test_positive' => $request->get('test_positive'),
            'data'          => $request->get('data')
        ];

        $model = new Record($data);
        if ($model->save()) {
            return $model;
        }

        header("", true, 400);
    }
}
