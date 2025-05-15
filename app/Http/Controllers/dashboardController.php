<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Trip;
use App\Models\buse;

class dashboardController extends Controller
{
    //
    public function home() {
        $now = Carbon::now();
        $today = $now->toDateString();
        $tomorrow = Carbon::tomorrow(); // e.g. 2025-05-02
        // dd( $today , $tomorrow );
        // $currentTime = Carbon::now('Asia/Kolkata')->format('H:i');
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        // dd($startOfMonth);

        // dd(
        //     " Today : " . $today ,
        //     " Time : " . $time ,
        //     " Month start At : " . $startOfMonth ,
        //     " Month end At : " . $endOfMonth 
        // );
        // dd([
        //     'default' => Carbon::now()->format('H:i'),
        //     'with_timezone' => Carbon::now('Asia/Kolkata')->format('H:i'),
        //     'server_time' => date('H:i')
        // ]);

        $expectedToday = Trip::where('username',session('username'))
                        ->whereDate('deprature_datetime',$today)
                        ->where('deprature_datetime', '>=' , $today)
                        ->where('deprature_datetime', '<=', $tomorrow)
                        ->count(); 


        $inProgressToday = Trip::where('username',session('username'))
                        ->whereDate('deprature_datetime',$today)
                        ->where('deprature_datetime', '<=' , $now)
                        ->where('arrival_datetime', '>=', $now)
                        ->count(); 

        $completedToday = Trip::where('username',session('username'))
                        ->whereDate('arrival_datetime',$today)
                        ->where('arrival_datetime', '<', $now)
                        ->count();


        $upcomingToday = Trip::where('username',session('username'))
                        ->whereDate('deprature_datetime', $today)
                        ->where('deprature_datetime', '>' , $now)
                        ->count();
        
        // dd($expectedToday,$inProgressToday,$completedToday,$upcomingToday);

        // This Month Section
        $expectedMonth = Trip::where('username',session('username'))
                        ->whereBetween('deprature_datetime', [$startOfMonth, $endOfMonth])
                        ->count();

        $pendingMonth = Trip::where('username',session('username'))
                        ->whereBetween('deprature_datetime', [$now, $endOfMonth])
                        ->count();

        $completedMonth = Trip::where('username',session('username'))
                        ->whereBetween('arrival_datetime', [$startOfMonth, $now])
                        ->count();

        $expectedRevenue = Trip::where('username',session('username'))
                        ->whereBetween('deprature_datetime', [$startOfMonth, $endOfMonth])
                        ->sum(\DB::raw('booked_seats_count * price'));

        // dd($expectedMonth,$pendingMonth,$completedMonth,$monthRevenue);
        
        // for bus shcedule
        $busSchedule = Trip::where('username',session('username'))
                        ->whereDate('deprature_datetime',$today)->get();
                        
        foreach ($busSchedule as $bus ) {
            $bus -> bus_name = buse::find($bus->bus_id)->bus_name;
        }

        // return view('home-page');
        return view('home-page', compact(
            'expectedToday',
            'inProgressToday',
            'completedToday',
            'upcomingToday',
            'expectedMonth',
            'pendingMonth',
            'completedMonth',
            'expectedRevenue',
            'busSchedule'
        ));
    }
}
