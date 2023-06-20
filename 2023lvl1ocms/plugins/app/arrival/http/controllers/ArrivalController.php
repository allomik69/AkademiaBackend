<?php
 
namespace App\Arrival\Http\Controllers;

use App\Arrival\Models\Arrival;
use Backend\Classes\Controller;
use App\Arrival\Http\Resources\ArrivalResource;
use Event;

class ArrivalController extends Controller
{
    public function index()
    {
        return ArrivalResource::collection(Arrival::all());
    }
    public function store()
    {  
        $arrival = new Arrival();
        $arrival->user_id = auth()->user()->id;
        $arrival->name = auth()->user()->name;
        $arrival->arrival = now();
        $arrival->save();
        return new ArrivalResource($arrival);
    }
    public function getUsersArrivals()
    {
        $usersArrivals = Arrival::where('user_id', auth()->user()->id)->get();
        Event::fire('App.Arrival.userArrivalsRequested',[$usersArrivals]);
        return ArrivalResource::collection($usersArrivals);
    } 
    }
