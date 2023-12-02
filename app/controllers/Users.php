<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
            ];

            // name error
            if (empty($data['name'])) {
                $data['name_error'] = 'Namen eingeben!';
            } else {
                // Check email
                if ($this->userModel->findUserByUsername($data['name'])) {
                    $data['name_error'] = 'Name bereits vergeben!';
                }
            }


            // Validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Passwort eingeben!';
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = 'Password muss mind. 6 Zeichen lang sein';
            }

            // Validate confirm_password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = 'Passwort erneut eingeben!';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_error'] = 'Passwörter stimmen nicht überein!';
                }
            }

            // Make sure errors are empty
            if (empty($data['name_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
                // Validated

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    redirect('/users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }

        } else {
            // Init data
            $data = [
                'name' => '',
                'password' => '',
                'confirm_password' => '',
                'name_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'password' => trim($_POST['password']),
                'name_error' => '',
                'password_error' => '',
            ];

            // Validate Name
            if (empty($data['name'])) {
                $data['name_error'] = 'Namen eingeben!';
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Passwort eingeben!';
            }

            // Check for user/email
            if ($this->userModel->findUserByUsername($data['name'])) {
                //user found
            } else {
                $data['name_error'] = 'Nutzer nicht gefunden!';
            }

            // Make sure errors are empty
            if (empty($data['name_error']) && empty($data['password_error'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['name'], $data['password']);

                if ($loggedInUser) {
                    //Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_error'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }
        } else {
            // Init data
            $data = [
                'name' => '',
                'password' => '',
                'name_error' => '',
                'password_error' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->username;
        redirect('');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
}
