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
        Schema::create('field_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FormField::class)->unique();
            $table->foreignIdFor(FormField::class, 'first_form_field_id');
            $table->string('operator');
            $table->foreignIdFor(FormField::class, 'second_form_field_id');
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
        Schema::dropIfExists('field_calculations');
    }
};
