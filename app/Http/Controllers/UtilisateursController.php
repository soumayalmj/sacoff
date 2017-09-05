<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;

class UtilisateursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscription(Request $request)
    {
        //validation
        $this->validate($request, [
                'nom' => 'required',
                'prenom' => 'required',
                'adresse' => 'required',
                'ville' => 'required',
                'email' => 'required|email',
                'telephone' => 'required',
            ]);
        $nom =$request->nom;
        $prenom =$request->prenom;
        $adresse=$request->adresse;
        $ville=$request->ville;
        $email=$request->email;
        $telephone=$request->telephone;
        //enregistrement dans la DB
        $post = new Utilisateur();
        $post->nom = $nom;
        $post->prenom = $prenom;
        $post->adresse = $adresse;
        $post->ville = $ville;
        $post->email = $email;
        $post->telephone = $telephone;
        $post->save();
        //envoie de l'email
        
        
        //renvoi vers la vue
        return view('home');
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
