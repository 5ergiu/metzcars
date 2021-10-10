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
            $table->id();
            $table->unsignedBigInteger('autovit_id')->nullable();
            $table->string('autovit_photo')->nullable();
            $table->string('title');
            $table->string('status')->nullable();
            $table->boolean('special_offer')->default(0);
            $table->boolean('sold')->default(0);
            $table->boolean('deductible_vat')->default(0);
            $table->boolean('invoice_issued')->default(0);
            $table->string('url')->nullable();
            $table->dateTime('added_on')->nullable();
            $table->string('city')->nullable();
            $table->text('description')->nullable();
            $table->unsignedMediumInteger('price');
            $table->string('brand');
            $table->string('model');
            $table->string('version');
            $table->string('generation')->nullable()->default('-');
            $table->unsignedSmallInteger('year');
            $table->unsignedMediumInteger('mileage');
            $table->string('vin');
            $table->string('fuel_type');
            $table->unsignedSmallInteger('engine_power');
            $table->unsignedSmallInteger('engine_capacity');
            $table->string('transmission')->nullable()->default('-');
            $table->string('gearbox');
            $table->string('pollution_standard')->nullable()->default('-');
            $table->boolean('particle_filter')->nullable();
            $table->decimal('urban_consumption')->nullable();
            $table->string('body_type');
            $table->unsignedSmallInteger('co2_emissions')->nullable();
            $table->unsignedSmallInteger('door_count');
            $table->string('color');
            $table->string('color_type')->nullable()->default('-');
            $table->json('features');
            $table->boolean('vat')->nullable();
            $table->date('registration_date')->nullable();
            $table->boolean('registered')->default(0);
            $table->boolean('original_owner')->default(0);
            $table->boolean('no_accident')->default(0);
            $table->boolean('service_record')->default(0);
            $table->string('directory')->nullable();
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
