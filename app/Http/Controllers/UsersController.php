<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Email;
use App\PayCountry;
use App\TelUser;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('guest');
    }

    public function generateCode($chrs = "",$t = FALSE,$onlynum =FALSE) {
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
        if($t == TRUE)$newstring .= time () ;
        while ( strlen ( $newstring ) < $chrs ) {
            
            $newstring .= $listr [mt_rand ( 0, strlen ( $listr ) - 1 )];
        }
        
        return $newstring;
    }

    public function inscription()
    {
        return view('auth.inscription_user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscription_post(Request $request)
    {
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
            if($t == TRUE)$newstring .= time () ;
            while ( strlen ( $newstring ) < $chrs ) {
                
                $newstring .= $listr [mt_rand ( 0, strlen ( $listr ) - 1 )];
            }
            
            return $newstring;
        }

        //validation
        $this->validate($request, [
                'nom' => 'required',
                'prenom' => 'required',
                'adresse' => 'required',
                'ville' => 'required',
                'pays' => 'required',
                'email' => 'required|email|unique:emails_users',
                'telephone' => 'required',
                'pin' => 'required',
                'pin_confirmation' => 'required|same:pin',
            ]);
        $nom =$request->nom;
        $prenom =$request->prenom;
        $adresse=$request->adresse;
        $pays=$request->pays;
        $email=$request->email;
        $telephone=$request->telephone;
        $pin=$request->pin;

        // génération du qr code
        //$renderer = new \BaconQrCode\Renderer\Image\Png();
        //$renderer->setHeight(512);
        //$renderer->setWidth(512);
        //$writer = new \BaconQrCode\Writer($renderer);
        //$writer->writeFile('lien fictif', 'qrcode.png');

        //enregistrement dans la DB

        $user = new User();
        $user->nom = $nom;
        $user->prenom = $prenom;
        $user->adresse = $adresse;
        $user->pin = $pin;
        $user->puk = generateCode(4, FALSE, TRUE);
        $user->token = generateCode(16, TRUE);
        //liaison avec le pays
        $payCountry = PayCountry::where('name', $pays)->first();
        $user->pay_country_id = $payCountry->id;
        $user->save();
        $newEmail = new Email(['email' => $email, 'token' => str_random(40), 'user_id' => $user->id]);
        $user->emails()->save($newEmail);
        $newPays = new TelUser(['telephone' => $telephone, 'token' => str_random(40), 'user_id' => $user->id]);
        $user->telUsers()->save($telephone);
        
        
        //envoi de l'email
        
        
        //renvoi vers la vue
        return view('home');
    }

    public function connexion(){
        return view('auth.connexion');
    }

    public function connexion_post(){
        return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
