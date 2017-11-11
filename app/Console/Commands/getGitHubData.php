<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;
use GrahamCampbell\GitHub\Facades\GitHub;
use App\GitRepo;

class getGitHubData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:github-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       Artisan::call('migrate', array('--path' => 'database/migrations', '--force' => true));
		GitRepo::query()->truncate();
		$response = GitHub::connection('app')->users()->repositories('symfony','all');
		
		$result = [];
		foreach($response as $row)
		{
			$result_row = [];
			$result_row['git_repo_id'] = $row['id'];
			$result_row['full_name'] = $row['full_name'];
			$result_row['url'] = $row['url'];
			$result_row['open_issues_cnt'] = $row['open_issues_count'];
			$result_row['description'] = $row['description'];
			$result_row['created_at'] = date('Y-m-d H:i:s');
			$result[] = $result_row;
			
		}
		GitRepo::insert($result);
    }
}
