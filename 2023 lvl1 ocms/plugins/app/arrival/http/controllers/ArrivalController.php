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
        $arrival->user_id = auth()->user()->id;
        $arrival->name = auth()->user()->name;
        $arrival->arrival = now();
        $arrival->save();
        return new ArrivalResource($arrival);
    }
    public function getUsersArrivals()
    {
        $arrivalId = auth()->user()->id;
        $arrivalName = auth()->user()->name;
        $usersArrivals = Arrival::where('user_id', auth()->user()->id)->get();
        $logMessage = "User {$arrivalName} with ID: {$arrivalId} requested his arrivals.";
        \Log::info($logMessage);
        return ArrivalResource::collection($usersArrivals);
    } 
    }
