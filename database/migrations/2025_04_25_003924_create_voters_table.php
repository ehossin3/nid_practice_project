<?php

use App\Models\Blood;
use App\Models\Photo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('name_bn');
            $table->string('name_en');
            $table->string('fname_bn');
            $table->string('fname_en');
            $table->string('mname_bn');
            $table->string('mname_en');
            $table->date('dob');
            $table->foreignIdFor(Blood::class)->unique()->constrained()->cascadeOnDelete();
            $table->bigInteger('id_no')->unique();
            $table->text('address');
            $table->string('district');
            $table->foreignIdFor(Photo::class)->unique()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
