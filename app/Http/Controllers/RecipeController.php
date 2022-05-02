<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userRecipes = Recipe::get()->toJson();
        //
        return \response()->json($userRecipes);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser($id)
    {
        $userRecipes = Recipe::where('userID', $id)->get()->toArray();
        //
         return \response()->json($userRecipes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $userID = $request->input('userID');
        $data = $request->input('body');

        $nutritional = [
            'servings' => $data['data'][0]['servings'],
            'servingSize' => $data['data'][0]['serving_size'],
            'calories' => $data['data'][0]['calories'],
        ];
         unset($data['data'][0]['servings']);
         unset($data['data'][0]['serving_size']);
         unset($data['data'][0]['calories']);

        $input = $data['data'][0];
        //

        $recipe = Recipe::create([
            'userID' => $data['userID'],
            "title" => $input["title"],
            "description" => $input["description"],
            "instructions" => $input["instructions"],
            "prep_time" => $input["prep_time"],
            "total_time" => $input["total_time"],
            'ingredients' => json_encode($data['ingredients']),
            'nutritional' => json_encode($nutritional),
        ]);
        if($recipe)
        {
            return \response()->json([
                'status' => 'success',
                'message' => 'Recipe "' . $input['title'] .'" has been successfully saved',
            ]);
        }
         return \response()->json([
            'status' => 'fail',
            'message' => 'There was an error saving the recipe',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
