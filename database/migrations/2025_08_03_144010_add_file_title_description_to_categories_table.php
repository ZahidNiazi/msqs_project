<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileTitleDescriptionToCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('title', 255)->nullable()->after('name');
            $table->string('file', 255)->nullable()->after('title');
            $table->string('description', 100)->nullable()->after('file');
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['title', 'file', 'description']);
        });
    }
}
