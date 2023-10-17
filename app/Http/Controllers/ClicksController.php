<?php

namespace App\Http\Controllers;

use App\Models\Click;
use Illuminate\Http\Request;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Auth;

class ClicksController extends Controller
{
    /**
     * update the clicks_count after a user clicks on a category
     * 
     * @param :  int $category
     * @return :  JsonResponse
     */

    public function updateCount($category)
    {
        // Find the category by its ID.
        $category = NewsCategory::find($category);


        // If the category doesn't exist, return a 404 response.
        if (!$category) {
            return abort(404);
        }


        // Increment the click count of this category and save it.
        $category->click_count++;
        $category->save();

        // Return the updated click count.

        return response()->json(['click_count' => $category->click_count,]); // return click_count 
    }


    /**
     * Record a click when a user clicks on a category.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeClick(Request $request)
    {
        // Retrieve the category ID from the request.
        $category = $request->input('category_id');
        // Find the category by its ID.

        $category = NewsCategory::find($category);

        // If the category doesn't exist, return a 404 response.

        if (!$category) {
            return abort(404);
        }


        // Create a new click record with the current timestamp and the category's ID.
        $click = new Click([
            'created_at' => now(),
            'category_id' => $category->id,
        ]);

        // Save the click record to the database.
        $click->save();

        // Return a success message.

        return response()->json(['message' => 'Click recorded successfully']);
    }
}
