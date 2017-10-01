<?php

namespace App\Http\Controllers\Auth;

use Hash;
use Mail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

    protected $redirectPath = '/principal';
    protected $loginPath = '/';
    protected $logoutPath = '/';
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
            'email' => 'required|email|max:50',
            'password' => 'required|confirmed|min:6|max:12',
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
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function confirmRegister($email, $confirm_token)
    {
        $user = new User;
        $the_user = $user->select()
                    ->where('email', '=', $email)
                    ->where('confirm_token', '=', $confirm_token)->first();

        if (count($the_user) > 0) {
            $active = '1'; 
            $confirm_token = str_random(100);
            $user->where('email', '=', $email)
                ->update(['active' => $active, 'confirm_token' => $confirm_token]);

            $data = ['user' => $the_user];
            return view('auth/changePassword', $data);
        }
        else {
            return redirect()->route('/');
        }
    }

    public function changePassword(Request $request)
    {
        $password = $request->password;
        $re_password = $request->re_password;
        if (strcasecmp($password, $re_password) != 0) {
            return redirect()->route('/'); 
        }
        $user = new User;
        $user->where('idUser', '=', $request->id)
            ->update(['password' => Hash::make($request->password)]);

        return redirect()->route('/');
    }
}
