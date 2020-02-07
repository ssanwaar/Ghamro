@extends('admin/layouts/app')

@section('main-content')

@include('admin/clients/partials/modal')


<div class="main-content-wrap d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Clients List</h1>
                    <!-- <ul>
                        <li><a href="#">UI Kits</a></li>
                        <li>Datatables</li>
                    </ul> -->
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row mb-4">
                    <!-- <div class="col-md-12">
                        <h4>Datatables</h4>
                        <p>DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, build upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table.</p>
                    </div> -->
                </div>
                <!-- end of row-->
                <div class="row mb-4">
                    <div class="col-md-12 mb-4">
                        <div class="card text-left">
                            <div class="card-body">
                                <h4 class="card-title mb-3 fa fa-arrow-circle-right"><!--Zero configuration-->    <a href="create">Add New Clients</a></h4>
                                <!-- <p>DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</p> -->
                                <div class="table-responsive">
                                    <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%" >
                                        <thead>
                                            <tr>
                                                <th>Cleint ID</th>
                                                <th>Client Name</th>
                                                <th>Phone Number</th>
                                                <th>Email Address</th>
                                                <th>Account Manager</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        @foreach ($clients as $client)
                                        <tbody>
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->phone }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->manager }}</td>
                                                <td><a href= "{{ route('clients.edit',$client->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"> Edit</i></a>
                                                    <a href= "#" class="btn btn-primary btn-sm"><i class="fa fa-tv"> View</i></a>
                                                    <!-- <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-xs">{{ trans('client.edit') }}</a> -->
                                                    <!-- <a href= "#"> 
                                                    {!! Form::model($clients, ['method' => 'delete', 'route' => ['clients.destroy', $client->id], 'class' =>'form-inline form-delete']) !!}
                                                    {!! Form::hidden('id', $client->id) !!}
                                                    {!! Form::submit(trans('Delete'), ['class' => 'btn btn-primary btn-sm', 'name' => 'delete_modal', 'i class'=>'fa fa-edit']) !!}
                                                    {!! Form::close() !!}
                                                    </a> -->
                                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$client->id}})" data-target="#DeleteModal" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                                    <a href= "#" class="btn btn-primary btn-sm"><i class="fa fa-money"> Pay</i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('scripts')
<script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("clients.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>
  @endsection