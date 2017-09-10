<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Email;
use App\PayCountry;
use App\TelUser;

use Endroid\QrCode\QrCode;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function generateQrCode($id){
        $qrCode = new QrCode("{{ url('qrcode/'.$id) }}");

        header('Content-Type: '.$qrCode->getContentType());
        echo $qrCode->writeString();
    }
    
    public function generatePinPuk(){
        $html2pdf = new Html2Pdf();
        $html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
        $html2pdf->output();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('pages.utilisateur.parametres.profil', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.utilisateur.parametres.modif_profil', ['user' => $user]);
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

        $this->validate($request, [
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'adresse' => 'required',
                'pays' => 'required|string|max:255',
                'email' => 'required|email||string|max:255unique:emails_users',
                'telephone' => 'required',
        ]);

        $user=User::find($id);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->username = $request->username;
        $user->adresse = $request->adresse;
        $payCountry = PayCountry::where('name', $request->pays)->first();
        $user->pay_country_id = $payCountry->id;
        $user->save();
        
        //$oldEmail = Email::where('email', $request->oldEmail)->first();
        $newEmail = new Email(['email' => $request->email, 'token' => generateCode(16, TRUE), 'user_id' => $user->id]);
        $user->emails()->save($newEmail);
        $tel = new TelUser(['mobile' => $request->telephone, 'token' => generateCode(16, TRUE), 'user_id' => $user->id]);
        $user->telUsers()->save($tel);

        return redirect()->route('home');
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
