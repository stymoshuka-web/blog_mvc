<?php
// controllers/BlogController.php
require_once __DIR__ . '/../models/Post.php';

class BlogController
{
    // Показати всі пости
    public function showAllPosts()
    {
        $posts = Post::getAll();
        include __DIR__ . '/../views/postsView.php';
    }

    // Показати один пост по id (індекс у масиві)
    public function showPost($id)
    {
        $posts = Post::getAll();
        if (!isset($posts[$id])) {
            $this->showNotFound();
            return;
        }
        $post = $posts[$id];
        include __DIR__ . '/../views/postSingleView.php';
    }

    // Пошук постів за назвою (фільтрація)
    public function searchPosts($query)
    {
        $query = trim((string)$query);
        $posts = [];
        if ($query !== '') {
            $posts = Post::search($query);
        }
        include __DIR__ . '/../views/postsView.php';
    }

    // Сторінка 404
    public function showNotFound()
    {
        http_response_code(404);
        include __DIR__ . '/../views/404.php';
    }
}
