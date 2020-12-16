@extends('layout')
@section('title', '選手登録')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>選手登録フォーム</h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
        @csrf
            <div class="form-group">
                <label for="title">
                    選手名
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">
                    選手情報
                </label>
                <textarea
                    id="content"
                    name="content"
                    class="form-control"
                    rows="4">
ポジション：
投：
打：
備考：
		</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('blogs') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    登録する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
// if(window.confirm('送信してよろしいですか？')){
    return true;
// } else {
//     return false;
// }
}
</script>
@endsection