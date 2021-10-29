<?php

use App\Http\Resources\UpcomingTaskResource;
use App\Models\Today;
use App\Models\Upcomming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ** Upcomming Task **//

//Get all upcoming task
Route::get("/upcoming",function(){
    $upcoming = Upcomming::all();
    return UpcomingTaskResource::collection($upcoming);
});

//Add a new task
Route::post('/upcoming',function(Request $request){
    return Upcomming::create([
        'title' => $request->title,
        'taskId' => $request->taskId,
        'waiting' => $request->waiting
    ]);
});

//Delet upcomming task
Route::delete('/upcoming/{taskId}',function($taskId){
    DB::table('upcommings')->where('taskId',$taskId)->delete();
    return 204;
});



//** Today Task */

Route::post('/dailytask',function(Request $request){
    return Today::create([
        'id' => $request->id,
        'title' => $request->title,
        'taskId' => $request->taskId
    ]);
});

// Delete Today Task

Route::delete('/upcoming/{taskId}',function($taskId){
    DB::table('todays')->where('taskId',$taskId)->delete();
    return 204;
});