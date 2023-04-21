<?php
 
namespace App\Arrival\Http\Controllers;
 
use App\Arrival\Models\Arrival;
use Backend\Classes\Controller;
class ArrController extends Controller
{
    public function getArrivals()
    {
        return Arrival::all();
    }
    public function addArrivals()
    {
        $arrival = new Arrival();
        $arrival->name = post("name");
        $arrival->user_id = post("user_id");
        $arrival->arrival = now();
        $arrival->save();
        return response()->json($arrival);
    }
}