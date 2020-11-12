<?php


namespace App\APIResponse;


class APIUtil
{
    public static function response($code, $messageCode, $data = null) {
        $message = isset(self::$messages[$messageCode]) ? self::$messages[$messageCode] : self::$messages['MSG0000000'];
        return response()->json([
            'message'   => $message,
            'data'      => $data,
        ], $code);
    }

    public static function response500($message) {
        return response()->json([
            'message'   => $message,
        ], 500);
    }

    public static function getMessage($code) {
        return isset(self::$messages[$code]) ? self::$messages[$code] : self::$messages['MSG0000000'];
    }

    private static $messages = [
        'MSG0000000' => 'Message is not defined yet.',
        'MSG0000001' => 'Get data successfully.',
        'MSG0000002' => 'Create new data successfully.',
        'MSG0000003' => 'Update data successfully.',
        'MSG0000004' => 'ID does not exist.',
        'MSG0000005' => 'Data delete successfully.',
        'MSG0000006' => 'Create user successfully.',
    ];
}
