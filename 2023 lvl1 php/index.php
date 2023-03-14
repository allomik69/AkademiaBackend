
<?php
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
            file_put_contents($cas_text,$cas. " meskanie". "<br>", FILE_APPEND);
        } 
        else if (20 <=  $H && 23 >=  $H) 
        {
            die("chyba");
        } 
        else 
        {
            $cas_text = "cas.txt";
            $cas = date("H.i.s");
            file_put_contents($cas_text, $cas. "<br>", FILE_APPEND);
        }
    }
verification();
?>
