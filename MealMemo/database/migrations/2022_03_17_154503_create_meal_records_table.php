<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_records', function (Blueprint $table) {
            $table->id();

            $table->date('meal_date')->comment('食事した日付');
            $table->char('meal_kind', 1)->comment('食事の種別 1:朝食 2:昼食 3:夕食');
            $table->string('meal_menu')->comment('食事メニュー');

            $table->char('meal_place', 1)->comment('食事した場所 0:自宅　1:お店');

            $table->string('meal_shop_name')->nullable()->comment('食事したお店の名前');
            $table->smallInteger('meal_shop_price')->nullable()->comment('食事の値段')->unsigned();

            $table->bigInteger('calorie_id')->nullable()->comment('カロリーテーブルのID');

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
        Schema::dropIfExists('meal_records');
    }
}
