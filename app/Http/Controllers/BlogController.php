<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //CRUD

    //** create **/

    public function create()
    {
        return view('blogCreate');
    }

    public function store(Request $request)
    {
        $fileName = time() . $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('images/blogs', $fileName, 'public');
        $imgPath = '/storage/' . $path;

        $data = $this->blogStore($request, $imgPath);

        $created = blog::create($data);
        if ($created) {
            return redirect()->back()->with('message', 'success');
        } else {
            return redirect()->back()->with('message', 'fail');
        }
    }

    //** read **/

    public function index()
    {
        $blogs = blog::all();
        return view('blogs', compact('blogs'));
    }

















    private function blogStore($request, $imgPath)
    {
        return [
            'image_path' => $imgPath,
            'title' =>  $request->title,
            'content' => $request->content,
            'publish' => $request->publish
        ];
    }
}
