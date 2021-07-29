<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectBudget;
use App\Models\User;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $data =User::all();
        return view('create',['users'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Project;
        $data1 = new ProjectBudget;
        $data->project_name = $request->name;
        $data->project_description = $request->description;
        $data->project_team =implode(',', $request->teammembers);
        $data->project_file='';
        $data->project_status = $request->status;
        $data->client_company = $request->company;
        $data->project_leader = $request->leader;
        $data->save();
        $id=$data->id;
        //project_budget add
        $data1->project_id=$id;
        $data1->project_budget = $request->estimated_budget;
        $data1->amount_spent = $request->amount_spent;
        $data1->estimated_duration = $request->estimated_duration;
       
        $data1->save();

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project_budget=ProjectBudget::find($id)->toArray();
        $projects=Project::find($id)->toArray();
        return view('project-detail', compact('projects','project_budget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=User::all()->toArray();
        $data1=ProjectBudget::find($id)->toArray();
        $data2=Project::find($id)->toArray();
        return view('edit', compact('data2','data1'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $files = [];
        if($request->hasfile('project_file'))
         {
            
            foreach($request->file('project_file') as $file=>$key)
            {
                $newFilename=$key->getClientOriginalName();
                 $key->move(public_path('storage'), $newFilename);  
                 array_push($files,$newFilename);
 
            }
            $projectfile=implode(",",$files);
            $project=project::find($id);
            $project->project_file = $projectfile;
            $project->update();
         }
        elseif($request->has('name')){
        $data=Project::find($id);
        $data->project_name = $request->name;
        $data->project_description = $request->description;
        $data->project_team =implode(',', $request->teammembers);
        $data->project_file='1';
        $data->project_status = $request->status;
        $data->client_company = $request->company;
        $data->project_leader = $request->leader;
        $data->update();


        $data1=ProjectBudget::where('id',$id)->first();
        $data1->project_budget = $request->estimated_budget;
        $data1->amount_spent = $request->amount_spent;
        $data1->estimated_duration = $request->estimated_duration;
        $data1->update();
    }
        return redirect()->route('projects.index')->with('update', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects=Project::find($id);
        $projects->delete();
       
         return redirect()->route('projects.index')
            ->with('delete', 'Project deleted successfully');
    }
}
