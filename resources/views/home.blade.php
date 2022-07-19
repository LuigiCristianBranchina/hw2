<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="./images/favicon.jpg" sizes="32x32" />
        <title>Homework 2 - Home</title>
        <link href="https://fonts.googleapis.com/css?family=Lato|PT+Sans" rel="stylesheet">
        <link rel='stylesheet' href='../resources/css/style.css'>
        <script src='../resources/js/home.js' defer></script>
        <meta charset="utf-8">
    </head>
    <body>
        <header id="titolo">
            <div id="testotitolo">Homework 2 - Home</div>
            <div id="benvenuto">
                    <div>Benvenuto {{$s}}!</div>
            </div>
        </header>
        <article id="container1">
            <section id="menu">
                <a href="index">Home</a>
                <a href="search">Ricerca</a>
                <a href="logout">Logout</a>
            </section>
            <section id="contenuto">
                <div id="div_ricerca">
                    <h1>Crea la tua playlist</h1>
                    <div id="form_ricerca">
                        <form  action="home" name="ricerca" id="ricerca" method="post">
                            <input type="hidden" name="_token" value="csrf_token()">
                                <div>
                                
                                <label class="label">Titolo playlist :<input type="text" id="titolo_playlist" name="titolo_play" placeholder="     Inserisci il titolo della playlist da creare"></label>
                            </div>
                            <div>
                                <label class="label"><input type="submit" name="sumbit" id="tasto_submit_home" value="Crea Playlist"></label>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="container-play">
                    
                    <div>
                    
                        
                            @foreach($playlist as $p)
                                @if($p->thumbnail == " ")
                                    <div class="playlist" data-titolo="{{$p->nome}}">
                                    <img src="../resources/images/playlist.jpg" class="img_play">
                                    <h1 id="{{$p->nome}}">Titolo: {{$p->nome}}</h1>
                                    <button class="button_elimina">Elimina playlist</button>
                                    </div>
                                
                                @else
                                <div class="playlist" data-titolo="{{$p->nome}}">
                                <img src="{{$p->thumbnail}}" class="img_play">
                                    <h1 id="{{$p->nome}}">Titolo: {{$p->nome}}</h1>
                                    <button class="button_elimina">Elimina playlist</button>
                                    </div>
                                @endif
                            @endforeach

                    

                    </div>
                </div>

            </section>
        </article>
    </body>
</html>