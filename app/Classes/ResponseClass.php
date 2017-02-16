<?php
namespace App\Classes;
class ResponseClass
{
    public static function PrepareResponse(
        $data, 
        $status = "success", 
        $message = "", 
        $extras = array()
    ) {
        $res = array();
        $res['data'] = $data;
        $res['status'] = $status;   
        $res['message'] = $message;

        if (count($extras)) {
            foreach ($extras as $k => $v) {
                $res[$k] = $v;
            }
        }

        $response = json_encode($res);
        return $response;
    }
}
