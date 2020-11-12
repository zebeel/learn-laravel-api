<?php

namespace App\Http\Controllers;

use App\APIResponse\APIUtil;
use App\Models\MyData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class APIController extends Controller
{

    public function getData(Request $request) {
        Log::info('Get data with ID: ' . $request['id']);
        try {
            $myData = MyData::find($request['id']);
            if (!$myData) throw new \Exception(APIUtil::getMessage('MSG0000004'));

            return APIUtil::response(200, 'MSG0000001', $myData);
        } catch (\Exception $e) {
            return APIUtil::response500($e->getMessage());
        }
    }

    public function newData(Request $request) {
        Log::info('Request data: ', $request->all());
        try {
            $myData = new MyData();
            $myData['data'] = $request['data'];
            $myData->save();

            return APIUtil::response(200, 'MSG0000002', $myData);
        } catch (\Exception $e) {
            return APIUtil::response500($e->getMessage());
        }
    }

    public function updateData(Request $request) {
        Log::info('Update data which ID is ' . $request['id'] . ' with data: ', $request->all());
        try {
            $myData = MyData::find($request['id']);
            if (!$myData) throw new \Exception(APIUtil::getMessage('MSG0000004'));
            $myData['data'] = $request['data'];
            $myData->save();

            return APIUtil::response(200, 'MSG0000003', $myData);
        } catch (\Exception $e) {
            return APIUtil::response500($e->getMessage());
        }
    }

    public function deleteData(Request $request) {
        Log:info('Delete data which ID is ' . $request['id']);
        try {
            $myData = MyData::find($request['id']);
            if (!$myData) throw new \Exception(APIUtil::getMessage('MSG0000004'));
            $myData->delete();

            return APIUtil::response(200, 'MSG0000005');
        } catch (\Exception $e) {
            return APIUtil::response500($e->getMessage());
        }
    }

    public function newUser(Request $request) {
        Log:info('Create new user with data: ', $request->all());
        try {
            $user = new User();
            $user['name'] = $request['name'];
            $user['email'] = $request['email'];
            $user['password'] = Hash::make($request['password']);
            $user['api_token'] = Str::random(60);
            $user->save();

            return APIUtil::response(200, 'MSG0000006', $user);
        } catch (\Exception $e) {
            return APIUtil::response500($e->getMessage());
        }
    }

}
