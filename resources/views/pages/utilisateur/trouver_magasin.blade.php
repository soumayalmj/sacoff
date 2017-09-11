@extends('template.localisation_template')
@section('content')

<div class="row produit">
    <div class="container">
            <div class="col-xs-4">
                <img id="sac_toile" src="/images/photos_sacs/sac_toile.jpg"><br>
                <form class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount">1</label>
                        <div class="input-group">
                        <div class="input-group-addon">x</div>
                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="1">
                        </div>
                    </div>
                </div>

                <div class="col-xs-8">
                    <h3>Sac en toile</h3>
                    <button type="button" class="btn btn-default btn-produit" data-toggle="modal" data-target="#myModal">
                        <img src="/images/picto/description.png" class="img-responsive description">
                        Description
                    </button><br>

                    
                    <div class=" col-xs-12 modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:white">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Sac en toile</h4>
                                </div>
                                <div class="modal-body">
                                <h4 class="sous_titre_modal">DESCRIPTION:</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum viverra justo et tincidunt feugiat. Duis varius at massa eget mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                </p>
                                <h4 class="sous_titre_modal">DIMENSIONS:</h4>
                                <p>Integer pharetra odio at ligula tempu.</p>
                                <h4 class="sous_titre_modal">MATIÈRE:</h4>
                                <p>nec ullamcorper mauris feugiat. </p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-produit">
                    <img src="/images/picto/ajouter_panier.png" class="img-responsive description">
                        Mettre dans le panier
                </button>
            </form>
        </div>
    </div>
</div>

<div class="espace row btn-acheter">
    <div class="container">
        <div class="col-xs-12">
            <a id="lien_btn" href="{{url('#')}}">
                <div class="cercle">
                    <img class="picto_btn img-responsive" src="/images/picto/sac_perso.png">
                </div>
                <p class="calltoaction">
                Acheter des sacs
                </p>
            </a>
        </div>
    </div>
</div>
<div class="espace row btn-acheter">
    <div class="container">
        <div class="col-xs-12">
            <a id="lien_btn" href="{{url('#')}}">
                <div class="cercle">
                    <img class="picto_btn img-responsive" src="/images/picto/panier_check.png">
                </div>
                <p class="calltoaction">
                Acheter des sacs
                </p>
            </a>
        </div>
    </div>
</div>

@endsection