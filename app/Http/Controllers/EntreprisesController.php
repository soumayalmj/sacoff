<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entreprise;


class EntreprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscription()
    {
        return view('auth.inscription_entreprise');
    }

    public function inscription_post(Request $request)
    {
        //validation
        $this->validate($request, [
                'nom' => 'required',
                'adresse' => 'required',
                'ville' => 'required',
                'pays' => 'required',
            ]);
        $nom =$request->nom;
        $adresse=$request->adresse;
        $ville=$request->ville;
        $pays=$request->pays;
        //enregistrement dans la DB
        $post = new Entreprise();
        $post->nom = $nom;
        $post->adresse = $adresse;
        $post->ville = $ville;
        $post->pays->nom = $pays;
        $post->save();
        //envoie de l'email
        
        
        //renvoi vers la vue
        return route('home');
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