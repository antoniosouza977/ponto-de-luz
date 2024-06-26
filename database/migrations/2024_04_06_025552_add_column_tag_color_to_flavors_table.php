<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('flavors', function (Blueprint $table) {
            $table->string('tag_color', 10)->after('name')->nullable();
        });
    }

    public function down()
    {
        Schema::table('flavors', function (Blueprint $table) {
            $table->dropColumn('tag_color');
        });
    }

};
