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
        Schema::create('partner', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('note');
            $table->string('utilities');
            $table->string('popular');
            $table->integer('status')->comment = '1:accepted 0:new';;
            $table->foreignId('id_user')->constrained('users')
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
        Schema::dropIfExists('info_partner');
    }
};
