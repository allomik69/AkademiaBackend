<?php
 
namespace App\Arrival\Http\Controllers;

use LibUser\Userapi\Models\User;
use App\Arrival\Models\Arrival;
use Backend\Classes\Controller;
use App\Arrival\Http\Resources\ArrivalResource;
use RainLab\User\Facades\Auth;

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
        dd(auth()->user());
        if (auth()->user())
        {
        $arrival = new Arrival;
        $arrival->name = auth()->user()->name;
        $arrival->user_id = auth()->user()->id;
        $arrival->arrival = now();
        $arrival->save();
        return new ArrivalResource($arrival);
        }      
    } 
    }
