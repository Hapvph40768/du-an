<?php
namespace App\Requests;
class LoginRequest {

    public static function validate($data) {
        $errors = [];

        if (empty($data['email'])) {
            $errors['email'] = 'Email không được để trống';
        }

        if (empty($data['password'])) {
            $errors['password'] = 'Mật khẩu không được để trống';
        }

        return $errors;
    }
}
