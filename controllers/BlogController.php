<?php
require_once 'models/Post.php';
require_once __DIR__ . '/../vendor/autoload.php'; // автозавантаження Composer

class BlogController {

    public function showAllPosts() {

        $posts = Post::getAll();

        // Пошук
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';

        if ($search !== '') {
            $query = mb_strtolower($search);

            $posts = array_filter($posts, function($post) use ($query) {
                return str_contains(mb_strtolower($post->title), $query)
                    || str_contains(mb_strtolower($post->content), $query);
            });
        }

        // Пагінація
        $perPage = 3;
        $totalPages = max(1, ceil(count($posts) / $perPage));
        $page = isset($_GET['page']) ? max(1, min((int)$_GET['page'], $totalPages)) : 1;

        $offset = ($page - 1) * $perPage;
        $posts = array_slice($posts, $offset, $perPage);

        include 'views/postsView.php';
    }
}
