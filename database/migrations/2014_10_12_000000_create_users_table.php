<?php

use App\Enums\UserStatus;
use App\Enums\UserType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
            $table->string('name')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique();
            $table->integer('user_type')->default(UserType::USER);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('device_name')->nullable();
            $table->integer('status')->default(UserStatus::ACTIVE);
            //spatial
            $table->string('ip')->nullable();
            $table->decimal('latitude', 11,8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('country')->nullable()->index();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
