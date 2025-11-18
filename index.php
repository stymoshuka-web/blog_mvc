<?php
// index.php
// Точка входу

// Включаємо автозавантаження Composer (якщо є)
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Просте підключення контролера
require_once __DIR__ . '/controllers/BlogController.php';

// Ініціалізуємо контролер
$controller = new BlogController();

// Проста маршрутизація через GET параметри: action, id, query
$action = $_GET['action'] ?? 'index';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$query = $_GET['query'] ?? null;

switch ($action) {
    case 'view':
        if ($id !== null) {
            $controller->showPost($id);
        } else {
            header("Location: /index.php");
        }
        break;
    case 'search':
        $controller->searchPosts($query);
        break;
    case 'index':
    default:
        $controller->showAllPosts();
        break;
}
