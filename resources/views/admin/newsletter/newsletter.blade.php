 @extends('layouts.admin_layout.admin_layout')
 @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Subscriber</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subscriber</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ Session::get('success_message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             @endif
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>
                  Subscriber List
                  <a href="{{ url('admin/subscriber-excel-export') }}" style="max-width: 150px; float: right; display: inline-block;" title="" class="btn btn-block btn-success">Export</a>
                </h3>
              </div>
              <div class="card-body">
                 <table id="subscriberlist" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <td>Action</td>
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($subscribers as $key => $subscriber)
                    <tr>
	                    <td>{{ $key+1 }}</td>
	                    <td>{{ $subscriber->email }}</td>
	                    <td>
                        @if($subscriber->status == 1)
                          <a class="updatesubscriberStatus" id="subscriber-{{ $subscriber->id }}" subscriber_id="{{ $subscriber->id }}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                        @else
                          <a class="updatesubscriberStatus" id="subscriber-{{ $subscriber->id }}" subscriber_id="{{ $subscriber->id }}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                        @endif  
                      </td>
                      <td>{{ date('d F, Y', strtotime($subscriber->created_at)) }}</td>
                      <td>
                        <a href="{{ url('admin/delete-subscriber',$subscriber->id) }}" title="Delete" id="delete" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                 </tbody>
               </table>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
@endsection