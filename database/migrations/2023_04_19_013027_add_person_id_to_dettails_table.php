<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonIdToDettailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dettails', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id')->after('id');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dettails', function (Blueprint $table) {
            $table->dropForeign('dettails_person_id_foreign');
            $table->dropColumn('person_id');
        });
    }
}
