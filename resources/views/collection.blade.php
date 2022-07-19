<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="./images/favicon.jpg" sizes="32x32" />
        <title>Homework 2</title>
        <link href="https://fonts.googleapis.com/css?family=Lato|PT+Sans" rel="stylesheet">
        <link rel='stylesheet' href='../resources/css/style.css'>
        <script src='../resources/js/collection.js' defer></script>
        <meta charset="utf-8">
    </head>
    <body>
        <header id="titolo">
            <div id="testotitolo">Homework 2 - Collezione</div>
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
                <div id="div_playlist">
                    <h1>Questa è la raccolta:</h1>
                    <h1 class="selPlay"> $SELECTedPlaylist</h1>
                </div>

                <div id="container-play">
                    
                    @foreach($contenuti as $c)
                        @if($c->thumbnail == " ")
                        
                                <div class="contenuto" data-titolo="{{$c->id_video}}">.
                                <img src="'./images/playlist.jpg'"  class="img_contenuto">.
                                <h1 id="{{$c->id_video}}">Titolo: {{$c->titolo}}</h1>.
                                <p id=descr_cont {{$c->id_video}} class= "hidden"> $c->descrizione</p>.
                                <button class="button_elimina">Elimina dalla playlist</button>.
                                </div>;
                        
                            else
                                <div class="contenuto" data-titolo="{{$c->id_video}}">.
                                <img src="'./images/playlist.jpg'"  class="img_contenuto">.
                                <h1 id="{{$c->id_video}}">Titolo: {{$c->titolo}}</h1>.
                                <p id=descr_cont {{$c->id_video}} class= "hidden"> $c->descrizione</p>.
                                <button class="button_elimina">Elimina dalla playlist</button>.
                                </div>;
                        @endif
                    @endforeach
                    
                </div>

                <div id="modal-view" class="hidden">
                </div>

            </section>
        </article>
    </body>
</html>