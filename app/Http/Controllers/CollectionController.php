<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Routing\Controller as BaseController; 


class CollectionController extends BaseController{


    public function collection(Request $rq){
         if((Session::get("username")) == null)
        {
            return redirect('/login');

        }

        $utente=session::get('username');
          
            $SELECTedPlaylist=$rq->input('username');
        
        $query= DB::select("SELECT id FROM utente WHERE username='$utente'");

        if($query != null){
            $SELECTedId=$query[0]->id;
        }

        $query2=DB::select("SELECT id FROM playlist WHERE creatore='$SELECTedId' AND nome='$SELECTedPlaylist'");

    
                $SELECTedPlaylistId=$query2;
            

            $query3=DB::select("SELECT * FROM associato A JOIN video V ON A.id_video=V.id WHERE id_playlist='".$SELECTedPlaylistId."'");
            if($query3 != null){
                $contenuti=array();

                foreach($query3 as $row){
                    $contenuti[]=$row;
                }
            }
    }
}