<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned()->index();
            $table->string('hash_id' , 16)->index();
            $table->string('logo' , 1024)->nullable();
            $table->string('name' , 72)->index();
            $table->integer('school_type_id')->unsigned()->commend('高校类型');
            $table->integer('school_nature_id')->unsigned()->commend('高校性质');
            $table->integer('school_belong_id')->unsigned()->commend('高校隶属');
            $table->enum('is_211' , ["y" , "n"])->default("n")->commend('是否211类');
            $table->enum('is_985' , ["y" , "n"])->default("n")->commend('是否985类');
            $table->integer('academician' )->unsigned()->default(0)->commend('院士数量');
            $table->integer('dg' )->unsigned()->default(0)->commend('博士点数量');
            $table->integer('pg' )->unsigned()->default(0)->commend('硕士点数量');
            $table->string('link' , 36)->nullable()->commend('学校网址');
            $table->string('phone' , 13)->nullable()->commend('联系电话');
            $table->string('email' , 54)->nullable()->commend('联系邮箱');
            $table->string('addr' , 512)->nullable()->commend('通讯地址');
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
        Schema::dropIfExists('schools');
    }
}
