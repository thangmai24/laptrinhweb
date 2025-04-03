@extends('dashboard')

@section('content')
<div class="update-container">
    <h2>Màn hình cập nhật</h2>
    <form action="{{ route('user.postUpdateUser') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="id">Id</label>
            <input type="text" id="id" name="id" value="{{$user->id}}" readonly>
            <input type="hidden" name="id" value="{{ $user->id }}">
        </div>

        <div class="input-group">
            <label for="name">Username</label>
            <input type="text" id="name" name="name" value="{{$user->name}}">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="input-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="input-group">
            <label for="confirm-password">Nhập lại mật khẩu</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{$user->email}}">
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="login-link">
            <a href="{{ route('login') }}">Đã có tài khoản</a>
        </div>
        <button type="submit">Cập nhật</button>
    </form>
</div>
@endsection