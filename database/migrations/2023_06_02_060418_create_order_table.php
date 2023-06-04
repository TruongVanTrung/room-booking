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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('employee');
            $table->string('note');
            $table->foreignId('id_room')->constrained('rooms')
                ->cascadeOnUpdate();
            $table->foreignId('id_user')->constrained('users')
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
        Schema::dropIfExists('orders');
    }
};
