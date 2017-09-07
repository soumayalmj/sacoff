<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Email;
use App\Pays;
use App\TelUsers;

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

    public function generate_qr_code(){
        $renderer = new \BaconQrCode\Renderer\Image\Png();
        $renderer->setHeight(512);
        $renderer->setWidth(512);
        $writer = new \BaconQrCode\Writer($renderer);
        $writer->writeFile('lien fictif', 'qrcode.png');
        //dd($writer);
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

        // génération du qr code
        //$renderer = new \BaconQrCode\Renderer\Image\Png();
        //$renderer->setHeight(512);
        //$renderer->setWidth(512);
        //$writer = new \BaconQrCode\Writer($renderer);
        //$writer->writeFile('lien fictif', 'qrcode.png');

        //enregistrement dans la DB
        $post = new User();
        $post->nom = $nom;
        $post->prenom = $prenom;
        $post->adresse = $adresse;
        $post->puk = str_random(4);
        $post->token = str_random(40);
        $post->pays()->save($pays);
        $post->pays_id = $post->pays()->id;
        $post->save();
        $newEmail = new Email(['email' => $email, 'token' => str_random(40), 'user_id' => $post->id]);
        $post->emails()->save($newEmail);
        $newPays = new Pays(['pays' => $pays, 'token' => str_random(40)]);
        $post->pays()->save($newPays);
        $newPays = new TelUsers(['telephone' => $telephone, 'token' => str_random(40), 'user_id' => $post->id]);
        $post->telUsers()->save($telephone);
        
        
        
        //envoie de l'email
        
        
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
