<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
     /**
      * ユーザの登録
      *
      * @param  Request $request
      * @return Response
      */
     public function register(Request $request)
     {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User;
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = app('hash')->make($request->input('password'));
        $user->save();

        return response()->json(['message' => 'created'],201);
     }

     /**
      * ユーザ認証
      *
      * @param  Request $request
      * @return Response
      */
      public function login(Request $request)
      {
          $this->validate($request, [
              'email'    => 'required',
              'password' => 'required',
          ]);

          $credentials = $request->only(['email', 'password']);

          if(! $token = auth()->attempt($credentials)){
              return response()->json(['message' => '$credentials'], 401);
          }

          return response()->json(['token' => $token], 200);
      }

    /**
     * ログインユーザの表示
     * 
     * @return Response
     */
    public function me()
    {
        return response()->json(auth()->user(), 200);
    }
}
