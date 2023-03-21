
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

function printStudents() {
    $students = file_get_contents("studenti.json");
    $decodedStudents =json_decode($students);
    echo"<pre>";
    print_r($decodedStudents);
    echo"<pre>";
}
printStudents();

echo"<br><br>";

function displayArrivals() {
    $arrivals = file_get_contents("prichody.json");
    $decodedArrivals =json_decode($arrivals);
    echo"<pre>";
    foreach ($decodedArrivals as $decodedArrival) {
        $hoursDecodedArrival = strtok($decodedArrival,".");
        if ($hoursDecodedArrival>8) {
            $decodedArrival =$decodedArrival. " meskanie";
        }
        echo $decodedArrival."<br>";
        
    }

    echo"<pre>";
}
displayArrivals();