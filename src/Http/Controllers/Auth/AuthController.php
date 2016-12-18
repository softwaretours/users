<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\Users\UserInterface;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     *  User Repository Interface
     */
    public $userInterface;


    /**
     * AuthController constructor.
     * Create a new authentication controller instance.
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->userInterface = $user;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->userInterface->getValidatorCreateDataSite());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\Users\User
     */
    protected function create(array $data)
    {
        /**
         *  parent_id: 1 - Administrator
         */
        return $this->userInterface->createUser([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'password_text' => $data['password'],
            'status' => 1,
            'parent_id' => 1
        ]);
    }
}
