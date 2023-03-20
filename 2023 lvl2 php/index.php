
<form action="function.php" method="GET" >
       <p> meno:<input type="text" name="meno" value=""> </p>
        <input type="submit" name="submit" value="Poslat">
    </form>
<?php
 
echo "ahoj <br>";
//Europe/Bratislava , America/New_York , Europe/Moscow ,Asia/Tokyo
date_default_timezone_set("America/New_York");
echo "čas: ". date("H.i.s"). "<br>";
echo " " ."<br>";

function pre_rStudenti() {
    $Students = file_get_contents("studenti.json");
    $DecodedStudents =json_decode($Students);
    echo"<pre>";
    print_r($DecodedStudents);
    echo"<pre>";
}
pre_rStudenti();

echo"<br><br>";

function pre_rPrichody() {
    $Prichody = file_get_contents("prichody.json");
    $decodedPrichody =json_decode($Prichody);
    echo"<pre>";
    foreach ($decodedPrichody as $d) {
        $H = strtok($d,".");
        if ($H>8) {
            $d =$d. " meskanie";
        }
        echo $d."<br>";
        
    }

    echo"<pre>";
}
pre_rPrichody();