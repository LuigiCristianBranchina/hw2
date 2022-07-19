<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Routing\Controller as BaseController;   


class DoSearchController extends BaseController{



    public function DoSearch(Request $rq){

        if((Session::get('username')) == null)
        {
            return redirect('/login');

        }

    if ($rq->input('cerca')!= null) {
        
        $keyword = $rq->input('cerca');
        define("MAX", 15);
        $apikey = 'AIzaSyDRa7Y7UJ2ilpdnabNBrI1RL0GTwXlT1yw'; 
        $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' 
                        . $keyword . '&maxResults=' . MAX . '&key=' . $apikey;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $googleApiUrl);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
        echo $response;

    }


    }

    public function addVideo(Request $rq){


        if((Session::get("username")) == null)
        {
            return redirect('/login');

        }

        $utente=Session::get('username');
        $strqry = DB::select("SELECT id FROM utente where username='".$rq->input('username')."'");
        
        if($strqry != null){

            $id= $strqry->id;   
        }   

        if (($rq->input('idVideo')) != null && ($rq->input('titolo')) != null && 
        ($rq->input('descrizione')) != null && ($rq->input('thumbnail')) != null && ($rq->input('nomePlay'))!= null) {    

            $id_video = stripcslashes($rq->input('idVideo'));
            echo $id_video;
            $titolo = stripcslashes($rq->input('titolo'));
            $descrizione = stripcslashes($rq->input('descrizione'));
            $thumbnail = stripcslashes($rq->input('thumbnail'));
            $nomePlay = stripcslashes($rq->input('nomePlay'));

            $query = DB::select("SELECT id FROM playlist WHERE nome='$nomePlay' and creatore ='$id'");
          
            echo $query;

            foreach($query as $row)
                {
                    $id_playlist = $row->id;
                }
                
                echo $id_playlist;


            $query=DB::select("SELECT thumbnail FROM playlist WHERE nome='$nomePlay'");
            

            if($query != null){
                $url=$query->thumbnail;
            }

            $query =  DB::insert("INSERT INTO video (id, titolo, descrizione, thumbnail) values ('$id_video', '$titolo', '$descrizione', '$thumbnail')");   

            
            if($url==" "){
                
                $query2=DB::update("UPDATE playlist set thumbnail = '$thumbnail' WHERE id = '".$rq->id."'");
               
            }
            
            $query3=DB::insert("INSERT into associato (id_playlist, id_video) values('$id_playlist', '$id_video')");  

        }
    }


    public function deleteVideo(Request $rq){

        if((Session::get("username")) == null)
        {
            return redirect('/login');
        }

        $utente=Session::get('username');

        if (($rq->input('id_video')) != null && ($rq->input('nome_playlist'))!= null) {
            
            $keyword = $rq->input('id_video');
            $nome_playlist = $rq->input('nome_playlist');

            $query = DB::select("SELECT id FROM utente where username='".$rq->input('user')."'");
            
            if($query != null){
                $userId=$query->id;
            }

            $query2=DB::select("SELECT id FROM playlist WHERE nome='$nome_playlist' AND creatore='$userId'");

            if($query2!=null){
                $SELECTedPlaylistId=$query2->id;
            }

            $query3= DB::delete("DELETE FROM associato WHERE id_video='$keyword' AND id_playlist='$SELECTedPlaylistId'");

            if($query3 != null){
                
                $query4=DB::select("SELECT COUNT(id_playlist) AS num_play FROM associato WHERE id_playlist='$SELECTedPlaylistId'");//modifica


                if($query4 != null){

                    $num_play=$query4->num_play;


                    if($num_play == 0){
                        $query5=DB::delete("DELETE FROM playlist WHERE id='$SELECTedPlaylistId'");  
                    }
                }
                $query6=DB::select("SELECT COUNT(id_video) as num FROM associato WHERE id_video='$keyword'"); 

                if($query6 != null){
                    $num_video=$query6->num;
                    
                    print_r($num_video);

                    if($num_video == 0){
                        $query=DB::delete("DELETE FROM video WHERE id='$keyword'"); 
                    }
                }
           
            }
            
        }


    }

    public function addPlaylist(Request $rq){

        if((Session::get("username")) == null)
        {
            return redirect('/login');
        }

        
        $utente=Session::get('username');
        $query = DB::select("SELECT id FROM utente where username='".$utente."'");
        
        if($query != null){
            $id=$query[0]->id;
        }

        if ($rq->input('nome') != null) {
            $nomePlay = stripcslashes($rq->input('nome'));

            $query2=DB::insert("INSERT into playlist (creatore, nome) values ('$id', '$nomePlay')");  
           
                echo $nomePlay;        
        }

    }


    public function deletePlaylist(Request $rq){

        if((Session::get("username")) == null)
        {
            return redirect('/login');
        }
    
        $utente=Session::get('username');

        if ($rq->input('nome_playlist') != null) {
            $nome_playlist = $rq->input('nome_playlist');

            $query=DB::select("SELECT id FROM utente WHERE username='$utente'");

            if($query != null){

                $userId=$query->id;

            }

            $query2=DB::select("SELECT id FROM playlist WHERE nome='$nome_playlist' AND creatore='$userId'");

            if($query2 != null){
                $SELECTedPlaylistId=$query2->id;
            }

            $query3=DB::select("SELECT id_video FROM associato WHERE id_playlist='$SELECTedPlaylistId'");

            $videosid = array();

            $num_risultati=0;

            foreach($query3 as $row){

                $videosid[]=$row->id_video3;
                $num_risultati++;

            
            }

            $query4=DB::delete("DELETE FROM associato WHERE id_playlist='$SELECTedPlaylistId'");

            if($query4){
                for($i=0; $i<$num_risultati; $i++){
                    
                    $query5=DB::select("SELECT COUNT(id_video) as num FROM associato WHERE id_video='$videosid[$i]'");
            
                    
                    if($query5 != null){

                        $num_vid = $query5->num;
                        
                        if($num_vid == 0){
                            
                            $query6=DB::delete("DELETE FROM video WHERE id='$videosid[$i]'");
                    
                        }
                    }
                }
                $query7=DB::delete("DELETE FROM playlist WHERE id='$SELECTedPlaylistId'");
                print_r($query5);
            }

        }

    }



}
    