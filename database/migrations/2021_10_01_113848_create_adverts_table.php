<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->unsignedBigInteger('autovit_id')->primary();
            $table->text('description');
            $table->unsignedMediumInteger('price');
            $table->boolean('rhd');
            $table->string('make');
            $table->string('model');
            $table->string('version');
            $table->string('generation');
            $table->unsignedSmallInteger('year');
            $table->unsignedMediumInteger('mileage');
            $table->string('vin');
            $table->string('fuel_type');
            $table->unsignedSmallInteger('engine_power');
            $table->unsignedSmallInteger('engine_capacity');
            $table->string('transmission');
            $table->string('gearbox');
            $table->string('pollution_standard');
            $table->boolean('particle_filter');
            $table->decimal('urban_consumption');
            $table->string('body_type');
            $table->unsignedSmallInteger('co2_emissions');
            $table->unsignedSmallInteger('door_count');
            $table->string('color');
            $table->string('colour_type');
            $table->json('features');
            $table->date('date_registration');
            $table->boolean('registered');
            $table->boolean('original_owner');
            $table->boolean('no_accident');
            $table->boolean('service_record');
            $table->boolean('historical_vehicle');
            $table->boolean('tuning');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
}
