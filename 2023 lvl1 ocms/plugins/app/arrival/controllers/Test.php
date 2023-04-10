<?php namespace App\Arrival\Controllers;

use Backend\Classes\Controller;
use app\Arrival\Models\Arrival;
class Test extends Controller
{
    public function add(Arrival $request)
{
        $name = new Arrival();
        $name->name = $_POST["meno"];
        $name->save();
        return response()->json($name);
}
}