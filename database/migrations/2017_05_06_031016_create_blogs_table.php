<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('admin_id');
            $table->string('title');
            $table->string('main_image');
            $table->mediumText('body');
            $table->text('summary');

            // Add some more columns

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('blogs', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
