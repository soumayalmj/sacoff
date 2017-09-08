@extends('template.pages_temp')
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
                <button type="button" class="btn btn-default btn-produit">Description</button><br>
                <button type="submit" class="btn btn-primary btn-produit">Mettre dans le panier</button>
            </form>
        </div>
    </div>
</div>

@endsection