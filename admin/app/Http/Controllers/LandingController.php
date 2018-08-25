<?php

namespace Latina\Http\Controllers;

use Illuminate\Http\Request;
use Latina\ValidateLanding;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $validate = new ValidateLanding($request->all());
        return json_encode($validate->getValidate(), JSON_UNESCAPED_UNICODE);
    }

    protected function create()
    {

    }
}
