
<form action="function.php" method="GET" >
       <p> meno:<input type="text" name="meno" value=""> </p>
        <input type="submit" name="submit" value="Poslat">
    </form>
<?php
 
echo "ahoj <br>";
//Europe/Bratislava , America/New_York , Europe/Moscow ,Asia/Tokyo
date_default_timezone_set("Asia/Tokyo");
echo "čas: ". date("H.i.s"). "<br>";
echo " " ."<br>";

    function getLogs($cas_text) 
    {
        $current = file_get_contents($cas_text);
        echo $current;
    }
getLogs("cas.txt");

   