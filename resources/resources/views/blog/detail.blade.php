@extends('layout')
@section("title","プログ詳細")
@section("content")
<div class="row">
  <div class="col-md-8 col-md-offset-2">
        <h2>タイトル：{{$blog_detail->title}}</h2>
        <p>作成日：{{$blog_detail->created_at}} 更新日：{{$blog_detail->updated_at}}</p>
        <p>詳細：{{$blog_detail->content}}</p>
  </div>
</div>
@endsection
