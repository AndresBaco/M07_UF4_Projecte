<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\User;

use App\Rating;
use App\Idioma;
use App\Tarifa;

class IdiomasTableSeeder extends Seeder
{
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       self::seedIdiomas();
      //self::seedRating();

      //self::seedTarifas();

      $this->command->info('Tabla idiomas inicializada con datos!');
        
    }
}
