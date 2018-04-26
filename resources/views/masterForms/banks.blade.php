@extends('layouts.index')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Bank Input</h1>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>

        <th width="150px">No</th>
        <th>Name</th>
        <th>Create At</th>
        <th class="text-center" width="150px">
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($banks as $bank)
      <tr class="post{{$bank->id}}">
        <td>{{ $no++ }}</td>
        <td>{{$bank->name}}</td>
        <td>{{$bank->created_at}}</td>
        <td>
          <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$bank->id}}" data-name="{{$bank->name}}">
            <i class="fa fa-eye"></i>
          </a>
          <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$bank->id}}" data-name="{{$bank->name}}"> 
            <i class="glyphicon glyphicon-pencil"></i>
          </a>
          <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$bank->id}}" data-name="{{$bank->name}}">
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
        <form class="form-horizontal" role="form">
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="name">Name :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name"
              placeholder="Write the bank's name" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>
             
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="submit" id="add">
          <span class="glyphicon glyphicon-plus"></span>Save Post
        </button>
        <button class="btn btn-warning" type="button" data-dismiss="modal">
          <span class="glyphicon glyphicon-remobe"></span>Close
        </button>
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
          <label for="">Name:</label>
          <b id="na"/>
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
        <form class="form-horizontal" role="modal">

          <div class="form-group">
            <label class="control-label col-sm-2" for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="n">
            </div>
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
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Bank');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addbank',
      data: {
        '_token': $('input[name=_token]').val(),
        'name': $('input[name=name]').val(),
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.name);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='post" + data.id + "'>"+
            "<td>" + data.id + "</td>"+
            "<td>" + data.name + "</td>"+
            "<td>" + data.created_at + "</td>"+
            "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
            "</tr>");
        }
      },
    });
    $('#name').val('');

  });

  //Edit Function
  $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text("Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Post Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#n').val($(this).data('name'));
    $('#myModal').modal('show');
  });


  

  $('.modal-footer').on('click', '.edit', function() {
    $.ajax({
      type: 'POST',
      url: 'editbank',
      data: {
        '_token': $('input[name=_token]').val(),
        'id': $("#fid").val(),
        'name': $('#n').val()
      },
      success: function(data) {
        $('.post' + data.id).replaceWith(" "+
          "<tr class='post" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.name + "</td>"+
          "<td>" + data.created_at + "</td>"+
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
      }
    });
  });

  // form Delete function
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
      url: 'deletebank',
      data: {
        '_token': $('input[name=_token]').val(),
        'id': $('.id').text()
      },
      success: function(data){
       $('.post' + $('.id').text()).remove();
     }
   });
  });

  // Show function
  $(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    $('#i').text($(this).data('id'));
    $('#na').text($(this).data('name'));
    $('.modal-title').text('Show Bank');
  });

</script>

@endsection
