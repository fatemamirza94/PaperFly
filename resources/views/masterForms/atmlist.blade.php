@extends('layouts.index')
@section('content')
<!DOCTYPE html>
<html>
<div class="row">
    <div class="col-md-12">
        <h1>Atm Input</h1>
    </div>
</div>

<div class="row">
    <div class="table table-responsive">
        <table class="table table-bordered" id="table">
            <tr>

                <th width="150px">No</th>
                <th>District Name</th>
                <th>Thana Name</th>
                <th>Bank Name</th>
                <th>Address</th>
                <th>Create At</th>
                <th class="text-center" width="150px">
                    <a href="#" class="create-modal btn btn-success btn-sm">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </th>
            </tr>
            {{ csrf_field() }}
            <?php  $no=1; ?>
            @foreach ($atm as $atm)
            <tr class="post{{$atm->id}}">
                <td>{{ $no++ }}</td>
                    <td>{{ $atm->district->name}}</td>
                <td>{{$atm->thana->name}}</td>
                <td>{{ $atm->bank->name}}</td>
                <td>{{ $atm->address}}</td>
                <td>{{ $atm->created_at}}</td>
                <td>
                    <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$atm->id}}" data-district_id="{{$atm->district->name}}" data-thana_id="{{$atm->thana->name}}" data-bank_id="{{$atm->bank->name}} data-address="{{$atm->address}}" >
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="#" class="edit-modal btn btn-warning btn-sm"  data-id="{{$atm->id}}" data-district_id="{{$atm->district->name}}" data-thana_id="{{$atm->thana->name}}" data-bank_id="{{$atm->bank->name}} data-address="{{$atm->address}}" >
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$atm->id}}" data-district_id="{{$atm->district->name}}" data-thana_id="{{$atm->thana->name}}" data-bank_id="{{$atm->bank->name}} data-address="{{$atm->address}}">
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
                <form action="{{route('addAtm')}}" method="POST" class="form-horizontal" role="form" id="addatm">
                     {{ csrf_field() }}
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="division_id">Division Name:</label>
                        <div class="col-sm-10">
                            <select name="district_id" id ="district_id" class="selectdistrict">
                                <option value="">--Select district--</option>
                               @foreach($atmdistrict as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     <div class="form-group row add">
                        <label class="control-label col-sm-2" for="thana_id">Thana Name:</label>
                        <div class="col-sm-10">
                            <select name="thana_id" class="thananame" id ="thana_id" >
                         <option value="0" disabled="true" selected="true">Thana Name</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group row add">
                        <label class="control-label col-sm-2" for="bank_id">Bank Name:</label>
                        <div class="col-sm-10">
                            <select name="bank_id" id ="bank_id" class="form-control">
                                <option value="">--Select Bank--</option>
                               @foreach($atmbank as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="address" >Address :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" autocomplete="off"
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

@endsection
@section('js')



<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    }
});

    $(document).ready(function(){

        $(document).on('change','.selectdistrict',function(){
         console.log("hmm its change");

            var district_id=$(this).val();
             console.log(district_id);
            var div=$(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('findThanaName')!!}',
                data:{'id':district_id},
                success:function(data){
                    console.log('success');

                    console.log(data);

                    //console.log(data.length);
                    op+='<option value="0" selected disabled>chose thana</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    console.log(data[i].name);
                   }

                  $("#thana_id").html(op);
                 //  console.log(  div.find('.name').html(" "));
                
                },
                error:function(){
                        console.log('error');
                }
            });
        });

    });
 

    $(document).on('click','.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add ATM');
    });
    $('#addatm').on('submit',function(e){
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
            "<td>" + data.district_name + "</td>"+
            "<td>" + data.thana_name + "</td>"+
            "<td>" + data.bank_name + "</td>"+
            "<td>" + data.address + "</td>"+
            "<td>" + data.created_at + "</td>"+
            "<td><button class='show-modal btn btn-info btn-sm' data-id='"+ data.id + "' data-district_id='" +
             data.district_name + "' data-thana_id='" +
             data.thana_name + "'data-bank_id='" +
             data.bank_name + "' data-address='" +
             data.address + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id +"' data-district_id.name='" +
             data.district_name + "' data-thana_id.name='" +
             data.thana_name + "'data-bank_id.name='" +
             data.bank_name + "' data-address='" +
             data.adress + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm'  data-id='" + data.id + "' data-district_name='" +
             data.district_name + "'data-thana_name='" +
             data.thana_name + "' data-bank_name='" +
             data.bank_name + "'  data-address='" +
             data.address + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
            "</tr>");
    }
        });
    });
</script>
  </html> 

@endsection
