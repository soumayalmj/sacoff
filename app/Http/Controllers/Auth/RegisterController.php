<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Email;
use App\PayCountry;
use App\TelUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Bestmomo\LaravelEmailConfirmation\Traits\RegistersUsers;


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
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'adresse' => 'required',
                'pays' => 'required|string|max:255',
                'email' => 'required|email||string|max:255unique:emails_users',
                'telephone' => 'required',
                'password' => 'required|max:4',
                'password_confirmation' => 'required|same:password',
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
        function generate_qr_code(){
            $renderer = new \BaconQrCode\Renderer\Image\Png();
            $renderer->setHeight(512);
            $renderer->setWidth(512);
            $writer = new \BaconQrCode\Writer($renderer);
            $writer->writeFile('lien fictif', 'qrcode.png');
            //dd($writer);
        }

        function generateCode($chrs = "",$t = FALSE,$onlynum =FALSE) {
            if ($chrs == "")
            $chrs = 8;
            $chaine = "";
            $list = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
            $listnum = "0123456789";
            $listr="";
            if($onlynum == TRUE)
            $listr = $listnum;
            else
            $listr = $list;
            mt_srand ( ( double ) microtime () * 1000000 );
            $newstring = "";
            if($t == TRUE) $newstring .= time ();
            while ( strlen ( $newstring ) < $chrs ) {
                $newstring .= $listr [mt_rand ( 0, strlen ( $listr ) - 1 )];
            }
            
            return $newstring;
        }

        $nom =$data['nom'];
        $prenom =$data['prenom'];
        $username =$data['username'];
        $adresse=$data['adresse'];
        $pays=$data['pays'];
        $email=$data['email'];
        $telephone=$data['telephone'];
        $password=$data['password'];
        
        $puk = generateCode(4, FALSE, TRUE);
        $payCountry = PayCountry::where('name', $pays)->first();

        

        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'username' => $data['username'],
            'adresse' => $data['adresse'],
            'pay_country_id' => $payCountry->id,
            'password' => bcrypt($password),
            'puk' => bcrypt($puk),
            'token' => generateCode(16, TRUE),
        ]);

        $newEmail = new Email(['email' => $email, 'token' => generateCode(16, TRUE), 'user_id' => $user->id]);
        $user->emails()->save($newEmail);
        $tel = new TelUser(['mobile' => $telephone, 'token' => generateCode(16, TRUE), 'user_id' => $user->id]);
        $user->telUsers()->save($tel);

    }
}
