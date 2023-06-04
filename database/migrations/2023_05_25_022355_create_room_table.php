<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('image', 1000);
            $table->string('name');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('peoples');
            $table->string('giuong');
            $table->string('tienich', 1000);
            $table->string('note', 1000);
            $table->string('view');
            $table->string('floor');
            $table->foreignId('id_partner')->constrained('partner')
                ->cascadeOnUpdate();
            $table->foreignId('id_category')->constrained('category')
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
