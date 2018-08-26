<?php

namespace Latina\Http\Controllers;

use Illuminate\Http\Request;
use Latina\Direction;
use Latina\Lid;
use Latina\Mail\LandingLid;
use Latina\ValidateLanding;
use Mail;

class LandingController extends Controller
{
    /**
     * Длеает проверку и если все успешно выводит JSON о результате
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $direction = Direction::find($data['direction_id']);
        $validate = new ValidateLanding($data);
        $result = $validate->getValidate();
        if ($result['error'] == false){
            $data['direction'] = $direction->name;
            $data['type'] = $data['type'] == '1' ? __('value.group') : __('value.individual');
            $this->create($request->all());
            $this->send($data);
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Сохраняет в бд заявку
     * @param array $request
     * @return Lid
     */
    protected function create(array $request)
    {
        $lid = new Lid();
        $lid->fill($request);
        $lid->save();
        return $lid;
    }

    /**
     * Отпарвляет почту
     * @param array $lid
     */
    protected function send(array $lid){
        Mail::to('absaruslan90@gmail.com')
        ->send(new LandingLid($lid));
    }
}
