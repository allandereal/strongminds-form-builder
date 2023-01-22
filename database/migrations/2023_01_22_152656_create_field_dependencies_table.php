<?php

use App\Models\FormField;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_dependencies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FormField::class);
            $table->foreignIdFor(FormField::class, 'depends_on');
            $table->string('value');
            $table->string('action');
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
        Schema::dropIfExists('field_dependencies');
    }
};
