<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GitRepo extends Model
{
    protected $table = "git_repo";
    protected $primary_key = "id";
}
