<?php
namespace App\Controllers;
use App\Models\User;
use App\Requests\LoginRequest;

class AuthController extends BaseController
{
    public function showLogin()
    {
        return $this->render('auth.login');
    }
    public function login(){
        $data = $_POST;
        $errors = LoginRequest::validate($data);
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            redirect('errors', 'loi', 'login');
        }

        $userModel = new User();
        $user = $userModel->findByEmail($data['email']);

        if(!$user){
            redirect('errors', 'Email không tồn tại', 'login');
        }

        if($user->status === 'blocked'){
            redirect('errors', 'Tài khoản đang bị khóa', 'login');
        }

        if(!password_verify($data['password'], $user->password)){
            redirect('errors', 'Mật khẩu không đúng', 'login');
        }

        //login success
        $_SESSION['user'] = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role
        ];

        redirect('sucsess', 'Đăng nhập thành công', '');
    }

    public function showRegister()
    {
        return $this->render('auth.register');
    }

    public function register(){
        $data = $_POST;

        if(empty($data['name']) || empty($data['email']) || empty($data['phone']) || empty($data['password'])){
            redirect('errors', 'Vui lòng điền đầy đủ thông tin', 'register');
        }

        $userModel = new User();

        if($userModel->findByEmail($data['email'])){
            redirect('errors', 'Email đã tồn tại', 'register');
        }

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $userModel->create($data);
        redirect('success', 'Đăng ký thành công, vui lòng đăng nhập', 'login');
    }
    public function logout(){
        unset($_SESSION['user']);
        redirect('success', 'Đăng xuất thành công', 'login');
    }

}