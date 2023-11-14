<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //CRUD

    //** create **/

    public function create()
    {
        return view('admin.adminBlogCreate');
    }

    public function store(Request $request)
    {
        $validationRules = [
            'img' => 'required | mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/webp|max:2048',
            'title' => 'required',
            'content' => 'required'
        ];

        $validationMessage = [
            'img.required' => '(Image slot cannot be left empty)',
            'img.mimetypes' => '(Please, only input image)',
            'title.required' => '(Title cannot be left empty)',
            'content.required' => '(Content cannot be left empty)'
        ];

        $validator = Validator::make($request->all(), $validationRules, $validationMessage);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $fileName = time() . $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('images/blogs', $fileName, 'public');
        $imgPath = '/storage/' . $path;
        $data = $this->blogStore($request, $imgPath);

        $created = blog::create($data);
        if ($created) {
            return redirect()->route('blogs.adminIndex')->with('message', 'create');
        }
    }

    //** read **/

    public function index()
    {
        $blogs = blog::orderBy('updated_at', 'desc')->paginate(4);
        return view('blogs', compact('blogs'));
    }


    public function show($id)
    {
        $blog = blog::where('id', $id)->first()->toArray();
        return view('blogShow', compact('blog'));
    }

    public function adminIndex()
    {
        $blogs = blog::orderBy('updated_at', 'desc')->get();
        return view('admin.adminBlogIndex', compact('blogs'));
    }


    //** Update */

    public function adminEdit($id)
    {
        $blog = blog::where('id', $id)->first()->toArray();
        return view('admin.adminBlogEdit', compact('blog'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $validationRules = [
            'img' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/webp|max:2048',
            'title' => 'required',
            'content' => 'required'
        ];

        $validationMessage = [
            'img.mimetypes' => '(Please, only input image)',
            'title.required' => '(Title cannot be left empty)',
            'content.required' => '(Content cannot be left empty)'
        ];

        $validator = Validator::make($request->all(), $validationRules, $validationMessage);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $blog = blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;

        if ($request->hasFile('img')) {
            if ($blog->image_path) {
                Storage::delete(str_replace('/storage/', 'public/', $blog->image_path));
            }
            $fileName = time() . $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('images/blogs', $fileName, 'public');
            $imgPath = '/storage/' . $path;
            $blog->image_path = $imgPath;
        }
        $blog->save();

        return redirect()->route('blogs.adminIndex')->with('message', 'update');
    }
    //** delete */

    public function adminDestroy($id)
    {
        $imgPath = str_replace("/storage/", "", blog::where('id', $id)->value('image_path'));

        if (Storage::disk('public')->exists($imgPath)) {
            Storage::disk('public')->delete($imgPath);
            blog::where('id', $id)->delete();
        }
        return back()->with('message', 'delete');
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

    private function blogUpdate($request)
    {
        return [
            'title' => $request->title,
            'content' => $request->content
        ];
    }

    //Validation

    private function validationCheck($request)
    {
    }


    //** API CRUD */
    // create
    public function create_blog(Request $request)
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp', 'image/tiff', 'image/svg+xml', 'image/x-icon', 'image/vnd.microsoft.icon', 'image/vnd.wap.wbmp', 'image/apng'];

        if (in_array($request->file('img')->getMimeType(), $allowedMimeTypes)) {
            $fileName = time() . $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('images/blogs', $fileName, 'public');
            $imgPath = '/storage/' . $path;
            $newBlog = new blog;
            $newBlog->image_path = $imgPath;
            $newBlog->title = $request->title;
            $newBlog->content = $request->content;
            $newBlog->save();
            return response()->json([
                'message'   =>  'A record is created',
                'status'    =>  'success',
                'Blog'   =>  $newBlog
            ]);
        } else {
            return response()->json([
                'message'   =>  'Fail to create blog',
                'status' => 'fail'
            ]);
        }
    }

    // read
    public function get_blogs()
    {
        $blogs = blog::get();
        return response()->json([
            'blogs'   =>  $blogs
        ]);
    }

    public function get_blog($id)
    {
        $blog = blog::where('id', $id)->first()->toArray();
        return response()->json([
            'blogs'   =>  $blog
        ]);
    }

    public function delete_blog($id)
    {
        $imgPath = str_replace("/storage/", "", blog::where('id', $id)->value('image_path'));

        if (Storage::disk('public')->exists($imgPath) && blog::where('id', $id)->first() != null) {
            Storage::disk('public')->delete($imgPath);
            blog::where('id', $id)->delete();
            return response()->json([
                'message'   =>  'successfully deleted a record',
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'message'   =>  'File Does Not Exist',
                'status' => 'error'
            ]);
        }
    }

    public function update_blog(Request $request, $id)
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp', 'image/tiff', 'image/svg+xml', 'image/x-icon', 'image/vnd.microsoft.icon', 'image/vnd.wap.wbmp', 'image/apng'];
        $blog = blog::find($id);

        if ($blog) {
            $updateData = $this->blogUpdate($request);
            $blog->update(['title' => $updateData['title'], 'content' => $updateData['content']]);
            $blog = $blog->toArray();
            return response()->json([
                'message'   => 'Successfully updated a record',
                'status' => 'success',
                'blog' => $blog
            ]);
        } else {
            return response()->json([
                'message' => 'Record not found',
                'status' => 'error'
            ]);
        }
    }
}


        // $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp', 'image/tiff', 'image/svg+xml', 'image/x-icon', 'image/vnd.microsoft.icon', 'image/vnd.wap.wbmp', 'image/apng'];


        // $imgPath = str_replace("/storage/", "", blog::where('id', $id)->value('image_path'));


        // if (Storage::disk('public')->exists($imgPath) && in_array($request->file('img')->getMimeType(), $allowedMimeTypes)) {
        //     Storage::disk('public')->delete($imgPath);
        //     $fileName = time() . $request->file('img')->getClientOriginalName();
        //     $path = $request->file('img')->storeAs('images/blogs', $fileName, 'public');
        //     $imgPath = '/storage/' . $path;
        //     $data = [
        //         'image_path' => $imgPath,
        //         'title' => $request->title,
        //         'content' => $request->content,
        //     ];
        //     $blog = blog::find($id);
        //     $blog->update($data);
        //     return response()->json([
        //         'message' => 'Update Success',
        //         'status' => 'success',
        //         'blog' => $blog
        //     ]);
        // } else {
        //     return response()->json([
        //         'message' => 'Update failed. The file does not exist or has an unsupported mime type.',
        //         'status' => 'error'
        //     ]);
        // }



        // if ($request->img == null) {
        //     $updateData = $this->blogUpdate($request);
        //     blog::where('id', $id)
        //         ->update(['title' => $updateData['title'], 'content' => $updateData['content']]);
        //     return redirect()->route('blogs.adminIndex')->with(['message' => 'Post successfully updated!']);
        // }
