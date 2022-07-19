<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Routing\Controller as BaseController; 


class LoginController extends BaseController{


    public function log(Request $rq){

        
        if($rq->input('username')!= null && $rq->input('password')!= null)
        {
           
            $strqry = DB::select("SELECT username, pswd FROM utente where username='".$rq->input('username')."' and pswd ='".$rq->input('password')."'");
           
            if($strqry != null)
            {
                echo("Il login è andato a buon fine!");              
                Session::put("username", $rq->input('username'));
                return redirect("/index");
            }

            else{
                echo("Il login non è andato a buon fine!");
                echo("Riprova!");
               return redirect('/login');
            }
                
        }
        
            

    }
   

    public function verifyUser(Request $rq){

        if($rq->input('usern'))
        {
            $chiave = stripcslashes($rq->input('usern'));		
            $risultato= DB:: select("SELECT * FROM utente WHERE username = '".$chiave."'");
            $risp = array();
            foreach($r as $riga){
                $risp[]=$riga;
            }
            echo json_encode($risp);	
        }

    }

}




















