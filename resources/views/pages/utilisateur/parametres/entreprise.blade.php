@extends('template.pages_template')
@section('content')
<div class="accueil">
    <div class="row col-xs-12 accueil_milieu">
        <div class="container">
            <img src="/images/sacoff_black.png" class="img-responsive logo_accueil"><br>
        </div>
    </div>
    <div class="row col-xs-12 accueil_milieu">
        <div class="container">
            <h3 class="titre_entreprise">Entreprise</h3>
        </div>
    </div>

    <div class="row col-xs-12 accueil_milieu">
        <div class="container">
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3">PIN</label>
                    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="PIN">
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox"> Remember me
                    </label>
                </div>
                <a id="lien_btn" href="{{url('#')}}">
                    <button type="submit" class="btn btn-primary btn_accueil center-block">
                        Se connecter
                    </button>
                </a>
                
            </form>
        </div>
    </div>
</div>
@endsection