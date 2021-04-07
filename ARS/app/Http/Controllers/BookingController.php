<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Route_direct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{
    public function search_place(Request $request){
        if ($request->get('query')){
            $query = $request->get('query');
            $data = DB::table('airports')
                ->where('name','LIKE',"%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block ; position:absolute ; width: 80%; margin-left: 55px
                    ">';
            foreach ($data as $row){
                $output .='
            <li style="line-height: 2em; margin-left: 10px; font-size: 15px; color: #777; cursor: pointer">'.$row->name.'</li>
            ';
            }
            $output .='</ul>';
            echo $output;
        }
    }

    public function creat(Request $request){
        $origin_airport = Airport::where('name','=',$request->place_from)->first();
        $arrival_airport = Airport::where('name','=',$request->place_to)->first();
    }
}
