@extends('dashboard')

@section('content')
<div class="detail-container">
        <h2>Màn hình chi tiết</h2>
        <div class="info-group">
            <label>Username</label>
            <p>{{$messi->name}}</p>
        </div>
        <div class="info-group">
            <label>Email</label>
            <p>{{$messi->email}}</p>
        </div>
        <a href="{{ route('user.updateUser', ['id' => $messi->id]) }}" class="btn">Chỉnh sửa</a>
    </div>
@endsection


