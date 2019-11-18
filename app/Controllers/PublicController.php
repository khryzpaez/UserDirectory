<?php

namespace App\Controllers\PublicController;

use App\Models\Contact;
use App\Models\User;
use Zend\Diactoros\ServerRequest;
use Inhere\Validate\Validation;

class PublicController extends BaseController
{

    function showRegister()
    {
        return $this->view('register');
    }

    function storeUser(ServerRequest $request)
    {
        $data = $request->getParsedBody();
        $v = Validation::check(
            $data,
            [
                ['name,email,password,document,country_id', 'required'],
                ['email', 'email'],
                ['password', 'min', 6],
                ['name', 'min', 3],
            ],
            [
                'required' => 'El campo {attr} es requerido!',
                'email' => 'No es una dirección de correo valida!',
                'min' => 'La contraseña debe tener minimo {value0} caracteres!'
            ]);
        $errors = [];
        if ($v->isFail()) {
            $errors = $v->getErrors();
            return $this->view('register', ['errors' => $errors, 'data' => $data]);
        }
        $userByEmail = User::where('email', $data['email'])->first();
        $userByDocument = User::where('document', $data['document'])->first();
        if (!empty($userByEmail)) {
            $errors[] = ['name' => 'email', 'msg' => 'Ya existe un registro con este email!'];
        }
        if (!empty($userByDocument)) {
            $errors[] = ['name' => 'email', 'msg' => 'Ya existe un registro con este documento!'];
        }
        if (preg_match('/\\d/', $data['password']) <= 0) {
            $errors[] = ['name' => 'password', 'msg' => 'La contraseña debe tener al menos 1 numero!'];
        }
        if (count($errors) > 0) {
            return $this->view('register', ['errors' => $errors, 'data' => $data]);
        }
        $data['password'] = md5($data['password']);
        $user = User::create($data);
        $this->setLogin($user);
        return header("Location: /contactos/listar");
    }

    function login(ServerRequest $request)
    {
        $data = $request->getParsedBody();
        $v = Validation::check
        ($data,
            [
                ['email,password', 'required'],
                ['email', 'email'],
            ],
            [
                'required' => 'El campo {attr} es requerido!',
                'email' => 'No es una dirección de correo valida!',
            ]);
        $errors = [];
        if ($v->isFail()) {
            $errors = $v->getErrors();
            return $this->view('login', ['errors' => $errors, 'data' => $data]);
        }
        $userByEmail = User::where('email', $data['email'])->first();
        if (empty($userByEmail)) {
            $errors[] = ['name' => 'email', 'msg' => 'No hay usuario registrado con este email!'];
        } elseif ($userByEmail->password !== md5($data['password'])) {
            $errors[] = ['name' => 'email', 'msg' => 'La contraseña no coincide'];
        }
        if (count($errors) > 0) {
            return $this->view('login', ['errors' => $errors, 'data' => $data]);
        }
        $this->setLogin($userByEmail);
        return header("Location: /contactos/listar");
    }

    public function index()
    {
        $search = isset($_GET['buscar']) ? $_GET['buscar'] : '';

        $query = Contact::query();
        if (!empty($search)) {
            $query->where('first_name', 'LIKE', "%$search%");
            $query->orWhere('last_name', 'LIKE', "%$search%");
            $query->orWhere('email', 'LIKE', "%$search%");
        }
        $contacts = $query->get();
        return $this->view('index', compact('contacts'));
    }

    public function showLogin()
    {
        return $this->view('login');
    }

    public function logout()
    {
        $this->setLogout();
        return header("Location: /");
    }
}