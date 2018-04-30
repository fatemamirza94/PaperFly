@extends('layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Employee Input</h1>
	</div>
</div>

<div class="row">
	<div class="table table-responsive">
		<table class="table table-bordered" id="table">
			<tr>

				<th width="150px">No</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Bank</th>
				<th>Create At</th>
				<th class="text-center" width="150px">
					<a href="#" class="create-modal btn btn-success btn-sm">
						<i class="glyphicon glyphicon-plus"></i>
					</a>
				</th>
			</tr>
			{{ csrf_field() }}
			<?php  $no=1; ?>
			@foreach ($employees as $employee)
			<tr class="post{{$employee->id}}">
				<td>{{ $no++ }}</td>
				<td>{{ $employee->name}}</td>
				<td>{{ $employee->phone}}</td>
				<td>{{ $employee->bank->name}}</td>
				<td>{{ $employee->created_at}}</td>
				<td>
					<a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$employee->id}}" data-name="{{$employee->name}}" data-phone="{{$employee->phone}}">
						<i class="fa fa-eye"></i>
					</a>
					<a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$employee->id}}" data-name="{{$employee->name}}" data-phone="{{$employee->phone}}">
						<i class="glyphicon glyphicon-pencil"></i>
					</a>
					<a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$employee->id}}" data-name="{{$employee->name}}" data-phone="{{$employee->phone}}">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>

</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<form action="{{route('addemployee')}}" method="POST" class="form-horizontal" role="form" id="employeeinput">
					{{ csrf_field() }}
					<div class="form-group row add">
						<label class="control-label col-sm-2" for="name">Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name"
							placeholder="Employee's name" required>
							<p class="error text-center alert alert-danger hidden"></p>
						</div>
					</div>
					<div class="form-group row add">
						<label class="control-label col-sm-2" for="phone">Phone:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="phone" name="phone"
							placeholder="Employee's phone number" required>
							<p class="error text-center alert alert-danger hidden"></p>
						</div>
					</div>
					<div class="form-group row add">

						
						<span>Bank </span>
						<select style="width: 200px" class="bank" id="prod_cat_id">

							<option value="0" disabled="true" selected="true">-Select-</option>
							@foreach ($banks as $bank => $value)
							<option value="{{ $bank }}">{{$value}}</option>
							@endforeach

						</select>

						<span>Bank Branch: </span>
						<select style="width: 200px" class="branchlist">

							<option id="aa" value="0" disabled="true" selected="true">Bank Branch Name</option>
						</select>

					</div>
					
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-success" value="save">
					<button class="btn btn-warning" type="button" data-dismiss="modal">
						<span class="glyphicon glyphicon-remobe"></span>Close
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Modal Form Show POST -->
<div id="show" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="">ID :</label>
					<b id="i"/>
				</div>
				<div class="form-group">
					<label for="">Bank :</label>
					<b id="bank_id"/>
				</div>
				<div class="form-group">
					<label for="">Location :</label>
					<b id="location"/>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Form Edit and Delete Post -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" class="form-horizontal" role="form" id="employee-update">
					{{ csrf_field() }}
					<div class="form-group row add">
						<label class="control-label col-sm-2" for="location">ID :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="id" name="id">
							<p class="error text-center alert alert-danger hidden"></p>
						</div>
					</div>
					<div class="form-group row add">
						<label class="control-label col-sm-2" for="name">Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name"
							placeholder="Employee's name" required>
							<p class="error text-center alert alert-danger hidden"></p>
						</div>
					</div>
					<div class="form-group row add">
						<label class="control-label col-sm-2" for="phone">Phone:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="phone" name="phone"
							placeholder="Employee's phone number" required>
							<p class="error text-center alert alert-danger hidden"></p>
						</div>
					</div>

					<div class="modal-footer">
						<input type="submit" class="btn btn-success" value="Update">
						<button class="btn btn-warning" type="button" data-dismiss="modal">
							<span class="glyphicon glyphicon-remobe"></span>Close
						</button>
					</div>

				</form>
				{{-- Form Delete Post --}}
				<div class="deleteContent">
					Are You sure want to delete <span class="name"></span>?
					<span class="hidden id"></span>
				</div>
				
			</div>
			<div class="modal-footerr">

				<button type="button" class="btn actionBtn" data-dismiss="modal">
					<span id="footer_action_button" class="glyphicon"></span>
				</button>

				<button type="button" class="btn btn-warning" data-dismiss="modal">
					<span class="glyphicon glyphicon"></span>close
				</button>

			</div>
		</div>
	</div>
</div>
@endsection
@section('js')

<script type="text/javascript">

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
		}
	});
	$(document).ready(function(){
		$(document).on('change','.bank',function(){
		//console.log('it worked');

		var bank_id = $(this).val();
		//console.log(bank_id);
		var div=$(this).parent();

		var op=" ";
		
		$.ajax({
			type:'get',
			url:'findbankbranchname',
			data:{'id':bank_id},
			success:function(data){
				console.log('success');
				console.log(data);
				console.log(data.length);
				op+='<option id="aa" value="0" selected disabled>chose division</option>';
				for(var i=0;i<data.length;i++){
					op+='<option value="'+i+'">'+i+'</option>';
				}
				div.find('.name').html(" ");
				div.find('.name').append(op);
			},
				error:function()
				{

				}
			})
	});
	});
	$(document).on('click','.create-modal', function() {
		$('#create').modal('show');
		$('.form-horizontal').show();
		$('.modal-title').text('Add Employee');
	});
	$('#employeeinput').on('submit',function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var url  = $(this).attr('action');
		var post = $(this).attr('method');
		$.ajax({
			type: post,
			url: url,
			data: data,
			dataTy: 'json',
			success:function(data)
			{
				$('.error').remove();
				$('#table').append("<tr class='post" + data.id + "'>"+
					"<td>" + data.id + "</td>"+
					"<td>" + data.name + "</td>"+
					"<td>" + data.phone  + "</td>"+
					"<td>" + data.created_at + "</td>"+
					"<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-phone='" + data.phone + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-phone='" + data.phone + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-phone='" + data.phone + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
					"</tr>");
			}
		});
		$('#name').val('');
		$('#phone').val('');
	})

</script>
@endsection
