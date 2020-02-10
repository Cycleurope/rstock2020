<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableAddRoleColumnsAndMore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 16)->default('guest')->after('password');
            $table->string('phone', 14)->nullable()->after('email');
            $table->string('address1')->nullable()->after('name');
            $table->string('address2')->nullable()->after('name');
            $table->string('postalcode')->nullable()->after('name');
            $table->string('city')->nullable()->after('name');
            $table->string('username')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('phone');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('postalcode');
            $table->dropColumn('city');
            $table->dropColumn('username');
        });
    }
}
