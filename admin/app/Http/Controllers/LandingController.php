<?php

namespace Latina\Http\Controllers;

use Illuminate\Http\Request;
use Latina\Lid;
use Latina\ValidateLanding;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $validate = new ValidateLanding($request->all());
        $result = $validate->getValidate();
        if ($result['error'] == false){
            $this->create($request->all());
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    protected function create(array $request)
    {
        $lid = new Lid();
        $lid->fill($request);
        $lid->save();
    }
}
