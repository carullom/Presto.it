<?php

use App\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Stmt\Foreach_;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $categories=[
            'Abbigliamento',
            'Videogiochi',
            'Auto',
            'Musica',
            'Elettronica',
            'Informatica',
            'Libri',
            'Accessori',
            'Sport',
            'Arredamento'
        ];
       
        sort($categories);
        foreach ($categories as $category) {

           $c=new Category();
           $c->name=$category;
           $c->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
