<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseRequest;
use App\Models\Admin;
use App\Models\User;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SoftDeletes;
 

class HouseController extends Controller implements HouseRequest
{
    public function index()
    {
        $houses = House::all();
        return response()->json($houses, 200);
    }

    public function adminHouse()
    {
       $admin = Admin::with('houses')->find(Auth::id());
       return response()->json($admin->houses, 200);
    }

    public function userHouse()
    {
       $user = User::with('houses')->find(Auth::id());
       return response()->json($user->houses, 200);
    }

    public function show(House $house)
    {
        return response()->json($house, 200);
    }


    public function store(Request $request){
                            $data = [
                                        'address'=> request('address'),
                                        'room'=>request('room'),
                                        'kitchen'=>request('kitchen'),
                                        'garage'=>request('garage'),
                                        'bathroom'=>request('bathroom'),
                                        'type_contract'=>request('type_contract'),
                                        'date'=>request('date'),
                                        'price_buy'=>request('price_buy'),
                                        'price_rent'=>request('price_rent'),
                                        'country'=>request('country'),
                                ];
                                            House::create($data);
                                            HouseRequest::validate($request, $data);
                                            return response()->json($data, 201);
    }

    public function update(Request $request, House $house)
    {
        $house->update($request->all());

        return response()->json($house, 200);
    }
}
    class DeleteController extends Controller
{
        public function forceDelete($delete) 
        {
        $delete->forceDelete();
        }
}
