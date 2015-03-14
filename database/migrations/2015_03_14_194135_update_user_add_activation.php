<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserAddActivation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('users', function(Blueprint $table)
        {
            $table->boolean('activated')->default(false);
            $table->string('activation_code')->nullable();
            $table->string('reset_password_code')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('activated');
            $table->dropColumn('activation_code');
            $table->dropColumn('reset_password_code');
        });
	}

}
