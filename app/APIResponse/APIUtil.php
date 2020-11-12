<?php


namespace App\APIResponse;


class APIUtil
{

    public static function response($code, $messageCode, $data = null) {
        return response()->json([
            'message'   => self::getMessage($messageCode),
            'data'      => $data,
        ], $code);
    }

    public static function response500($message) {
        return response()->json([
            'message'   => $message,
        ], 500);
    }

    public static function getMessage($code) {
        return __("messages.".$code);
    }

}
