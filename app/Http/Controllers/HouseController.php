<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SoftDeletes;
 



class HouseController extends Controller
{
    public function adminHouse()
    {
       //$authId = House::all();

       $admin = Admin::with('houses')->find(Auth::id());
       //$authId = Auth::id();
       return response()->json($admin->houses, 200);
    }

    public function userHouse()
    {
       $user = User::with('houses')->find(Auth::id());
       //$authId = Auth::id();
       return response()->json($user->houses, 200);
    }
    public function index()
    {
        $houses = House::all();
        return response()->json($houses, 200);
    }

    public function show(House $house)
    {
        return response()->json($house, 200);
    }

    public function store(Request $request)
    {
        //$house = House::create($request->all());
        $request->only('address','typeContract');
        return response()->json($request, 201);
    }

    public function update(Request $request, House $house)
    {
        $house->update($request->all());

        return response()->json($house, 200);
    }

    public function destroy(House $house)
    {
        
        $house->delete();

        return response()->json(null, 204);
    }

}
