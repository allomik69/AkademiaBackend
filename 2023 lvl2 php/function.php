<?php
date_default_timezone_set("Asia/Tokyo");
if (file_exists("studenti.json"))
      {
        $zakodovaniStudenti= file_get_contents("studenti.json");
        $studenti=  !empty($zakodovaniStudenti) ? json_decode( $zakodovaniStudenti, true) : array();
        $meno = $_GET["meno"]; 
        if (array_key_exists($meno, $studenti)) 
        {
        $studenti[$meno]++;
        } 
        else 
        {
        $studenti[$meno] = 1;
        }   
    $json = json_encode($studenti, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);
    file_put_contents('studenti.json', $json);
    } 
function verification($H,$cas_text,$cas) 
    {   
        if (8<$H &&  $H<20)  
        {

            file_put_contents($cas_text,$cas. " meskanie" ." ".$_GET["meno"]."<br>", FILE_APPEND);
        } 
        
        else if (20 <=  $H && 23 >=  $H) 
        {
            die("chyba");
        } 
        else 
        {

            file_put_contents($cas_text, $cas. " ". $_GET["meno"] ."<br>", FILE_APPEND);
        }
        header("Location: index.php");
        die();
    }
    
verification(date("H"),"cas.txt",date("H.i.s"));
