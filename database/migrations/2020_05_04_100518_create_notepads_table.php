<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotepadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notepads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('np_name')->nullable($value = true);
            $table->string('np_slug')->index()->unique();
            $table->bigInteger('np_category_id')->index()->default(0);
            $table->longText('np_description')->nullable($value = true);
            $table->longText('np_html')->nullable($value = true);
            $table->longText('np_css')->nullable($value = true);
            $table->longText('np_js')->nullable($value = true);
            $table->string('np_link')->nullable();
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
        Schema::dropIfExists('notepads');
    }
}
