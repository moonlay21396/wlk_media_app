@extends('layouts.site_admin.site_admin_design')
@section('css')
    <style>
        h1,h2,h3,h4,h5,h6,p{
            font-family:Pyidaungsu,Zawgyi-One;
        }
        .imagePreview {
            width: 100%;
            height: 150px;
            background-position: center center;
            background:url('http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
        }
        .upload_btn
        {
            display:block;
            border-radius:0px;
            box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
            margin-top:-5px;
            margin-bottom: 15px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
    </style>
@endsection

@section('title')
    Admin | Movie
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
                            <h4 class="card-title" style="float:left;">Movie List</h4>
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalBox">Create Movie</button>
                            <!-- <p class="card-category"></p> -->
                        </div>
                        
                        <div class="card-body row image_data">
                           <!-- image data show --> 
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Movie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="insert_movie" class="md-form" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}          
                        <div class="row">
                           <div class="col-md-12">
                           <div class="form-group">
                                <label class="col-form-label">Name:</label><br>
                                <input type="text" class="form-control" name="name" required rows="1">
                            </div>
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                {{-- <img src="{{asset('images/default.jpg')}}" class="imagePreview" id="movie" style="width: 100%;height: 150px;">
                                <label class="btn btn-md btn-primary container-fluid rounded-0 m-0" for="upload_movie">Upload Movie</label>
                                <input type="file" style="display:none;" id="upload_movie" name="movie" required class="form-control package_photo" onchange="displaySelectedPhoto('upload_movie','movie')"> --}}
                                <label class="col-form-label">Movie:</label><br>
                                <input type="file" accept="video/mp4" name="movie" required rows="1">
                            </div>
                        </div><br>
                         <div class="row">
                            <div class="col-md-12 mx-auto">
                                <label class="col-form-label">Photos:</label><br>
                                <input type="file" name="photos[]" required rows="1" multiple="multiple">
                            </div>
                        </div><br>
                            <div class="form-group">
                                <label class="col-form-label">Actor:</label><br>
                               <input list="actors" class="form-control" name="actor">
                                <datalist id="actors">
                                    @foreach ($stars as $star)
                                       <option value="{{$star->name}}"> 
                                    @endforeach                            
                                </datalist> 
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Actress:</label><br>
                               <input list="actresses" class="form-control" name="actress">
                                <datalist id="actresses">
                                    @foreach ($stars as $star)
                                       <option value="{{$star->name}}"> 
                                    @endforeach                            
                                </datalist> 
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Director:</label><br>
                               <input list="directors" class="form-control" name="director">
                                <datalist id="directors">
                                    @foreach ($stars as $star)
                                       <option value="{{$star->name}}"> 
                                    @endforeach                            
                                </datalist> 
                            </div>             
                            <div class="form-group">
                                <label class="col-form-label">Running Time:</label><br>
                                <input type="text" class="form-control" name="running_time" required rows="1">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Released Year:</label><br>
                                <input type="text" class="form-control" name="released_year" required rows="1">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Company:</label><br>
                                <select name="company" class="form-control">
                                    @foreach ($company as $com)
                                       <option value="{{$com->id}}">{{$com->name}}</option>
                                    @endforeach   
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 pull-right" id="btn_submit">Create</button>
                           </div>
                        </div>
                    </div>
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
                    <h4 class="modal-title">Change Movie</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="update_movie" class="md-form" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}          
                        <div class="row">
                           <div class="col-md-12">
                            <input type="hidden" id="id" name="id">
                           <div class="form-group">
                                <label class="col-form-label">Name:</label><br>
                                <input type="text" class="form-control" id="name" name="name" required rows="1">
                            </div>
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                {{-- <img src="{{asset('images/default.jpg')}}" class="imagePreview" id="movie" style="width: 100%;height: 150px;">
                                <label class="btn btn-md btn-primary container-fluid rounded-0 m-0" for="upload_movie">Upload Movie</label>
                                <input type="file" accept="video/mp4" style="display:none;" id="upload_movie" name="movie" required class="form-control package_photo"> --}}
                                <label class="col-form-label">Movie:</label><br>
                                <input type="file" accept="video/mp4" id="movie" name="movie" rows="1">
                            </div>
                        </div><br>
                         {{-- <div class="row">
                            <div class="col-md-12 mx-auto">
                                <label class="col-form-label">Photos:</label><br>
                                <input type="file" id="photos" name="photos[]" required rows="1" multiple="multiple">
                            </div>
                        </div><br> --}}
                            <div class="form-group">
                                <label class="col-form-label">Actor:</label><br>
                               <input list="actors" class="form-control" id="actor" name="actor">
                                <datalist id="actors">
                                    @foreach ($stars as $star)
                                       <option value="{{$star->name}}"> 
                                    @endforeach                            
                                </datalist> 
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Actress:</label><br>
                               <input list="actresses" id="actress" class="form-control" name="actress">
                                <datalist id="actresses">
                                    @foreach ($stars as $star)
                                       <option value="{{$star->name}}"> 
                                    @endforeach                            
                                </datalist> 
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Director:</label><br>
                               <input list="directors" id="director" class="form-control" name="director">
                                <datalist id="directors">
                                    @foreach ($stars as $star)
                                       <option value="{{$star->name}}"> 
                                    @endforeach                            
                                </datalist> 
                            </div>             
                            <div class="form-group">
                                <label class="col-form-label">Running Time:</label><br>
                                <input type="text" id="running_time" class="form-control" name="running_time" required rows="1">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Released Year:</label><br>
                                <input type="text" id="released_year" class="form-control" name="released_year" required rows="1">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Company:</label><br>
                                <select name="company" id="company" class="form-control">
                                    @foreach ($company as $com)
                                       <option value="{{$com->id}}">{{$com->name}}</option>
                                    @endforeach   
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 pull-right" id="btn_submit">Update</button>
                           </div>
                        </div>
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

          imageUpload();

        // image upload data
        function imageUpload(){
                $(".image_data").empty();
                $.ajax({
                      url : "{{url('/admin/view_movie')}}",
                      type : "get",
                      dataType : "json"
                  }).done(function(response){
                        //  console.log(response);
                      $.each(response,function(index,data){
                        // console.log(data);
                        var detail="{{url('/admin/movie/detail/')}}/"+data.id;   
                        var id=data.id;
                        var image=data.movie_photo;
                        var link=data.name;
                        // console.log(image);
                        $(".image_data").append('<div class="col-md-4 upload_image" data-id="'+id+'"><div class="card"><img src="'+image+'" class="imagePreview" style="width:100%;height:200px;"><p>Movie Name : '+link+'</p>'+
                        '<div class="row action_'+id+'"><div class="col-md-4"><button class="btn btn-outline-info btn-sm rounded-0 image_edit" data-toggle="modal" data-target="#edit_modalBox" onclick="edit_movie('+id+')" data-id="'+id+'">Edit</button></div>'+
                        // '<div class="col-md-4"><button data-id="'+detail+'" class="btn btn-success rounded-0 btn-sm">Detail</button></div>'+
                        '<a href="'+detail+'" class="btn btn-primary rounded-0 btn-sm">Detail</a>'+
                        '<div class="col-md-4"><button data-id="'+id+'" class="btn btn-danger rounded-0 float-right btn-sm image_delete" onclick="">Delete</button></div></div></div></div>');          
                      });
                      $('#insert_movie')[0].reset();
                  }).fail(function(error){
                      console.log(error);
                  });
            }
      
        $(document).on('mouseover','.upload_image',function(e){
              let id=$(this).data('id');
              $(".action_"+id).animate({opacity: '1'}, "slow").show();
            });

        $(document).on('mouseout','.upload_image',function(e){
              let id=$(this).data('id');
              $(".action_"+id).animate({opacity: '1'}, "slow").hide();
            });

        $('#insert_movie').on('submit',function(e){
            // alert("it work");
             e.preventDefault();
            var alldata = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/movie/insert')}}",
                    data: alldata,
                    cache:false,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        // console.log(data);
                        $('#modalBox').modal('hide');
                        imageUpload();
                        toastr.success('Successful');
                        $("#insert_movie")[0].reset();
                    }
                });
                    return false;
        });

        edit_movie=function(id){
            $.ajax({
                url: "{{url('/admin/edit_movie')}}/"+id,
                type : "get",
                dataType : "json"
            }).done(function(response){
                // console.log(response);
                $("#id").val(response.id);
                $("#name").val(response.name);
                $("#movie").attr('src',response.movie);
                // $("#photos").attr('src',response.movie_photo);
                $("#actor").val(response.actor);
                $("#actress").val(response.actress);
                $("#director").val(response.director);
                $("#running_time").val(response.running_time);
                $("#released_year").val(response.released_year);
                $("#company").val(response.company_id);
            }).fail(function(error){
                console.log(error);
            });
        }

         $('#update_movie').on('submit',function(e)
        {        
            e.preventDefault();
            var form_data=new FormData(this);
            $.ajax({
                url : "{{url('/admin/update_movie')}}",
                type : "post",
                data : form_data,
                processData:false,
                contentType:false,
            }).done(function(response){
               console.log(response);
                if(response){
                    imageUpload();
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