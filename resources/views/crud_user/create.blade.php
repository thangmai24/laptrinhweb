@extends('dashboard')

@section('content')
<div class="register-container">
        <h2>Màn hình đăng ký</h2>
        <form action="{{ route('user.postUser') }}" method="POST">
                                @csrf

            <div class="input-group">
                <label for="name">Username</label>
                <input type="text" id="name" name="name" required>
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
                <label for="password_confirmation">Nhập lại mật khẩu</label> <br></br>
                <input  type="password"  id="password_confirmation"  name="password_confirmation" required>
        @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
        @endif
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
            </div>
            <div class="login-link">
                <a href="{{ route('login') }}">Đã có tài khoản</a>
            </div>
            <button type="submit">Đăng ký</button>
        </form>
    </div>
@endsection

