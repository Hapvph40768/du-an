@extends('layout.AuthLayout')

@section('title', 'Đăng nhập')

@section('content')
    <form method="post" action="<?= route('login') ?>">
        <div class="form-group">
            <label class="form-label">Email</label>
            <div class="input-group">
                <input type="text" name="email" class="form-control" placeholder="phamvana@gmai.com" required autofocus>
                <i class='bx bx-user input-icon'></i>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Mật khẩu</label>
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                <i class='bx bx-lock-alt input-icon'></i>
            </div>
        </div>

        <div class="auth-links" style="margin-bottom: 24px;">
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                <input type="checkbox" name="remember">
                <span style="color: var(--text-secondary);">Ghi nhớ đăng nhập</span>
            </label>
            <a href="#">Quên mật khẩu?</a>
        </div>

        <button type="submit" class="btn-primary">
            Đăng nhập hệ thống
        </button>

        <div class="auth-links" style="justify-content: center; margin-top: 32px;">
            <span>Chưa có tài khoản? <a href="<?= route('register') ?>" class="text-link">Đăng ký ngay</a></span>
        </div>
    </form>
@endsection
