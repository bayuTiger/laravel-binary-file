@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ファイル保存</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file">
                            <button type="submit">登録</button>
                        </form>
                        @if(is_null($files) === false)
                            @foreach ($files as $row)
                                <a href="{{ route('streamFile', ['file' => $row]) }}">{{ $row->name }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
