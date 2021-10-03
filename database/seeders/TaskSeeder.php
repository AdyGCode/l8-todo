<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedTasks = [
            [
                'name' => 'Getter',
                'description' => 'Debitis ducimus ex labore molestiae molestias nisi nulla officia, optio placeat? Aperiam
    consequuntur, dicta eaque eos excepturi fugiat harum inventore iste libero minima modi,
    numquam odio omnis quo ratione saepe?',
                'user_id'=>12,
                'created_at' => now(),
            ], [
                'name' => 'Setter',
                'description' => 'A architecto asperiores deleniti dolores, doloribus facilis, hic inventore maxime molestiae
    natus neque reiciendis reprehenderit sapiente vel voluptatibus. Ab aliquid amet aut culpa
    deleniti, eligendi enim obcaecati possimus voluptatem voluptates!',
                'created_at' => now(),
                'user_id'=>10,
            ], [
                'name' => 'Putter',
                'description' => 'Accusamus atque distinctio dolorem, doloremque eius hic ipsam magni optio pariatur
    praesentium quia reiciendis totam, voluptate! Ab, alias amet aperiam autem blanditiis error
    provident. Eos impedit ipsum omnis reiciendis repellat.',
                'created_at' => now(),
                'user_id'=>11,
            ], [
                'name' => 'Cutter',
                'description' => 'Animi, atque, commodi culpa
    cupiditate dolore dolorem doloribus exercitationem facilis impedit laborum magni molestias
    nam nemo non odio odit officia repellendus voluptatibus!',
                'created_at' => now(),
                'user_id'=>12,
            ],[
                'name' => 'Hatter',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis dolor dolores
    ipsam magni, mollitia nostrum, numquam recusandae suscipit totam vel veniam vitae
    voluptates! Alias minima obcaecati reprehenderit tempore ullam!',
                'created_at' => now(),
                'user_id'=>14,
            ],[
                'name' => 'Natter',
                'description' => 'Alias inventore libero minima saepe ut vero. Aliquam, commodi corporis, deserunt distinctio
    dolore doloribus et hic nihil, quam quas tempore veniam vitae voluptate. Animi itaque
    praesentium ut. Eos, reprehenderit, tempore!',
                'created_at' => now(),
                'user_id'=>11,
            ],[
                'name' => 'Rotter',
                'description' => 'Alias inventore libero minima saepe ut vero. Aliquam, commodi corporis, deserunt distinctio
    dolore doloribus et hic nihil, quam quas tempore veniam vitae voluptate. Animi itaque
    praesentium ut. Eos, reprehenderit, tempore!',
                'created_at' => now(),
                'user_id'=>12,
            ],[
                'name' => 'Totter',
                'description' => 'Alias inventore libero minima saepe ut vero. Aliquam, commodi corporis, deserunt distinctio
    dolore doloribus et hic nihil, quam quas tempore veniam vitae voluptate. Animi itaque
    praesentium ut. Eos, reprehenderit, tempore!',
                'created_at' => now(),
                'user_id'=>11,
            ],[
                'name' => 'Tatter',
                'description' => 'Alias inventore libero minima saepe ut vero. Aliquam, commodi corporis, deserunt distinctio
    dolore doloribus et hic nihil, quam quas tempore veniam vitae voluptate. Animi itaque
    praesentium ut. Eos, reprehenderit, tempore!',
                'created_at' => now(),
                'user_id'=>5,
            ],[
                'name' => 'Flatter',
                'description' => 'Alias inventore libero minima saepe ut vero. Aliquam, commodi corporis, deserunt distinctio
    dolore doloribus et hic nihil, quam quas tempore veniam vitae voluptate. Animi itaque
    praesentium ut. Eos, reprehenderit, tempore!',
                'created_at' => now(),
                'user_id'=>6,
            ],[
                'name' => 'Platter',
                'description' => 'Alias inventore libero minima saepe ut vero. Aliquam, commodi corporis, deserunt distinctio
    dolore doloribus et hic nihil, quam quas tempore veniam vitae voluptate. Animi itaque
    praesentium ut. Eos, reprehenderit, tempore!',
                'created_at' => now(),
                'user_id'=>6,
            ],
            ];
        foreach ($seedTasks as $seed) {
            Task::create($seed);
        }
    }
}
