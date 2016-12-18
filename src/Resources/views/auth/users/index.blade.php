@extends('layouts.html')

@section('head')
	<link rel="stylesheet" href="{{URL::asset('assets/packages/datatables/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/packages/datatables/css/responsive.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/packages/datatables/css/rowReorder.dataTables.min.css')}}">
    
@endsection

@section('scripts_js')
	
    <script src="{{URL::asset('assets/packages/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/packages/datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/packages/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/packages/datatables/js/responsive.bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/packages/datatables/js/dataTables.rowReorder.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/users/datatable.js')}}"></script>
	
	
	<script>
		var $show_users = "{{ route('users.datatable') }}";
		var $deleteUrl = "{{ route('users.destroy')}}";
        var $permissionUpdate = "{{$user->can('update.users')}}";
        var $permissionDelete = "{{$user->can('delete.users')}}";
	</script>
	
@endsection



@section('content')

	<div class="col-md-10 col-md-offset-1">
		<div class="page-header">
            @permission('users.create')
            <a class="btn btn-default pull-right crud-button"
               href="{{ route('users.create') }}">Create new </a>
            @endpermission
           <h1><?=isset($titles->h1) ? $titles->h1 : 'All users'?></h1>
        </div>
        
        @if($users->count())
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role - Pass</th>
                    <th>Actions</th>

                </tr>
                </thead>

               
            </table>
        @else
            <p>There are no items.</p>
        @endif
		
	</div>
	

		
        

@endsection

