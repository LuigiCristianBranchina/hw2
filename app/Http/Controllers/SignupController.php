<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Routing\Controller as BaseController;


class SignupController extends BaseController{

  public function inserisci(Request $rq){

    if($rq->input('username')!= null && $rq->input('password')!= null
    && $rq->input('nome')!= null && $rq->input('cognome')!= null
    && $rq->input('data_nascita')!= null && $rq->input('email')!= null)
    {
              //verifico email esistente
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
        
        if (preg_match($pattern, trim($rq->input('email'))))
        {
          //verifico se email esiste
          $strqry = DB::select("SELECT email FROM utente where email='".$rq->input('email')."'");
          
          if($strqry!=null && $strqry == $rq->input('email'))
          {
            echo "Email esistente";
            return redirect('/signup');
          }else{

            //verifico password
            if(strlen($rq->input('password'))>=4 && strlen($rq->input('password'))<16)
            {
              echo"Password valida!";
            }
            else{
              echo "<h1>Password non valida</h1>";
               return redirect('/signup');
            }
          }
        }
        else{
            echo "formato email non valido";
              return redirect('/signup');
          }

    }else{
      echo "riempi tutti i campi";
        return redirect('/signup');
    }

    $username=str($rq->input('username'));
    $password=str($rq->input('password'));        
    $nome=str($rq->input('nome'));
    $cognome=str($rq->input('cognome'));
    $data_nascita=str($rq->input('data_nascita'));
    $email=str($rq->input('email'));



    $strqry3=DB::insert("INSERT INTO utente (id, username, pswd, nome, cognome, data_nascita, email) 
    VALUES (NULL, '".$username."' ,'".$password."' , '".$nome."','".$cognome."','".$data_nascita."','".$email."')");

    return redirect('login');
      

    function str($s)
    {
      $cerca = array("'",'"');
      $sostituisci = array("\'",'\"');
      return str_replace($cerca, $sostituisci, $s);
    }
  
  }

        
}

