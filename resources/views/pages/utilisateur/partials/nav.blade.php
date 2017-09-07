<nav class="navbar navbar-default navi">
    
        <img class="logo img-responsive" src="{{url('/images/sacoff.png')}}">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img class="pull-right rouage" src="{{url('/images/rouage_orange.png')}}"></a>
            <img id="profil" class="img-responsive" src="{{url('/images/pp.jpg')}}">
            <a href="#"><img class="responsive param-icones" src="{{url('/images/edit_user.png')}}">MODIFIER LE PROFIL</a>
            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/password.png')}}">GÉNÉRER CODE PIN/PUK</a>
            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/warning.png')}}">ALERTER</a>
            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/plainte.png')}}">PLAINTE</a>
            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/creer_entreprise.png')}}">CRÉER UNE ENTREPRISE</a>
            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/entreprise.png')}}">ENTREPRISE</a>
            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/deconnexion.png')}}">DECONNEXION</a>
        </div>

        <span style="font-size:30px;cursor:pointer;float:right;padding:8px 33px 15px 0px" onclick="openNav()"><img class="rouage pull-right" src="{{url('/images/rouage.png')}}"></span>
    
</nav>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";


}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";

}
</script>