<?php
require_once __DIR__ . '/../models/User.php';

class UserController
{
    public function index()
    {
        $userModel = new User();
        $search = $_GET['q'] ?? '';

        // Paginación
        $limit = 5;
        $page = isset($_GET['page']) ? max((int)$_GET['page'], 1) : 1;
        $offset = ($page - 1) * $limit;

        if ($search) {
            $users = $userModel->search($search); // Puedes paginar búsqueda también si lo deseas
            $totalUsers = count($users); // rápida solución, aunque no ideal
        } else {
            $users = $userModel->getAll($limit, $offset);
            $totalUsers = $userModel->countAll();
        }

        $totalPages = ceil($totalUsers / $limit);

        include __DIR__ . '/../views/users/index.php';
    }

    public function create()
    {
        include __DIR__ . '/../views/users/create.php';
    }

    public function edit($id) {
        $userModel = new User();
        $user = $userModel->find($id);

        if (!$user) {
            die("Usuario no encontrado");
        }

        include __DIR__ . '/../views/users/edit.php';
    }


    public function store($name, $email, $pass)
{
    $errors = [];

    if (empty($name)) {
        $errors[] = "El nombre es obligatorio.";
    }

    if (empty($email)) {
        $errors[] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del correo no es válido.";
    }

    if (empty($pass)) {
        $errors[] = "El password es obligatorio.";
    }

    if (count($errors) > 0) {
        $oldData = ['name' => $name, 'email' => $email];
        include __DIR__ . '/../views/users/create.php';
    } else {
        // Aquí se aplica el hash
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        $userModel = new User();
        $userModel->create($name, $email, $hashedPass);

        header("Location: index.php?controller=user&action=index&success=1");
        exit;
    }
}


    public function update($id, $name, $email) {
        $errors = [];
    
        if (empty($name)) $errors[] = "El nombre es obligatorio.";
        if (empty($email)) $errors[] = "El correo es obligatorio.";
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Correo inválido.";
    
        if ($errors) {
            $user = ['id' => $id, 'name' => $name, 'email' => $email];
            include __DIR__ . '/../views/users/edit.php';
        } else {
            $userModel = new User();
            $userModel->update($id, $name, $email);
            header("Location: index.php?controller=user&action=index&updated=1");
            exit;
        }
    }
    
    public function delete($id) {
        $userModel = new User();
        $userModel->delete($id);
        header("Location: index.php?controller=user&action=index&deleted=1");
        exit;
    }
}
