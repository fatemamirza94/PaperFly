@extends('layouts.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>District Input</h1>
    </div>
</div>

<div class="row">
    <div class="table table-responsive">
        <table class="table table-bordered" id="table">
            <tr>

                <th width="150px">No</th>
                <th>Division Name</th>
                <th>District Code</th>
                <th>District Name</th>
                <th>Create At</th>
                <th class="text-center" width="150px">
                    <a href="#" class="create-modal btn btn-success btn-sm">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </th>
            </tr>
            {{ csrf_field() }}
            <?php  $no=1; ?>
            @foreach ($district as $district)
            <tr class="post{{$district->id}}">
                <td>{{ $no++ }}</td>
                    <td>{{ $district->division->name}}</td>
                <td>{{ $district->code}}</td>
                <td>{{ $district->name}}</td>
                <td>{{ $district->created_at}}</td>
                <td>
                    <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$district->id}}" data-division_id="{{$district->division->name}}" data-code="{{$district->code}}" data-name="{{$district->name}}" >
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="#" class="edit-modal btn btn-warning btn-sm"  data-id="{{$district->id}}" data-division_id="{{$district->division->name}}" data-code="{{$district->code}}" data-name="{{$district->name}}" >
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$district->id}}" data-division_id="{{$district->division->name}}" data-code="{{$district->code}}" data-name="{{$district->name}}" >
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
                <form action="{{route('addDistrict')}}" method="POST" class="form-horizontal" role="form" id="ddistrict">
                     {{ csrf_field() }}
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="division_id">Division Name:</label>
                        <div class="col-sm-10">
                            <select name="division_id" id ="division_id" class="form-control">
                                <option value="">--Select Division--</option>
                                @foreach ($divisionDistricts as $ddivision => $value)
                                <option value="{{ $ddivision }}"> {{ $value }}</option>   
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="code">Code :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code" name="code"
                            placeholder="Write district code" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="name">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"
                            placeholder="Write district code" required>
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
                    <b id="id"/>
                </div>
                <div class="form-group">
                    <label for="">Division :</label>
                    <b id="division_id"/>
                </div>
                    <div class="form-group">
                    <label for="">Code :</label>
                    <b id="code"/>
                </div>
                </div>
                    <div class="form-group">
                    <label for="">Name :</label>
                    <b id="name"/>
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
                <form action="{{route('editDistrict')}}" method="POST" class="form-horizontal" role="form" id="branch-update">
                    {{ csrf_field() }}
                    
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="name">Division Name:</label>
                        <div class="col-sm-10">
                            <select name="division_id" id ="division_id" class="form-control">
                                <option value="">--Select Division--</option>
                               @foreach ($divisionDistricts as $ddivision => $value)
                                <option value="{{ $ddivision }}"> {{ $value }}</option>   
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="code">code :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code" name="code"
                            placeholder="Write district code">
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="name">District Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"
                            placeholder="Write the bank's branch name" required>
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
    $(document).on('click','.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add District');
    });
    $('#ddistrict').on('submit',function(e){
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
            "<td>" + data.division_name + "</td>"+
            "<td>" + data.code + "</td>"+
            "<td>" + data.name  + "</td>"+
            "<td>" + data.created_at + "</td>"+
            "<td><button class='show-modal btn btn-info btn-sm' data-id='"+ data.id + "' data-division_id='" +
             data.division_name + "' data-code='" +
             data.code + "' data-name='" +
             data.name + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id +"' data-division_id.name='" +
             data.division_name + "' data-code='" +
             data.code + "' data-name='" +
             data.name + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-division_name='" +
             data.division_name + "' data-code='" +
             data.code + "' data-name='" +
             data.name + "' ><span class='glyphicon glyphicon-trash'></span></button></td>"+
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
    $.get("{{route('districtedit')}}",{id:id},function(data){
        $('#district-update').find('#id').val(data.id);
        $('#district-update').find('#division_id').val(data.division_id);
        $('#district-update').find('#code').val(data.code);
        $('#district-update').find('#name').val(data.name);
        $('#myModal').modal('show');
    })
});
  //update bank branches
  $('#district-update').on('submit',function(e){
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
                "<td>" + data.division_name + "</td>"+
                "<td>" + data.code  + "</td>"+
                "<td>" + data.name  + "</td>"+
                "<td>" + data.created_at + "</td>"+
                "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-division_id='" +
                data.division_name + "' data-code='" +
                data.code + "' data-name='" +
                data.name + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-division_id='" +
                data.division_name + "' data-code='" +
                data.code + "' data-name='" +
                data.name + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm'data-id='" + data.id + "' data-division_id='" +
                data.division_name + "' data-code='" +
                data.code + "' data-name='" +
                data.name + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
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
        url: 'deleteDistrict',
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
    $('#id').text($(this).data('id'));
    $('#division_id').text($(this).data('division_name'));
    $('#code').text($(this).data('code'));
     $('#name').text($(this).data('name'));
    $('.modal-title').text('Show District');
  });
</script>

@endsection
