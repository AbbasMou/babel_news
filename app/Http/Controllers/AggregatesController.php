<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Click;
use Carbon\Carbon;

class AggregatesController extends Controller
{


    public function getAggregates($category, $period)
    {
        // Define a mapping of period strings to time intervals.
        $periods = [
            'last_24_hours' => '1 day',
            'last_week' => '1 week',
            'last_month' => '1 month',
            'last_year' => '1 year',
        ];

        // Check if the provided period exists in the mapping.
        if (array_key_exists($period, $periods)) {
            // Get the corresponding time interval.
            $timeInterval = $periods[$period];

            // Check if $timeInterval is defined and not null.
            if ($timeInterval !== null) {
                // Calculate the start date based on the selected period.
                $startDate = Carbon::now()->sub($timeInterval);

                // Query the Click model to retrieve the relevant records for the specified category and time interval.
                $clicks = Click::where('category_id', $category)
                    ->where('created_at', '>=', $startDate)
                    ->get();

                // Calculate the total click count based on the number of click records.
                $totalClicks = $clicks->count();

                return response()->json(['total_clicks' => $totalClicks]);
            } else {
                // Handle cases where $timeInterval is not correctly defined.
                return response()->json(['error' => 'Invalid time interval'], 400);
            }
        } else {
            // Handle invalid period parameter.
            return response()->json(['error' => 'Invalid period parameter'], 400);
        }
    }
}
