
<?php
echo "ahoj <br>";
//Europe/Bratislava , America/New_York , Europe/Moscow ,Asia/Tokyo
date_default_timezone_set("Europe/Bratislava");
echo "čas: ". date("H.i.s"). "<br>";
echo " " ."<br>";

    function getLogs($cas_text) 
    {
        $current = file_get_contents($cas_text);
        echo $current;
    }
getLogs("cas.txt");

    function verification($H,$cas_text,$cas) 
    {
        if (8<$H &&  $H<20)  
        {
            file_put_contents($cas_text,$cas. " meskanie". "<br>", FILE_APPEND);
        } 
        else if (20 <=  $H && 23 >=  $H) 
        {
            die("chyba");
        } 
        else 
        {
            file_put_contents($cas_text, $cas. "<br>", FILE_APPEND);
        }
    }
verification(date("H"),"cas.txt",date("H.i.s"));
?>