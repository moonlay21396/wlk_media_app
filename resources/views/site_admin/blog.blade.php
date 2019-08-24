@extends('layouts.site_admin.site_admin_design')
@section('css')
    <style>
        h1,h2,h3,h4,h5,h6,p{
            font-family:Pyidaungsu,Zawgyi-One;
        }
    </style>
@endsection

@section('title')
    Admin | Blog
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
                            <h4 class="card-title" style="float:left;">Blog Data List</h4>
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalBox">Create category</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="insert_category" class="md-form" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <input type="hidden" value="" name="cat_id">
                        
                        <div class="row">
                           <div class="col-md-12">
                           <div class="form-group">
                                <label for="cat_name" class="col-form-label">Name:</label><br>
                                <input type="text" class="form-control" id="cat_name" name="cat_name" required rows="1">
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 pull-right" id="btn_submit">Create</button>
                           </div>
                        </div>
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
                    <h4 class="modal-title">Change Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="update_category" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}

                    <input type="hidden" name="id" id="cat_id">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name:</label><br>
                        <textarea class="form-control" id="name" name="cat_name" rows="1"></textarea>
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

        // function reset(){
        //     $('#update_data')[0].reset();
        // }

        load();

        function load(){
            $.ajax({
                type: "get",
                url: "{{url('/admin/view_cat')}}",
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
                            '<button class="btn btn-info btn-sm" onclick="edit_cat('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>'+
                            '<button class="btn btn-danger btn-sm" onclick="delete_cat('+data_return[i]['id']+')">Delete</button>'
                            ]).draw(false);
                    }
                    $('#insert_category')[0].reset();
                }
            }).fail(function(error){
                console.log(error);
            });
        }
        

        $('#insert_category').on('submit',function(e){
            // alert("it work");
             e.preventDefault();
            var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('/admin/cat/insert')}}",
                    data: alldata,
                    cache:false,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        console.log(data);
                        $('#modalBox').modal('hide');
                        load();
                        toastr.success('Successful');
                        $("#insert_category")[0].reset();
                    }
                });
                    return false;
        });

       
        delete_cat=function(id){
        if(confirm('Are u want to delete!')){
            $.ajax({
                type: "POST",
                data: { "_method" : "delete"},
                url : "{{url('delete/cat')}}/"+id,
                cache: false,
                success:function(data){
                    load();
                    toastr.success('Delete successful');
                }
            })
        }
    }    

        edit_cat=function(id){
            $.ajax({
                url: "{{url('/admin/edit_cat')}}/"+id,
                type : "get",
                dataType : "json"
            }).done(function(response){
                // console.log(response);
                $("#cat_id").val(response.id);
                $("#name").val(response.name);
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