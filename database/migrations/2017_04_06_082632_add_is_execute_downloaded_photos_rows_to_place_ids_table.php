<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsExecuteDownloadedPhotosRowsToPlaceIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('place_ids', function($table)
        {
            $table->boolean('is_executed')->default(false);
            $table->boolean('downloaded_photos')->default(false);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('place_ids', function($table)
        {
            $table->dropColumn(['is_executed', 'downloaded_photos']);
        });
    }
}
