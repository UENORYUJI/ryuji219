<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    //ブログ一覧を表示
    public function showList(){
       //プログ登録
       \DB::beginTransaction();
       try{
           $blogs=Blog::all();
        }catch(Throwable $e){
            window.confirm('アクセスエラー');
        }


        // dd($blogs);
        return view("blog.list",["blogs_All" => $blogs]);
    }
  
    //ブログ詳細を表示
    public function showDetail($id){
        $blog=Blog::find($id);
        if(is_null($blog)){
            // \Session::flash("err_msg","データがありません")；
	    return redirect(route("blogs"));
        }
        return view("blog.detail",["blog_detail" => $blog]);
    }
    
    // プログ登録画面を表示
    public function showCreate(){
        return view("blog.form");
    }
   
    // プログ登録
//    public function exeStore(BlogRequest $request){
    public function exeStore(Request $request){
        // dd($request->all());
        if(is_null($request->title)){
            // \Session::flash("err_msg","データがありません")；
	    return redirect(route("create"));
        }
        $inputs=$request->all();
        //プログ登録
        \DB::beginTransaction();
        try{
            Blog::create($inputs);
            \DB::commit();
        }catch(Throwable $e){
            \DB::rollback();
            abort(500);
        }

        return redirect(route("blogs"));
        // return view("blog.list",["blogs_All" => $blogs]);
    }

       //ブログ編集画面を表示
    public function showEdit($id){
        $blog=Blog::find($id);
        // dd($blog);
        if(is_null($blog)){
            // \Session::flash("err_msg","データがありません")；
            return redirect(route("blogs_All"));
        }
        return view("blog.edit",["blog_detail" => $blog]);
    }
      // プログ登録
      public function exeUpdate(Request $request){
//      public function exeUpdate(BlogRequest $request){
//        dd($request->all());
        $inputs=$request->all();
        //プログ登録
        \DB::beginTransaction();
        try{
            $blog=Blog::find($inputs['id']);
            $blog->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content']
            ]);
            $blog->save();
            \DB::commit();
        }catch(Throwable $e){
            \DB::rollback();
            abort(500);
        }

        return redirect(route("blogs"));
        // return view("blog.list",["blogs_All" => $blogs]);

    }

   //ブログ削除
    public function exeDelete($id){
        if(empty($id)){
            // \Session::flash('err_msg','データがありません')；
            return redirect(route("blogs"));
        }

        try{
            $blog=Blog::destroy($id);
        }catch(Throwable $e){
            abort(500);
        }

        // dd($blog);
        return redirect(route("blogs"));
    }


}
