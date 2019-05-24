<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name');
            $table->integer('item_price');
            $table->string('item_vendor');
            $table->string('item_location');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('item_quantity');
            $table->integer('item_user_id')->unsigned()->index();
            $table->integer('item_vendor_phone');
            $table->text('item_image');
            $table->text('item_description');

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
        Schema::dropIfExists('items');
    }
}
