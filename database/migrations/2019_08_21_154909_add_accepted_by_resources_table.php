<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcceptedByResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->dropColumn('accepted');

            $table->unsignedBigInteger('accepted_by')->nullable()->after('user_id');

            $table->foreign('accepted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->boolean('accepted')->default(false)->after('user_id');

            $table->dropForeign('resources_accepted_by_foreign');
            $table->dropColumn('accepted_by');
        });
    }
}
