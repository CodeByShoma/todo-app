<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => '読書',
            'description' => 'オブジェクト指向でなぜつくるのか',
            'due_date' => '2025/4/13',
        ]);

        Task::create([
            'title' => 'laravel学習',
            'description' => 'シーダーについて',
            'due_date' => '2025/4/13',
        ]);

        Task::create([
            'title' => 'フロントエンド学習',
            'description' => 'TailWindCSS',
            'due_date' => '2025/4/13',
        ]);
    }
}
