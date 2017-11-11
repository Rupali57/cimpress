<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\GitHub\Facades\GitHub;
use App\GitRepo;
use Artisan;
class ServiceController extends Controller
{

	function get_github_list(Request $request)
	{
		$query = GitRepo::select("git_repo_id","full_name","url","open_issues_cnt","description","created_at");
		
		if($request->exists("tags") && $request->input("tags") !="")
		{
			
		}
		if($request->isMethod("POST"))
		{
			$data['full_name_input'] = $request->input('tags');
			$query->where('full_name','like','%'.$request->input('tags').'%');
		}
		$data['results'] = $query->paginate(10);
		
		$data['full_name'] = [];
		foreach(GitRepo::all() as $row)
		{
			$data['full_name'][] = $row['full_name'];
		}
		
		return view('get_repo_list',$data);
	}
}
