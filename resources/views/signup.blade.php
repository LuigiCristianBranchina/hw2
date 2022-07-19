<html>
    <head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Homework 2 - Registrazione</title>
        <link rel="icon" type="image/jpg" href="./images/favicon.jpg" sizes="32x32" />
        <link href="https://fonts.googleapis.com/css?family=Lato|PT+Sans" rel="stylesheet">
        <meta charset="utf-8">
        <link rel='stylesheet' href='../resources/css/styleLS.css'>
        <script src='../resources/js/signup.js' defer></script>
    </head>
    <body>
        <main>
            <h1 id="hi" class="hi">Registrati al sito</h1>
            <p id="errorecomp" class="hidden text">
				Compila tutti i campi.
		    </p>
             <form action ="ins" id="signup_form" name='signup_form' method='post'>

                {{csrf_field()}}
                <div id="nomeutente">
                    <label>Nome utente <input type='text' name='username' onblur="funcUsername()"></label>
                </div>
                <div id="nome_occ" class = "hidden">
                    Il nome utente scelto non è disponibile. Inserire nuovamente un nome utente.
                </div>
                <div id="pswd">
                    <label>Password <input type='password' name='password' onblur="funcPassword()"></label>
                </div>
				<div id="confpswd">
                    <label>Conferma password <input type='password' name='confpassword' onblur="funcPassword()"></label>
                </div>
                <div id="pass_differenti" class = "hidden">
                    Le due password devono coincidere.
                </div>
				<div id="email">
                    <label>Email <input type='text' name='email' onblur="funcEmail()"></label>
                </div>
                <div id="err_email" class = "hidden">
                    Inserire una email corretta.
                </div>
				<div id="nome">
                    <label>Nome <input type='text' name='nome'></label>
                </div>
				<div id="cognome">
                    <label>Cognome <input type='text' name='cognome'></label>
                </div>
				<div id="nascita">
                    <label>Data di nascita (AAAA-MM-GG) <input type='text' name='data_nascita'></label>
                </div>
                <div>
                    <input type='submit' value="Signup"></label>
                </div>
                <div>
                    <button id="login"><a href='./login'>Login</a></button>
                </div>
            </form>
        </main>
    </body>
</html>