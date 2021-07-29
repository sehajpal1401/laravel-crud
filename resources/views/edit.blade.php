@extends('app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="{{route('projects.update', $data2['id']) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Project Name</label>
                <input type="text" id="inputName" name="name" class="form-control" value="{{$data2['project_name']}}">
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea id="inputDescription" name="description" class="form-control" rows="4">"{{$data2['project_description']}}"</textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">Team members</label>
                <select id="teammembers[]" name="teammembers[]" multiple class="form-control" value="{{$data2['project_team']}}" >
                  @foreach($data as $user)
                  <option value ="{{$user['id']}}">{{$user['name']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" name="status" class="form-control custom-select">
                <option  value="{{ $data2['project_status']}}">"{{$data2['project_status']}}"</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option selected>Success</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Client Company</label>
                <input type="text" id="inputClientCompany" name="company" class="form-control"  value="{{$data2['client_company']}}">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Project Leader</label>
                <input type="text" id="inputProjectLeader"  name="leader" class="form-control" value="{{$data2['project_leader']}}">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" id="inputEstimatedBudget"  name="estimated_budget" class="form-control"  value="{{$data1['project_budget']}}" step="1">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" id="inputSpentBudget"  name="amount_spent" class="form-control" value="{{$data1['amount_spent']}}" step="1">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project duration</label>
                <input type="number" id="inputEstimatedDuration" name="estimated_duration" class="form-control" value="{{$data1['estimated_duration']}}" step="0.1">
              </div>
            </div>
            <!-- /.card-body -->
          </div>

          <!-- /.card -->
         
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div></form>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection