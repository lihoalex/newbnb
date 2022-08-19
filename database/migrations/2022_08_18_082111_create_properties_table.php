<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('address_id');
            $table->integer('bathrooms_count');
            $table->integer('bedrooms_count');
            $table->integer('square_ft');
            $table->foreignId('house_type_id');
            $table->decimal('rental_rate', $precision = 8, $scale = 2);
            $table->softDeletes();
            $table->timestamps();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table
                ->foreign('address_id')
                ->references('id')
                ->on('addresses')
                ->onDelete('cascade');

            $table
                ->foreign('house_type_id')
                ->references('id')
                ->on('house_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
