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
                    
                        
                            <?php $__currentLoopData = $playlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($p->thumbnail == " "): ?>
                                    <div class="playlist" data-titolo="<?php echo e($p->nome); ?>">
                                    <img src="../resources/images/playlist.jpg" class="img_play">
                                    <h1 id="<?php echo e($p->nome); ?>">Titolo: <?php echo e($p->nome); ?></h1>
                                    <button class="button_elimina">Elimina playlist</button>
                                    </div>
                                
                                <?php else: ?>
                                <div class="playlist" data-titolo="<?php echo e($p->nome); ?>">
                                <img src="<?php echo e($p->thumbnail); ?>" class="img_play">
                                    <h1 id="<?php echo e($p->nome); ?>">Titolo: <?php echo e($p->nome); ?></h1>
                                    <button class="button_elimina">Elimina playlist</button>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    

                    </div>
                </div>

            </section>
        </article>
    </body>
</html><?php /**PATH C:\xampp\htdocs\hw2fin\resources\views/home.blade.php ENDPATH**/ ?>