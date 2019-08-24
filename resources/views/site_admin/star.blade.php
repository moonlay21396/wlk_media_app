@extends('layouts.site_admin.site_admin_design')
@section('css')
    <style>
        h1,h2,h3,h4,h5,h6,p{
            font-family:Pyidaungsu,Zawgyi-One;
        }
    </style>
@endsection

@section('title')
    Admin | Star Manage
@endsection

@section('nav_bar_text')
@endsection
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
   

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="margin-top:-70px;">
                    {{-- <button type="button" class="btn btn-primary pull-left rounded-0" data-toggle="modal" data-target="#modalBox"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Create Blog</button><br><br> --}}
                    <div class="card">
                        <div class="card-header card-header-primary" >
                            <h4 class="card-title" style="float:left;">Star List</h4>
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalBox">Create Star</button>
                            <!-- <p class="card-category"></p> -->
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead class=" text-primary">
                                    <th width="10%">
                                        NO
                                    </th>
                                    <th width="20%">
                                        Name
                                    </th>
                                    <th width="20%">
                                        Position
                                    </th>
                                    <th width="30%">Action</th>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--****************start model--}}  
    <div class="modal fade" id="modalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Star</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="insert_star" class="md-form" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <input type="hidden" value="" name="cat_id">
                        
                        <div class="row">
                           <div class="col-md-12">
                           <div class="form-group">
                                <label for="" class="col-form-label">Name:</label><br>
                                <input type="text" class="form-control" id="" name="star_name" required rows="1">
                            </div>
                            
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Skills / Talents</label>
                            </div>
                            
                            @foreach ($position as $data)
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="position[]" class="custom-control-input" id="customCheck{{$data->id}}" value="{{$data->id}}">
                                        <label class="custom-control-label" for="customCheck{{$data->id}}">{{$data->name}}</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                
                        </div>
                        <button type="submit" class="btn btn-primary rounded-0 pull-right" id="btn_submit">Create</button>
                    </div>
                    {{-- <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                         
                        <!-- <input type="submit" value="Create" class="btn btn-success"> -->
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
    {{--**********************end model--}}

           <!-- Edit Modal -->
    <div class="modal" id="edit_modalBox">
         <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Change Star</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="update_category" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}
                    {{-- <input type="text" name="name" id="star_name"> --}}

                    <input type="text" name="id" id="star_id">
                    <div class="form-group">
                        <label for="star_name">Name:</label><br>
                        <input type="text" value="" class="form-control" name="name" id="star_name">
                    </div> 
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Skills / Talents</label>
                        </div>
                        
                        @foreach ($position as $data)
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="position[]" class="custom-control-input" id="customCheck{{$data->id}}" value="{{$data->id}}">
                                    <label class="custom-control-label" for="customCheck{{$data->id}}">{{$data->name}}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            
                    </div>            
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <input type="submit" class="btn btn-info rounded-0" value="Change">
                    </div>
                </form>

            </div>
        </div>
    </div>
        <!--End of Edit Modal -->

    </div>
@endsection

@section('js')
    <script>
    removeShowEntryOnDataTable("datatable");
         $(document).ready(function(){
        var t = $("#datatable").DataTable();

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        function reset(){
            $('#update_data')[0].reset();
        }

        load();

        function load(){
            $.ajax({
                type: "get",
                url: "{{url('/admin/view_star')}}",
                cache:false,
                success:function(data){
                    // console.log(data);
                    var data_return = JSON.parse(data);
                    // console.log(data_return);
                    t.clear();
                    for(var i = 0; i<data_return.length; i++){
                        t.row.add([
                            i+1,
                            data_return[i]['name'],
                            data_return[i]['position'],
                            '<button class="btn btn-info btn-sm" onclick="edit_star('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>'+
                            '<button class="btn btn-danger btn-sm" onclick="delete_star('+data_return[i]['id']+')">Delete</button>'
                            ]).draw(false);
                    }
                    $('#insert_star')[0].reset();
                }
            }).fail(function(error){
                console.log(error);
            });
        }
        

        $('#insert_star').on('submit',function(e){
            // alert("it work");
             e.preventDefault();
            var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('/admin/star/insert')}}",
                    data: alldata,
                    cache:false,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        console.log(data);
                        $('#modalBox').modal('hide');
                        load();
                        toastr.success('Successful');
                        $("#insert_star")[0].reset();
                    }
                });
                    return false;
        });

       
        delete_star=function(id){
        if(confirm('Are you want to delete!')){
            $.ajax({
                type: "POST",
                data: { "_method" : "delete"},
                url : "{{url('delete/star')}}/"+id,
                cache: false,
                success:function(data){
                    //console.log(data);
                    load();
                    toastr.success('Delete successful');
                }
            })
        }
    }    

        edit_star=function(id){
            $.ajax({
                url: "{{url('/admin/edit_star')}}/"+id,
                type : "get",
                dataType : "json"
            }).done(function(response){
                //console.log(response);
                
                $("#star_name").val(response.name);
                if (response.position == "Director,Script Writer") {
                    $("#customCheck3").attr('checked',true);
                    //$("#star_id").val(response.id);
                }
            }).fail(function(error){
                console.log(error);
            });
        }

        $('#update_category').on('submit',function(e)
        {        
            e.preventDefault();
            var form_data=new FormData(this);
            $.ajax({
                url : "{{url('/admin/update_cat')}}",
                type : "post",
                data : form_data,
                processData:false,
                contentType:false,
            }).done(function(response){
                if(response){
                    load();
                    $("#edit_modalBox").modal('hide');
                    toastr.success('Update successful');
                }
            }).fail(function(error){
                console.log(error);
            });
        });

    
            });
    </script>

@endsection