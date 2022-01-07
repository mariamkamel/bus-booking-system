<?php
use Illuminate\Support\Facades\Route;
use App\Models\Seats;
use App\Models\Stations;
use App\Models\Trips;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('Trips/{start}/{end}', function($start, $end)
{
    $str = '%' . $start . '%' . $end. '%';
    $trip = Trips::where('stations','like', $str)->get();
    $stations_array = explode (',', $trip[0]->stations);
    
    $startIndex = array_search($start, $stations_array);
    $endIndex = array_search($end, $stations_array);
    
    $seats_array = array_map('intval', explode(',', $trip[0]->stations_booked_seats));
    $route_seats_array = array_slice($seats_array, $startIndex, $endIndex-$startIndex);
    $maxCount = max($route_seats_array);

    return 12 - $maxCount;     
});

Route::put('Trips/{start}/{end}', function($start, $end)
{

    $str = '%' . $start . '%' . $end. '%';
    $trip = Trips::where('stations','like', $str)->get();
    $stations_array = explode (',', $trip[0]->stations);
    
    $startIndex = array_search($start, $stations_array);
    $endIndex = array_search($end, $stations_array);
    
    $seats_array = array_map('intval', explode(',', $trip[0]->stations_booked_seats));
    $route_seats_array = array_slice($seats_array, $startIndex, $endIndex-$startIndex);
    $maxCount = max($route_seats_array);
    $seats_array_not_needed1 = array_slice($seats_array, 0, $startIndex);
    $seats_array_needed= array_slice($seats_array, $startIndex, $endIndex-$startIndex);
    $seats_array_not_needed2 = array_slice($seats_array, $endIndex);

    foreach ($seats_array_needed as $key => $value) {
       $seats_array_needed[$key]++;
    }
    $updated_seats = implode(",",array_merge($seats_array_not_needed1,$seats_array_needed, $seats_array_not_needed2));
    Trips::where('id', $trip[0]->id)->update(['stations_booked_seats'=> $updated_seats]); 
    //update in db
    //trip.stations

});