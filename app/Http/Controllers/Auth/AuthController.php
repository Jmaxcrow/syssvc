<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function confirmRegister($email, $confirm_token)
    {
        $user = new User;
        $the_user = $user->select()
                    ->where('email', '=', $email)
                    ->where('confirm_token', '=', $confirm_token)->get();

        if (count($the_user) > 0) {
            $active = '1'; 
            $confirm_token = str_random(100);/*
            $user->where('email', '=', $email)
                ->update(['active' => $active, 'confirm_token' => $confirm_token]);*/

            $data = ['user' => $user];
            return redirect('auth/changePassword', $data);
        }

        else {
            return redirect('auth/showLogin');
        }
    }

    public function changePassword($id, Request $request)
    {
        $password = $request->password;
        $re_password = $request->re_password;
        if (strcasecmp($password, $re_password) != 0) {
            return redirect('auth/showLogin')->with('message', 'No puedes confirmar tu cuenta... Los passwords no coinciden vuelve a intentarlo');
        }
        $user = User::find($id)->first();

        $user->password = bcrypt($password);

        $user->save();

        return redirect('auth/showLogin')->with('message', 'Confirmada tu cuenta, Ya puedes iniciar sesion!!');
    }

    public function showLogin($message = null)
    {
        return $message;
    }
}
