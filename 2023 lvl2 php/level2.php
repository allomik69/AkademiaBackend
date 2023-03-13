
<form action="" method="GET">
       <p> meno:<input type="text" name="meno" value=""> </p>
        <input type="submit" name="submit" value="Poslat">
    </form>
<?php
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


    
echo "ahoj <br>";
//Europe/Bratislava , America/New_York , Europe/Moscow ,Asia/Tokyo
date_default_timezone_set("Asia/Tokyo");
echo "čas: ". date("H.i.s"). "<br>";
echo " " ."<br>";

    function getLogs() 
    {
        $cas_text = "cas.txt";
        $current = file_get_contents($cas_text);
        echo $current;
    }
getLogs();

    function verification() 
    {
        $H= date("H");
        if (8<$H &&  $H<20)  
        {
            $cas_text = "cas.txt";
            $cas = date("H.i.s");
            file_put_contents($cas_text,$cas. " meskanie" ." ".$_GET["meno"]."<br>", FILE_APPEND);
        } 
        
        else if (20 <=  $H && 23 >=  $H) 
        {
            die("chyba");
        } 
        else 
        {
            $cas_text = "cas.txt";
            $cas = date("H.i.s");
            file_put_contents($cas_text, $cas. " ". $_GET["meno"] ."<br>", FILE_APPEND);
        }
    }

verification();
