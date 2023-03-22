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
function printStudents() {
    $students = file_get_contents("studenti.json");
    $decodedStudents =json_decode($students);
    echo"<pre>";
    print_r($decodedStudents);
    echo"<pre>";
}
printStudents();
class Arrivals {
    private function Verification()
    {
        $arrivals = file_get_contents("prichody.json");
        $decodedArrivals =json_decode($arrivals);
        foreach ($decodedArrivals as $decodedArrival) 
        {
            $hoursDecodedArrival = strtok($decodedArrival,".");
            if ($hoursDecodedArrival>8) 
            {
                $decodedArrival =$decodedArrival. " meskanie";
            }
            echo $decodedArrival."<br>";
        }
    }
    public function arrivalsJson () 
    {
        $cas =date("H.i.s");
        $prichodyJson = file_get_contents("prichody.json");
        $decodedPrichodyJson = json_decode($prichodyJson);
        $decodedPrichodyJson[] = $cas;
        $encodedPrichodyJson = json_encode($decodedPrichodyJson,JSON_PRETTY_PRINT);
        file_put_contents("prichody.json", $encodedPrichodyJson);
        echo"<pre>";
        $this->Verification();
        echo"<pre>";
    } 
}
$obj = new Arrivals();
$obj->arrivalsJson();