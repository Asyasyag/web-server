<?php
namespace MyProject\Services;

class Db
{
    public static function getArticles(): array
    {
        return [
            ['id' => 1, 'name' => 'Первая статья', 'text' => 'Материал загружен из модели данных.'],
            ['id' => 2, 'name' => 'Серверная разработка', 'text' => 'PHP формирует страницу на стороне сервера.'],
            ['id' => 3, 'name' => 'Автор работы', 'text' => 'Сиддикова А. М., группа 251-321.'],
        ];
    }
}
