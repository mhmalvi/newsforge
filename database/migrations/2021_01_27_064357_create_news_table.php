<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');

            $table->text('title')->nullable();
            $table->text('details')->nullable();
            $table->string('thumbnail')->nullable();
            $table->enum('published', ['1', '0'])->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
        Schema::create('news', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
