@extends('dashboard')

@section('content')
<div class="container">
        <h3 style="text-align: center;" >Man hinh dang nhap</h3>
        <form method="POST" action="{{ route('user.authUser') }}">
        @csrf
        <div class="row" >
            <div class="col-25">
              <label for="name">User name</label>
            </div>
            <div class="col-75">
              <input type="text" id="name" name="name" >
              @if ($errors->has('namename'))
                                        <span class="text-danger">{{ $errors->first('namename') }}</span>
                                    @endif
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="password">Mat khau</label>
            </div>
            <div class="col-75">
              <input type="password" id="password" name="password" >
              @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
            </div>
          </div>
          <div class="checkbox-group">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Ghi nhớ đăng nhập</label>
        </div>
        <div style="display: flex;">
          <div class="forgot-password" style="margin: 12px;">
            <a href="#">Quên mật khẩu</a>
        </div>
        <button style="height: min-content; margin-top: 15px;background-color: blue;color: white;" type="submit">Đăng nhập</button>
      
        </form>
        </div>
    </div>
@endsection


   
