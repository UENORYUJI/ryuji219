@extends('layout')

@section("title","打順")
@section("content")
<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>来季(2021年)打順構想</h2>
      <table class="table table-striped">
          <tr>
              <th>番号</th>
              <th>選手</th>
              <th></th>
              <th></th>
          </tr>
          @foreach($blogs_All as $blog)
          <tr>
              <td>{{$blog->id}}</td>
              <td><a href="blog/{{$blog->id}}">{{$blog->title}}</td>
              <td><button type="button" class="btn btn-primary" onclick="location.href='blog/edit/{{$blog->id}}'">編集</button></td>
              @csrf
              <form method="POST" action="{{route('delete',$blog->id)}}" onSubmit="return checkDelete()">
              @csrf
              <td><button type="submit" class="btn btn-danger" onclick=>削除</button></td>
              </form>
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
