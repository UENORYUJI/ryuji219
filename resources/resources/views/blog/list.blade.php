@extends('layout')

@section("title","プログ一覧")
@section("content")
<div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2>ブログ一覧</h2>
      @if("err_msg")
            <p class="text-danger">
                {{session("err_msg")}}
            </p>
      @endif
      <table class="table table-striped">
          <tr>
              <th>タイトル</th>
              <th>本文</th>
              <th>更新日</th>
              <th></th>
              <th></th>
          </tr>
          @foreach($blogs_All as $blog)
          <tr>
              <td><a href="public/blog/{{$blog->id}}">{{$blog->title}}</td>
              <td>{{$blog->content}}</td>
              <td>{{$blog->updated_at}}</td>
              <td><button type="button" class="btn btn-primary" onclick="location.href='public/blog/edit/{{$blog->id}}'">編集</td>
	       @csrf
              <form method="POST" action="{{route('delete',$blog->id)}}" onSubmit="return checkDelete()">
              @csrf
              <td><button type="submit" class="btn btn-danger" onclick=>削除</td>
          </tr>
          @endforeach
      </table>
  </div>
</div>

<script>
function checkDelete(){
if(window.confirm('削除してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
