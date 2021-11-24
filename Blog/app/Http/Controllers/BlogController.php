<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $blogs = BlogModel::all();
        if($search){
            $blogs = DB::table('blogs')->where('name',"like","%".$search."%")->get();
            
        }
        else {
            // $blogs = BlogModel::all();
            
        }
        

        
        return view('Blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('Blogs.create');
    }

    public function store(Request $request)
    {
      BlogModel::create($request->only('name','image','content'));
      return redirect()->route('Blogs.index');
    }

    public function edit($id)
    {
        $blog = BlogModel::findOrFail($id);
        return view('Blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = BlogModel::findOrFail($id);
        $blog->name = $request->input('name');
        $blog->content = $request->input('content');

        //cap nhat anh
        if ($request->hasFile('image')) {

            //xoa anh cu neu co
            $currentImg = $blog->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            // cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $blog->image = $path;
        }

       
        $blog->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('Blogs.index');
    }

    public function destroy($id)
    {
        BlogModel::find($id)->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach task
        return redirect()->route('Blogs.index')->with('success','Xoá thành công');
    }
}