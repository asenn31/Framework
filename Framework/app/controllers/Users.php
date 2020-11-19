<?php 

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'kpassword' => trim($_POST['kpassword']),
                'username_err' => '',
                'password_err' =>'',
                'kpassword_err' => ''
            ];

            // Validasi Username
            if (empty($data['username'])) {
                $data['username_err'] = 'Mohon Isi Username';
            }elseif ($this->userModel->cariUsername($data['username'])) {
                $data['username_err'] = 'Username Sudah Diambil, Silahkan pilih username lain';
            }

            // Validasi Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Mohon Isi Password';
            }

            // Validasi Konfirmasi password
            if (empty($data['kpassword'])) {
                $data['kpassword_err'] = 'Mohon Konfirmasi Password';
            } elseif ($data['password'] != $data['kpassword']) {
                $data['kpassword_err'] = 'Kata Sandi Tidak Cocok';
            }

            if (empty($data['username_err']) && empty($data['password_err']) && empty($data['kpassword_err'])) {
                // Enkripsi password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->tambahUser($data)) {
                    redirect('users/login');
                }
            } else {
                // Load view dengan error
                $this->view('users/register', $data);
            }

            
        } else {
            $data = [
                'username' => '',
                'password' =>'',
                'kpassword' => '',
                'username_err' => '',
                'password_err' =>'',
                'kpassword_err' => ''
            ];
    
            $this->view('users/register', $data);
        }

    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' =>''
            ];

            // Validasi username
            if (empty($data['username'])) {
                $data['username_err'] = 'Mohon isi username';
            } elseif (!$this->userModel->cariUsername($data['username'])) {
                $data['username_err'] = 'Username tidak ditemukan';
            }

            // Validasi Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Mohon Isi Password';
            } 
            
            if (empty($data['username_err']) && empty($data['password_err'])) {
                $loggedIn = $this->userModel->login($data['password'], $data['username']);
                if ($loggedIn) {
                    $this->createSessionLogin($loggedIn);
                } 
                
            } else {
                // Load view dengan error
                $this->view('users/login', $data);
            }

        } else {
            $data = [
                'username' => '',
                'password' =>'',
                'username_err' => '',
                'password_err' =>''
            ];
    
            $this->view('users/login', $data);
        }
    }

    public function createSessionLogin($row)
    {
        $_SESSION['username'] = $row->username;
         
        redirect('pages/index');
    }

    public function logout()
    {   
        unset($_SESSION['username']);

        session_destroy();

        redirect('users/login');
    }
}
