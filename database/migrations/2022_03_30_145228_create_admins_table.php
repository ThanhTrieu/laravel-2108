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
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // big int + ko am : ten la id
            $table->string('username',60)->unique();
            $table->string('password',60);
            $table->string('email',60)->unique();
            $table->string('phone',20);
            $table->string('fullname',60);
            $table->string('address',200);
            $table->date('birthday');
            $table->tinyInteger('status')->default(1);
            $table->string('avatar',100)->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->datetime('last_login')->nullable();
            $table->datetime('last_logout')->nullable();
            $table->timestamps(); // created_at + updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
