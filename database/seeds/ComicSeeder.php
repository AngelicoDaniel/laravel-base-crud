<?php

use App\Models\Comic;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_comics = config('comics');


        foreach ($array_comics as $elem) {
            $new_comic = new Comic();
            $new_comic->title = $elem['title'];
            $new_comic->description = $elem['description'];
            $new_comic->thumb = $elem['thumb'];
            $new_comic->price = $elem['price'];
            $new_comic->series = $elem['series'];
            $new_comic->sale_date = $elem['sale_date'];
            $new_comic->type = $elem['type'];
            $new_comic->save();
        }
    }
}
