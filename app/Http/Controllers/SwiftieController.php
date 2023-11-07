<?php

namespace App\Http\Controllers;

use App\Models\swiftie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SwiftieController extends Controller
{

    // Create
    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $this->swiftieRegister($request);
        $created = swiftie::create($data);
        if ($created) {
            return redirect()->back()->with('success', true);
        } else {
            return redirect()->back()->with('success', false);
        }
    }

    // Read
    public function listPage()
    {
        $swifties = $this->swiftieList();
        $count = $this->swiftieTotal();

        // the 10 albums count
        $taylorSwift = swiftie::where('album_id', '1')->count();
        $fearless = swiftie::where('album_id', '2')->count();
        $speakNow = swiftie::where('album_id', '3')->count();
        $red = swiftie::where('album_id', '4')->count();
        $nen = swiftie::where('album_id', '5')->count();
        $reputation = swiftie::where('album_id', '6')->count();
        $lover = swiftie::where('album_id', '7')->count();
        $folklore = swiftie::where('album_id', '8')->count();
        $evermore = swiftie::where('album_id', '9')->count();
        $midnights = swiftie::where('album_id', '10')->count();

        return view('list', compact('swifties', 'count', 'taylorSwift', 'fearless', 'speakNow', 'red', 'nen', 'reputation', 'lover', 'folklore', 'evermore', 'midnights'));
    }

    // * private functions

    private function swiftieRegister($request)
    {
        return [
            'name' => $request->swiftieName,
            'album_id' => $request->swiftieFav
        ];
    }

    private function swiftieList()
    {
        return
            DB::table('swifties')
            ->join('albums', 'swifties.album_id', '=', 'albums.album_id')
            ->select('swifties.name', 'albums.album_name')
            ->get()->toArray();
    }

    private function swiftieTotal()
    {
        return
            DB::table('swifties')->count();
    }



    //**** getting API data
    // get swiftie datas
    public function getSwiftie()
    {
        $swifties = DB::table('swifties')
            ->join('albums', 'swifties.album_id', '=', 'albums.album_id')
            ->select('swifties.name', 'albums.album_name')
            ->get()->toArray();

        return response()->json($swifties);
    }

    // create swiftie
    public function storeSwiftie(Request $request)
    {
        if ($request->album_id > 0 && $request->album_id <= 10) {
            $newSwiftie = new Swiftie;
            $newSwiftie->name = $request->name;
            $newSwiftie->album_id = $request->album_id;
            $newSwiftie->save();
            return response()->json([
                'message'   =>  'A record is created',
                'status'    =>  'success',
                'Swiftie'   =>  $newSwiftie
            ]);
        } else {
            return response()->json([
                'message'   =>  'album_id must be between 1 and 10',
                'status' => 'fail'
            ]);
        }
    }
}
