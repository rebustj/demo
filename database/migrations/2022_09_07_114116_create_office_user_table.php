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
        Schema::create('office_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('office_id')->constrained('offices');
            $table->foreignId('user_id')->constrained('users');
            $table->string('role')->default('EMPLOYEE'); // MANAGER, CO-MANAGER
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
        Schema::dropIfExists('office_user');
    }
};
