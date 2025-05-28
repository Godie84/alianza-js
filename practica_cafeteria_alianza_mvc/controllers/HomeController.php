<?php
class HomeController// extends Controller
{

    // Método para mostrar la página de inicio
    public function index()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        include __DIR__ . '/../views/home/index.php';// Incluye la vista de la página de inicio, donde se mostrarán los datos del usuario autenticado y otras informaciones relevantes.
    }
}