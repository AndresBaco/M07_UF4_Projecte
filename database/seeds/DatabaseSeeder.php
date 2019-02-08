<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\User;
    
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    private function seedCatalog()
    {
        DB::table('movies')->delete();
        foreach( $this->arrayPeliculas as $pelicula ) {
        $p = new Movie;
        $p->title = $pelicula['title'];
        $p->year = $pelicula['year'];
        $p->director = $pelicula['director'];
        $p->poster = $pelicula['poster'];
        $p->rented = $pelicula['rented'];
        $p->synopsis = $pelicula['synopsis'];
        $p->save();
        }
        
    }
    
    private function seedUsers(){
       DB::table('users')->delete(); 
        $p = new User;
        $p->name = 'andres';
        $p->email = 'andres@gmail.com';
        $p->password = bcrypt('andres');
        $p->save();
        
        $s = new User;
        $s->name = 'cahlo';
        $s->email = 'cahlo@gmail.com';
        $s->password = bcrypt('cahlo');
        $s->save();
    }
    public function run()
    {
     // self::seedCatalog();
     // $this->command->info('Tabla catálogo inicializada con datos!');
      self::seedUsers();
      $this->command->info('Tabla usuarios inicializada con datos!');
    }
}