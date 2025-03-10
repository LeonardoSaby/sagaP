<?php
// /negocio/UserService.php
require_once __DIR__ . '/../data/UsuarioDAO.php';

class UserService
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function authenticate($username, $password)
    {
        $user = $this->userDAO->getUserByUsername($username);
        //echo "el contenido de usuario en la capa de negocio es:";
        //echo("nombre de usuario");
        //var_dump($user["username"]);
        //echo("clave del usuario");
        //var_dump($user["password"]);
        //if ($user && password_verify($password, $user['password'])) 
        if ($password = $user['password']){
        //echo "el contenido de usuario ciclo:";
        //var_dump($user);
        //var_dump($user['user_id']);
            // Usuario autenticado
            return true;
        }

        // Autenticación fallida
        return false;
    }

    // Método para obtener todos los usuarios
    public function getAllUsers() 
    {
        return $this->userDAO->getAllUsers();
    }

    // Método para crear usuarios
    public function createUser($username, $password, $estado)
    {
        return $this->userDAO->createUser($username, $password, $estado);
    }

    // Obtener un usuario por ID
    public function getUserById($userId)
    {
        return $this->userDAO->findUserById($userId);
    }

    // Actualizar un usuario
    public function updateUser($userId, $username, $password, $estado)
    {
        return $this->userDAO->updateUser($userId, $username, $password, $estado);
    }

    // Eliminar un usuario
    public function deleteUser($userId)
    {
        return $this->userDAO->deleteUser($userId);
    }
}
