<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ],[
            'name.required' => 'Required Name!',
            'email.required' => 'Required Email',

            'contact_number.required' => 'Required contact number',
            'email.unique' => 'already exists this email'

        ]);

        if($validator->fails())
        {
            return response()->json([
                'error' => $validator->errors(),
            ]);
        }
        return response()->json([
            'succress' => true
        ]);
    }
}
