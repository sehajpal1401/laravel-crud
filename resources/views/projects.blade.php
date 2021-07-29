@extends('app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/admin-master/">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          Serial No.
                      </th>
                      <th style="width: 20%">
                          Project Name
                      </th>
                      <th style="width:40%" >
                      Estimated budget
                      </th>
                      <th style="width:40%" >
                      Team members
                      </th>
                      <th style="width: 8%" class="text-center" >
                      Status
                      </th>
                      <th style="width: 20%">
                         Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                 @foreach($data as $project)
                @php
                  $i=0;
                  $array=explode(",",$project['project_team']);
                  $count=sizeof($array);
                @endphp
                  <tr>
                      <td>
                         {{$project['id']}}
                      </td>
                      <td>
                        <a>
                        {{$project['project_name']}}
                        </a>
                        <br/>
                        <small>
                          created on {{$project['created_at']}}
                        </small>
                      </td>     
                        
                      <td>
                         {{$project->project_budgets->project_budget}}
                      </td>  
                     
                      <td>                 
                      <li class='list-inline-item'>
                       @for($i=0;$i<$count;$i++)
                         <img alt='Avatar' class='table-avatar' src='dist/img/avatar3.png'>
                       @endfor
                      </li>
                  </td>
                        
                      <td>
                         {{$project['project_status']}}
                      </td>             
                     
                      <form action="{{ route('projects.destroy', $project['id']) }}" method="POST">
                     <td class="project-actions text-right">
                         <a class="btn btn-primary btn-sm" href="{{ route('projects.show',$project['id']) }}">
                             <i class="fas fa-folder">
                             </i>
                             View
                         </a>
                         <a class="btn btn-info btn-sm" href="{{ route('projects.edit',$project['id']) }}">
                             <i class="fas fa-pencil-alt">
                             </i>
                             Edit
                             @csrf
                             @method('DELETE')
                         </a>
                         <button class="btn btn-danger btn-sm" type="submit">
                             <i class="fas fa-trash">
                             </i>
                             Delete
                            </button>
                        </form>
                  </tr>
              @endforeach   
              </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
  
