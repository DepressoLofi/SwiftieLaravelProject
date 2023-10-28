<?php

namespace App\Http\Controllers;

use App\Models\swiftie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SwiftieController extends Controller
{
    public function registerPage(){
        return view('register');
    }

    public function listPage(){
        $swifties = DB::table('swifties')
                    ->join('albums', 'swifties.album_id', '=', 'albums.album_id')
                    ->select('swifties.name', 'albums.album_name')
                    ->get()->toArray();
        return view('list', ['swifties' => $swifties]);
    }

    public function register(Request $request){
        $data = $this->swiftieRegister($request);
        $created = swiftie::create($data);
        if($created){
            return redirect()->back()->with('success', true);
        }else {
            return redirect()->back()->with('success', false);
        }
    }

    private function swiftieRegister($request){
        return [
            'name' => $request->swiftieName,
            'album_id' => $request->swiftieFav
        ];
    }
}
