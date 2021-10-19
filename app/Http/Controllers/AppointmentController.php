<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function __invoke()
    {
        return view('appointment',[
            'appointments' => DB::table('appointments as ap')->select(
                DB::raw('ap.*'),
                DB::raw('p.name as product_name'), 
                DB::raw('p.description as product_description'), 
                DB::raw('p.is_available as product_is_available'), 
                DB::raw('p.thumbnail as product_thumbnail'), 
                DB::raw('p.id as product_id') 
            )->join('products as p','p.id','ap.product_id')
            ->where('ap.user_id',DB::raw(Auth::id()))
            ->latest(DB::raw('ap.id'))
            ->paginate(9)
        ]);
    }
}
