<?php

namespace App\Http\Controllers\Auth;

use App\Utilisateur;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
                'nom' => 'required',
                'prenom' => 'required',
                'adresse' => 'required',
                'ville' => 'required',
                'email' => 'required|email',
                'telephone' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Utilisateur::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'adresse' => $data['adresse'],
            'ville' => $data['ville'],
            'pays' => $data['pays'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'pin' => bcrypt($data['pin']),
            'puk' => rand(1000, 9999),
        ]);
    }
}
