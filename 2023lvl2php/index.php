
<form action="" id="" method="GET" >
       <p> meno:<input type="text" name="meno" value=""> </p>
        <input type="submit" name="submit" value="Poslat">
    </form>
<?php
include 'function.php';
echo "ahoj <br>";
//Europe/Bratislava , America/New_York , Europe/Moscow ,Asia/Tokyo
date_default_timezone_set("Europe/Bratislava");
echo "čas: ". date("H.i.s"). "<br>";
echo " " ."<br>";
getLogs("cas.txt");
printStudents();
$obj = new Arrivals();
$obj->arrivalsJsonSavingData();
function getLogs($cas_text) 
{
    $current = file_get_contents($cas_text);
    echo $current;
}
function printStudents() 
{
    $students = file_get_contents("studenti.json");
    $decodedStudents =json_decode($students);
    echo"<pre>";
    print_r($decodedStudents);
    echo"<pre>";
}
class Arrivals 
{
    private function verificationIfStudentIsLateJson()
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
    public function arrivalsJsonSavingData () 
    {
        $cas =date("H.i.s");
        $prichodyJson = file_get_contents("prichody.json");
        $decodedPrichodyJson = json_decode($prichodyJson);
        $decodedPrichodyJson[] = $cas;
        $encodedPrichodyJson = json_encode($decodedPrichodyJson,JSON_PRETTY_PRINT);
        file_put_contents("prichody.json", $encodedPrichodyJson);
        $this->verificationIfStudentIsLateJson();
    } 
}
