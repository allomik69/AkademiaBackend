<?php
date_default_timezone_set("Europe/Bratislava");
//Europe/Bratislava , America/New_York , Europe/Moscow ,Asia/Tokyo
Students::saveStudentsName();
verifcationIfStudentIsLate(date("H"),"cas.txt",date("H.i.s"));
class Students 
{
    public static function saveStudentsName() 
    {
        if (file_exists("studenti.json"))
        {
            $encodedStudents= file_get_contents("studenti.json");
            $students=  !empty($encodedStudents) ? json_decode( $encodedStudents, true) : array();
            $name = $_GET["meno"]; 
            if (array_key_exists($name, $students)) 
            {
                $students[$name]++;
            } 
            else 
            {
                $students[$name] = 1;
            }   
            $json = json_encode($students, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);
            file_put_contents('studenti.json', $json);
        } 
    }
}
function verifcationIfStudentIsLate($H,$cas_text,$cas) 
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
} 