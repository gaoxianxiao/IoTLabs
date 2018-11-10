<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('custom_id');
            $table->string('custom_name')->default('')->comment('//客户名称');
            $table->string('custom_description')->default('')->comment('//客户描述');
            $table->string('custom_website')->default('')->comment('//客户网站');
            $table->integer('custom_order')->default(0)->comment('//排序');
            $table->string('custom_logo')->default('')->comment('//客户Logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('custom');
    }
}
