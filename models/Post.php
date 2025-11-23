<?php
class Post {
    public $title;
    public $content;
    public $created_at;

    public function __construct($title, $content, $created_at = null) {
        $this->title = $title;
        $this->content = $content;
        $this->created_at = $created_at ?? date('d.m.Y');
    }

    public static function getAll(): array {
        return [
            new Post("Перший пост", "### Вітаю!\nЦе **перший** пост, написаний у Markdown."),
            new Post("PHP MVC", "MVC допомагає *структурувати* код на три частини: Model, View, Controller."),
            new Post("Composer", "Composer — менеджер залежностей для PHP."),
            new Post("GitHub", "GitHub — сервіс для зберігання та спільної роботи над кодом."),
            new Post("Пошук", "У наступних лабораторних буде реалізовано розширений пошук та базу даних."),
        ];
    }
}
