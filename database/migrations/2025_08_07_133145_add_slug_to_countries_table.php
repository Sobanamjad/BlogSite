<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (!Schema::hasColumn('countries', 'slug')) {
            Schema::table('countries', function (Blueprint $table) {
                $table->string('slug')->unique()->after('name');
            });
        }
    }

    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
