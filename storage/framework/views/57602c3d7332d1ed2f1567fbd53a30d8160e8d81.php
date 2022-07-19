<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="./images/favicon.jpg" sizes="32x32" />
        <title>Homework 2</title>
        <link href="https://fonts.googleapis.com/css?family=Lato|PT+Sans" rel="stylesheet">
        <link rel='stylesheet' href='../resources/css/style.css'>
        <script src='../resources/js/search.js' defer="true"></script>
        <meta charset="utf-8">
    </head>
    <body>
        <header id="titolo">
            <div id="testotitolo">Homework 2 - Search</div>
            <div id="benvenuto">
                    <div>Benvenuto <?php echo e($s); ?>!</div>
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
                    <h1>Ricerca i video da aggiungere alla tua Playlist tramite la API di YouTube.</h1>
                    <div id="form_ricerca">
                        <form name="ricerca" id="ricerca" method="post" action="search">
                        
                            <?php echo e(csrf_field()); ?>


                            <div class="div-label">
                                <label class="label">Titolo video : &nbsp;<input type="text" id="titolo_video" name="titolo_vid" placeholder="    Inserisci il titolo del video da cercare"></label>
                            </div>
                            <div class="div-label">
                                <label class="label">Nome della playlist nella quale inserire il video : &nbsp;
                                    <SELECT name="nome_play" id="nome_playlist">
                                        <div>
                                            
                                            <?php $__currentLoopData = $nomi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($n->nome); ?>"><?php echo e($n->nome); ?></option>";
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </SELECT>
                                </label>
                            </div>
                            <div class="button-invia div-label">
                                <label><input type="submit" name="sumbit" id="tasto_submit" value="Ricerca Video"></label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="head-risultati">Massimo 15 risultati.</div>
                <div id="container-risultati">
                    
                </div>             
            </section>
        </article>
    </body>
</html><?php /**PATH C:\xampp\htdocs\hw2fin\resources\views/search.blade.php ENDPATH**/ ?>