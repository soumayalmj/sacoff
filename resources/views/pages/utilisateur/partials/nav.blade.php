<nav class="navbar navbar-default navi">
    
        <img class="logo img-responsive" src="{{url('/images/sacoff.png')}}">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img class="pull-right rouage" src="{{url('/images/picto/rouage_orange.png')}}"></a>
            <img id="profil" class="img-responsive" src="{{url('/images/pp.jpg')}}">

            <a href="#"><img class="responsive param-icones" src="{{url('/images/picto/edit_user.png')}}">MODIFIER LE PROFIL</a>

            <a href="{{url('/user/profil/'.\Auth::user()->id)}}"><img class="responsive param-icones" src="{{url('/images/edit_user.png')}}">MON PROFIL</a>

            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/picto/password.png')}}">GÉNÉRER CODE PIN/PUK</a>
            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/picto/warning.png')}}">ALERTER</a>
            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/picto/plainte.png')}}">PLAINTE</a>
            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/picto/creer_entreprise.png')}}">CRÉER UNE ENTREPRISE</a>
            <hr>
            <a href="#"><img class="responsive param-icones" src="{{url('/images/picto/entreprise.png')}}">ENTREPRISE</a>
            <hr>

            <a href="#"><img class="responsive param-icones" src="{{url('/images/picto/deconnexion.png')}}">DECONNEXION</a>

            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img class="responsive param-icones" src="{{url('/images/deconnexion.png')}}">
                                            DECONNEXION
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

        </div>

        <span style="font-size:30px;cursor:pointer;float:right;padding:8px 33px 15px 0px" onclick="openNav()"><img class="rouage pull-right" src="{{url('/images/picto/rouage.png')}}"></span>
    
</nav>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";


}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";

}
</script>