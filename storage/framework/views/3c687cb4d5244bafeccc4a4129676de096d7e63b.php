<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="./images/favicon.jpg" sizes="32x32" />
        <link href="https://fonts.googleapis.com/css?family=Lato|PT+Sans" rel="stylesheet">
        <title>Homework 2 - Login</title>
        <link rel='stylesheet' href='../resources/css/styleLS.css'>
        <script src='../resources/js/login.js' defer></script>
        <meta charset="utf-8">
    </head>
    <body>
        <main>
            <h1 class="hi">Bentornato</h1>
            <p class="text">Esegui l'accesso per usufruire del servizio.</p>
            <form action ="accedi" name='nome_form' method='post'>
                <?php echo e(csrf_field()); ?>

                <div>
                    <label>Nome utente <input type='text' name='username'></label>
                </div>
                <div>
                    <label>Password <input type='password' name='password'></label>
                </div>
                <div>
                    <input id="invio" type='submit' value="Login">
                </div>
                <div>
                    <button id="registrazione"><a href='signup'>Registrati</a></button>
                </div>
            </form>
        </main>
    </body>
</html><?php /**PATH C:\xampp\htdocs\hw2fin\resources\views/login.blade.php ENDPATH**/ ?>