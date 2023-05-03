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
        $arrival->user = auth()->user();
        $arrival->save();
        return new ArrivalResource($arrival);
    }
    }
