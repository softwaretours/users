<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->after('name');
            $table->string('password_text')->after('password');
            $table->string('api_key')->default('ADq7qXxBj8yH4xt0')->after('remember_token');
            $table->string('account_source')->default('system')->after('api_key');
            $table->integer('status')->after('account_source');
            $table->integer('account_id')->default(0)->after('status');
            $table->integer('parent_id')->default(0)->after('account_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }

}
