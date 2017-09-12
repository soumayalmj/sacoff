@extends('template.base')
@section('content')
<div class="accueil">
    <div class="row col-xs-12 accueil_milieu">
        <div class="container">
            <img src="/images/sacoff_black.png" class="img-responsive logo_accueil">
        </div>
    </div>
    <div class="row col-xs-12 accueil_milieu">
        <a id="lien_btn" href="{{url('home')}}">
            <button type="submit" class="btn btn-primary btn_accueil center-block">
                Se connecter
            </button>
        </a>
    </div>
    <div class="row col-xs-12 accueil_milieu">
        <a id="lien_btn" href="{{url('#')}}">
            <button type="submit" class="btn btn-primary btn_accueil center-block">
                S'inscrire
            </button>
        </a>
    </div>
</div>
@endsection