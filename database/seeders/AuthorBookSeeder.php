<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            'Стив Макконнелл',
            'Михаил Фленов',
            'Мэтт Стаффер',
            'Дэвид Скляр',
            'Адам Трахтенберг',
            'Бэрон Шварц',
            'Вадим Ткаченко',
            'Петр Зайцев',
            'Ральф Джонсон',
            'Джон Влиссидес',
            'Ричард Хелм',
            'Эрих Гамма'
        ];

        foreach ($authors as $name) {
            Author::query()->create([
                'name' => $name
            ]);
        }

        $books = [
            ['title' => 'Совершенный код', 'authors' => ['Стив Макконнелл']],
            ['title' => 'PHP глазами хакера', 'authors' => ['Михаил Фленов']],
            ['title' => 'Laravel. Полное руководство', 'authors' => ['Мэтт Стаффер']],
            ['title' => 'PHP. Рецепты программирования', 'authors' => ['Дэвид Скляр', 'Адам Трахтенберг']],
            ['title' => 'MySQL по максимуму', 'authors' => ['Бэрон Шварц', 'Вадим Ткаченко', 'Петр Зайцев']],
            ['title' => 'Паттерны объектно-ориентированного проектирования', 'authors' => ['Ральф Джонсон', 'Джон Влиссидес', 'Ричард Хелм', 'Эрих Гамма']],
        ];

        foreach ($books as $bookData) {
            $book = Book::query()->create(['title' => $bookData['title']]);

            $authorIds = Author::query()->whereIn('name', $bookData['authors'])
                ->pluck('id');

            $book->authors()->attach($authorIds);
        }
    }
}
