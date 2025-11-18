<?php
// models/Post.php

// Якщо встановлено Carbon через Composer - підключаємо його
use Carbon\Carbon;

class Post
{
    public $title;
    public $content;
    public $date; // рядок у форматі d.m.Y або Carbon об'єкт

    public function __construct($title, $content, $date = null)
    {
        $this->title = $title;
        $this->content = $content;
        if ($date === null) {
            $this->date = date('d.m.Y');
        } else {
            $this->date = $date;
        }
    }

    // Повертає масив постів (імітовано зберігання в масиві)
    public static function getAll()
    {
        // Тут приклад даних — у реальному проєкті підключимо БД або JSON
        $posts = [
            new Post("Мій перший пост", "Це приклад **першого** поста в блозі.\n\nТут можна писати текст у Markdown.", date('01.01.2024')),
            new Post("MVC у PHP", "MVC — це розділення коду на три частини: Model, View, Controller.\n\nПереваги: простіше підтримувати код.", date('15.03.2024')),
            new Post("Composer", "Composer — менеджер залежностей для PHP. Використовуйте його для підключення бібліотек.", date('10.05.2024')),
            new Post("GitHub", "GitHub — сервіс для зберігання та спільної роботи над кодом. Створюйте репозиторії та пуште код.", date('20.07.2024')),
            new Post("Наступний крок", "Далі можна додати пошук, Markdown або базу даних. Це приклад поста з датою.", date('01.09.2024')),
        ];

        return $posts;
    }

    // Пошук за заголовком (чутливість до регістру знижено)
    public static function search($query)
    {
        $query = mb_strtolower($query, 'UTF-8');
        $all = self::getAll();
        $result = [];
        foreach ($all as $idx => $post) {
            if (mb_stripos($post->title, $query, 0, 'UTF-8') !== false ||
                mb_stripos($post->content, $query, 0, 'UTF-8') !== false) {
                $result[$idx] = $post;
            }
        }
        return $result;
    }
}
