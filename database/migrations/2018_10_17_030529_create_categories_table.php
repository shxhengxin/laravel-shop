<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->comment('	自增长ID');
            $table->string('name')->comment('类目名称');
            $table->unsignedInteger('parent_id')->nullable()->comment('	父类目ID');
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            $table->boolean('is_directory')->comment('是否拥有子类目');
            $table->unsignedInteger('level')->comment('	当前类目层级');
            $table->string('path')->comment('该类目所有父类目 id');
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
        Schema::dropIfExists('categories');
    }
}
/**
 * [
[
"id" => 1,
"name" => "手机配件",
"parent_id" => null,
"level" => 0,
"path" => "-"
],
[
"id" => 2,
"name" => "耳机",
"parent_id" => 1,
"level" => 1,
"path" => "-1-"
],
[
"id" => 3,
"name" => "蓝牙耳机",
"parent_id" => 2,
"level" => 2,
"path" => "-1-2-"
],
[
"id" => 4,
"name" => "移动电源",
"parent_id" => 1,
"level" => 1,
"path" => "-1-"
],
];
 */