<?php

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
        Schema::create('todos', function (Blueprint $table){
            $table->id();
            $table->string('title');
            $table->text('desc');
            $table->date('due_date');
            $table->enum('priority', ['Low', 'Medium', 'High'])->default('Low');
            $table->enum('stat', ['Not Done', 'To Do', 'Need Review', 'Done'])->default('Not Done');
            $table->timestamp('creation_date')->default(now());
            $table->foreignId('user_id')->constrained();
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo');
    }
};
