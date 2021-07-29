<?php
namespace App\Http\Controllers;
use App\Models\Project;

use Illuminate\Http\Request;

class ProjectViewController extends Controller
{
    //
    function show()
    {
        // //$data=Project::all()->toArray();
        // $data=Project::join('project_budget','project_budget.id','=','projects.id')
        // ->get(['projects.*','project_budget.project_budget']);
        // return view('projects',compact('data'));
        $data=Project::with('project_budgets')->get();
        return view('projects',compact('data'));
    }
}
