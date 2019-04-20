<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exam_question', function (Blueprint $table) {
            $table->int('exam_id');
            $table->int('question_id');
            $table->timestamps();
            $table->primary(['exam_id','question_id']);
            
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exam_question', function (Blueprint $table) {
            //
        });
    }
}
