<?php
 
namespace App\Arrival\Http\Controllers;

use LibUser\Userapi\Models\User;
use App\Arrival\Models\Arrival;
use Backend\Classes\Controller;
use App\Arrival\Http\Resources\ArrivalResource;
class ArrivalController extends Controller
{
    public function index()
    {
        return ArrivalResource::collection(Arrival::all());
    }
    public function store()
    {
        $arrival = new Arrival();
        $arrival->name = post("name");
        $arrival->user_id = post("user_id");
        $arrival->arrival = now();
        $arrival->save();
        return new ArrivalResource($arrival);
    }
    public function loggedUser()
    {
        if (auth()->check())
        {

        } 
        else 
        {
            return "error";
        }
    }
}