<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entreprise;
use App\PayCountry;
use App\UsersEntreprise;


class EntreprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.utilisateur.parametres.creer_entreprise');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     public function store(Request $request)
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

         //validation
         $this->validate($request, [
                 'nom' => 'required',
                 'adresse' => 'required',
                 'pays' => 'required',
             ]);
         $nom =$request->nom;
         $adresse=$request->adresse;
         $pays=$request->pays;
         //enregistrement dans la DB
         $entreprise = new Entreprise();
         $entreprise->nom = $nom;
         $entreprise->adresse = $adresse;
         $payCountry = PayCountry::where('name', $request->pays)->first();
         $entreprise->pay_country_id = $payCountry->id;
         $token = generateCode(16, TRUE);
         $entreprise->token = bcrypt($token);
         $entreprise->save();
         
         //renvoi vers la vue
         return route('home');
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
