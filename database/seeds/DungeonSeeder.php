<?php

use Illuminate\Database\Seeder;
use App\Monster;
use App\Dungeon;

class DungeonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dungeons = [
            ['name' => 'Under your bed', 'min_level' => 1],
            ['name' => 'Basement', 'min_level' => 5],
            ['name' => 'Secret Cave', 'min_level' => 9],
        ];

        foreach($dungeons as $dungeon) {
            factory(Dungeon::class)->create($dungeon)->save();
        }

        $monsters = [
            ['experience_drop' => 2, 'energy_drop' => 5, 'min_level' => 1],
            ['experience_drop' => 3, 'energy_drop' => 4, 'min_level' => 1],
            ['experience_drop' => 4, 'energy_drop' => 10, 'min_level' => 5],
            ['experience_drop' => 5, 'energy_drop' => 8, 'min_level' => 5],
            ['experience_drop' => 8, 'energy_drop' => 12, 'min_level' => 9],
            ['experience_drop' => 7, 'energy_drop' => 14, 'min_level' => 9],
        ];

        foreach($monsters as $monster_data) {
            $monster_data['dungeon_id'] =
                Dungeon::where('min_level', $monster_data['min_level']) ->first()->id;
            unset($monster_data['min_level']);
            factory(Monster::class)->create($monster_data)->save();
        }
    }
}
