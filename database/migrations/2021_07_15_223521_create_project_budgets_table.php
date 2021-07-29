<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
                $table->string('project_budget');
                $table->string('amount_spent');
                $table->string('estimated_duration');
                $table->timestamps();
                $table->foreign('project_id')->references('id')->on('projects')
                ->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_budgets');
    }
}
