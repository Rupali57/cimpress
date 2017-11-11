<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGitrepoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('git_repo', function (Blueprint $table) {
            $table->increments('id');
			$table->string('git_repo_id',11);
			$table->string('description',500)->nullable();
			$table->integer('open_issues_cnt');
			$table->string('full_name');
			$table->string('url');
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('git_repo');
    }
}
