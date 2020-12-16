@extends('layout')
@section("title","選手詳細")
@section("content")
<div class="row">
  <div class="col-md-8 col-md-offset-2">
        <h1>選手名：{{$blog_detail->title}}</h1>
	<br/>
	<h3>選手情報</h3>
        <h2 style="white-space: pre-wrap;">{{$blog_detail->content}}</h2>
	<br/>
        <p>更新日：{{$blog_detail->updated_at}}</p>
        <a class="btn btn-primary" href="{{ route('blogs') }}">
                    戻る
        </a>

  </div>
</div>
@endsection
