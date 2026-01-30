@extends('layout.AuthLayout')

@section('title', 'Đăng ký tài khoản')

@section('content')
    <form method="post" action="<?= route('register') ?>">
        <div class="form-group">
            <label class="form-label">Họ và tên</label>
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Nguyễn Văn A" required>
                <i class='bx bx-id-card input-icon'></i>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Email</label>
            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="example@manhhung.com" required>
                <i class='bx bx-envelope input-icon'></i>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Số điện thoại</label>
            <div class="input-group">
                <input type="tel" name="phone" class="form-control" placeholder="0912 345 678" required>
                <i class='bx bx-phone input-icon'></i>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Mật khẩu</label>
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                <i class='bx bx-lock-alt input-icon'></i>
            </div>
        </div>

        <button type="submit" class="btn-primary" style="margin-top: 16px;">
            Đăng ký tài khoản
        </button>

        <div class="auth-links" style="justify-content: center; margin-top: 24px;">
            <span>Đã có tài khoản? <a href="<?= route('login') ?>" class="text-link">Đăng nhập</a></span>
        </div>
    </form>
@endsection
