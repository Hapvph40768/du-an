<?php
namespace App\Models;

class User extends BaseModel {

    public function findByEmail($email) {
        $this->setQuery("SELECT * FROM users WHERE email = ?");
        return $this->loadRow([$email]);
    }

    public function create($data) {
        $this->setQuery("
            INSERT INTO users (name, email, phone, password, role, status)
            VALUES (?, ?, ?, ?, 'customer', 'active')
        ");
        return $this->execute([
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['password']
        ]);
    }
}
