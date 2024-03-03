<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{

    protected $AuthModel;
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->AuthModel = new AuthModel();
    }

    public function valid_register()
    {
        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'password' => $this->request->getVar('password'),
            'confirm' => $this->request->getVar('confirm'),
            'foto' => 'default.jpg'
        ];

        // cek apakah password dan ulangi password sama
        if ($data['password'] != $data['confirm']) {
            session()->setFlashdata('pesan', 'Password dan Ulangi Password tidak sama');
            return redirect()->to('/register');
        }

        // enkripsi password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(10));

        $email = \Config\Services::email();
        $email->setTo($data['email']);
        $email->setFrom('sourcepictureofficial@gmail.com', 'SourcePicture');
        $email->setSubject('Registrasi Akun');
        $email->setMessage('Selamat Datang ' . $data['username'] . ' di SourcePicture, akun anda berhasil dibuat. Silahkan Activasi akun anda dengan klik link berikut :' . base_url() . 'auth/activate/' . $token);
        $email->send();

        // simpan ke database
        $this->AuthModel->save([
            'nama_lengkap' => $data['nama_lengkap'],
            'username' => $data['username'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'password' => $data['password'],
            'foto' => $data['foto'],
            'active' => $token,
        ]);

        // Arahkan ke halaman login
        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan cek email anda untuk aktivasi akun');
        return redirect()->to('/login');
    }

    public function activate($token)
    {
        if ($token) {
            $user = $this->AuthModel->where(['active' => $token])->first();
            if ($user) {
                $this->AuthModel->save([
                    'id_user' => $user['id_user'],
                    'active' => 'true'
                ]);

                session()->setFlashdata('aktif', 'Akun berhasil diaktivasi');
                return redirect()->to('/login');
            } else {
                session()->setFlashdata('token', 'Token tidak ditemukan');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('token', 'Token tidak ditemukan');
            return redirect()->to('/login');
        }
    }



    public function valid_login()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
        ];

        $user = $this->AuthModel->where(['username' => $data['username']])->first();

        // cek apakah username ada
        if ($user) {
            // cek apakah password benar
            if (password_verify($data['password'], $user['password'])) {
                if ($user['active'] == 'true') {
                session()->set([
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'email' => $user['email'],
                    'alamat' => $user['alamat'],
                    'password' => $user['password'],
                    'foto' => $user['foto'],
                    'logged_in' => TRUE
                ]);
                session()->set($data);
                return redirect()->to('/home');
            } else {
                session()->setFlashdata('pesan', 'Akun belum diaktivasi');
                return redirect()->to('/login');
            }
            } else {
                session()->setFlashdata('pesan', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {

            session()->setFlashdata('pesan', 'Username tidak ditemukan.');
            return redirect()->to('/login');
        }
    }
}
