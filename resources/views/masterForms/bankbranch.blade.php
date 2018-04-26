@extends('layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Bank Branches Input</h1>
	</div>
</div>

<div class="row">
	<div class="table table-responsive">
		<table class="table table-bordered" id="table">
			<tr>

				<th width="150px">No</th>
				<th>Bank Name</th>
				<th>Branch Name</th>
				<th>Create At</th>
				<th class="text-center" width="150px">
					<a href="#" class="create-modal btn btn-success btn-sm">
						<i class="glyphicon glyphicon-plus"></i>
					</a>
				</th>
			</tr>
			{{ csrf_field() }}
			<?php  $no=1; ?>
			@foreach ($bankbranches as $bankbranch)
			<tr class="post{{$bankbranch->id}}">
				<td>{{ $no++ }}</td>
				<td>{{ $bankbranch->bank->name}}</td>
				<td>{{ $bankbranch->location}}</td>
				<td>{{ $bankbranch->created_at}}</td>
				<td>
					<a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$bankbranch->id}}" data-bank_id="{{$bankbranch->bank->name}}" data-location="{{$bankbranch->location}}">
						<i class="fa fa-eye"></i>
					</a>
					<a href="#" class="edit-modal btn btn-warning btn-sm"  data-id="{{$bankbranch->id}}" data-bank_id="{{$bankbranch->bank->name}}" data-location="{{$bankbranch->location}}">
						<i class="glyphicon glyphicon-pencil"></i>
					</a>
					<a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$bankbranch->id}}" data-bank_id="{{$bankbranch->bank->name}}" data-location="{{$bankbranch->location}}">
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
				<form action="{{route('addbankBranch')}}" method="POST" class="form-horizontal" role="form" id="branchinput">
					{{ csrf_field() }}
					<div class="form-group row add">
						<label class="control-label col-sm-2" for="name">Bank:</label>
						<div class="col-sm-10">
							<select name="bank_id" id ="bank_id" class="form-control">
								<option value="">--Select Bank--</option>
								@foreach ($banks as $bank => $value)
								<option value="{{ $bank }}"> {{ $value }}</option>   
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row add">
						<label class="control-label col-sm-2" for="location">Branch :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="location" name="location"
							placeholder="Write the bank's branch name" required>
							<p class="error text-center alert alert-danger hidden"></p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-success pull-left" value="save">
					<button class="btn btn-warning" type="button" data-dismiss="modal">
						<span class="glyphicon glyphicon-remobe"></span>Close
					</button>
				</form>
			</div>
		</div>
	</div>
</div></div>
{{-- Modal Form Show POST --}}
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

{{-- Modal Form Edit and Delete Post --}}
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<form action="{{route('branchupdate')}}" method="POST" class="form-horizontal" role="form" id="branch-update">
					{{ csrf_field() }}
					<div class="form-group row add">
						<label class="control-label col-sm-2" for="location">ID :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="id" name="id"
							placeholder="Write the bank's branch name" required>
							<p class="error text-center alert alert-danger hidden"></p>
						</div>
					</div>
					<div class="form-group row add">
						<label class="control-label col-sm-2" for="name">Bank:</label>
						<div class="col-sm-10">
							<select name="bank_id" id ="bank_id" class="form-control">
								<option value="">--Select Bank--</option>
								@foreach ($banks as $bank => $value)
								<option value="{{ $bank }}"> {{ $value }}</option>   
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row add">
						<label class="control-label col-sm-2" for="location">Branch :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="location" name="location"
							placeholder="Write the bank's branch name" required>
							<p class="error text-center alert alert-danger hidden"></p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-success pull-left" value="Update">
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
			<div class="modal-footer">

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
	$(document).on('click','.create-modal', function() {
		$('#create').modal('show');
		$('.form-horizontal').show();
		$('.modal-title').text('Add Bank Branch');
	});
	$('#branchinput').on('submit',function(e){
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
					"<td>" + data.bank_name + "</td>"+
					"<td>" + data.location  + "</td>"+
					"<td>" + data.created_at + "</td>"+
					"<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-bank_id.name='" +
					data.bank_name + "' data-location='" +
					data.location + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id +"' data-bank_id='" +
					data.bank_name + "' data-location='" +
					data.location + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-bank_id.name='" +
					data.bank_name + "' data-location='" +
					data.location + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
					"</tr>");
			}
		});
	})


//Edit bank branches
$(document).on('click', '.edit-modal', function(e) {
	$('.modal-title').text('Post Edit');
	$('.deleteContent').hide();
	$('.modal-footer').hide();
	$('.btn btn-warning').hide();
	$('.form-horizontal').show();
	var id = $(this).data('id');
	$.get("{{route('branchedit')}}",{id:id},function(data){
		$('#branch-update').find('#id').val(data.id);
		$('#branch-update').find('#location').val(data.location);
		$('#branch-update').find('#bank_id').val(data.bank_id);
		$('#myModal').modal('show');
	})

});
  //update bank branches
  $('#branch-update').on('submit',function(e){
  	e.preventDefault();
  	var data = $(this).serialize();
  	var url = $(this).attr('action');
  	var post = $(this).attr('method');
  	$.ajax({
  		type: post,
  		url: url,
  		data: data,
  		dataTy: 'json',
  		success:function(data)
  		{
  			$('.post' + data.id).replaceWith(" "+
  				"<td>" + data.id + "</td>"+
  				"<td>" + data.bank_name + "</td>"+
  				"<td>" + data.location  + "</td>"+
  				"<td>" + data.created_at + "</td>"+
  				"<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-bank_id='" +
  				data.bank_name + "' data-location='" +
  				data.location + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id +"' data-bank_id='" +
  				data.bank_name + "' data-location='" +
  				data.location + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-bank_id='" +
  				data.bank_name + "' data-location='" +
  				data.location + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
  				"</tr>");
  		}
  	});
  })

  //-----------------DELETE BANK BRANCHES-------------------
  $(document).on('click', '.delete-modal', function() {
  	$('#footer_action_button').text(" Delete");
  	$('#footer_action_button').removeClass('glyphicon-check');
  	$('#footer_action_button').addClass('glyphicon-trash');
  	$('.actionBtn').removeClass('btn-success');
  	$('.actionBtn').addClass('btn-danger');
  	$('.actionBtn').addClass('delete');
  	$('.modal-title').text('Delete Post');
  	$('.id').text($(this).data('id'));
  	$('.deleteContent').show();
  	$('.form-horizontal').hide();
  	$('.name').html($(this).data('name'));
  	$('#myModal').modal('show');
  });

  $('.modal-footer').on('click', '.delete', function(){
  	$.ajax({
  		type: 'POST',
  		url: 'deletebankbranch',
  		data: {
  			'_token': $('input[name=_token]').val(),
  			'id': $('.id').text()
  		},
  		success: function(data){
  			$('.post' + $('.id').text()).remove();
  		}
  	});
  });

  $(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    $('.modal-title').text('show-post');
  });
  

   // Show function
  $(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    $('#i').text($(this).data('id'));
    $('#bank_id').text($(this).data('bank_name'));
    $('#location').text($(this).data('location'));
    $('.modal-title').text('Show Bank');
  });



</script>

@endsection
