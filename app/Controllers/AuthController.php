<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
  private $users;

  public function __construct()
  {
    $this->users = $this->createDummy();
  }

  public function index()
  {
    return view("pages/login");
  }

  public function login()
  {
    $request  = $this->request;
    $username = $request->getVar('username');
    $password = $request->getVar('password');

    if (empty($username) || empty($password)) {
      session()->setFlashdata(
        'failed',
        'Username dan Password tidak boleh kosong'
      );
      return redirect()->back();
    }

    // Autentikasi
    $user = $this->auth($username, $password);

    if (!$user) {
      session()->setFlashdata('failed', 'Username atau Password salah');
      return redirect()->back();
    }

    session()->set([
      'username'   => $user['username'],
      'role'       => $user['role'],
      'isLoggedIn' => true,
    ]);

    if ($user['role'] == "admin") {
      return redirect()->to(base_url('/admin'));
    } else if ($user['role'] == "user") {
      return redirect()->to(base_url('/user'));
    };
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to(base_url('/'));
  }

  private function createDummy(): array
  {
    return [
      [
        'username' => 'rizal',
        'password' => hash('sha256', 'rizal123'),
        'role'     => 'admin',
      ],
      [
        'username' => 'user2',
        'password' => hash('sha256', 'rizal123'),
        'role'     => 'user',
      ],
    ];
  }

  private function auth(string $username, string $password): ?array
  {
    foreach ($this->users as $user) {
      $hash_password = hash('sha256', $password);
      if ($user['username'] != $username) {
        continue;
      }

      if ($user['password'] != $hash_password) {
        continue;
      }

      return $user;
    }
    return null;
  }
}
