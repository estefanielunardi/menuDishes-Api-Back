<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;


class DishController extends Controller
{
    
    public function index()
    {
        $dishes = Dish::all();

        return response()->json($dishes, 200);
    }

    
    public function store(Request $request)
    {
        // $validation = $request->validate([
        //     'plate' => 'required',
        // ]);

        // if($validation)
        // {   return response()->json(
        //     ['error' =>$validation],
        //     );
        // };

        $dish = Dish::create([
            'plate'=>$request->plate,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$request->image,
        ]);


        $dish->save();

        return response()->json($dish, 201);  
    }

    
    public function show($id)
    {
        $dish = Dish::find($id);

        return response()->json($dish, 200);
    }

    
    public function update(Request $request, $id)
    {
        
        $dishToUpdate = Dish::find($id);

        // $validation = $request->validate([
        //     'plate' => 'required',
        // ]);

            // if($validation)
        // {   return response()->json(
        //     ['error' =>$validation], 401
        //     );
        // }

        $dishToUpdate->update($request->all());

        return response()->json($dishToUpdate, 200);
    }

    
    public function destroy($id)
    {
        $dishToDelete = Dish::find($id);
        $dishToDelete->delete();

        return response()->json($dishToDelete, 204);
    }

}
