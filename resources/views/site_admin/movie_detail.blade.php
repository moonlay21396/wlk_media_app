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
    Admin | Movie Detail
@endsection

@section('nav_bar_text')
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                          <div class="table-responsive">
                                  <table class="table table-hovered">
                                    <tbody>
                                        <tr>
                                        <td><b>Name</b></td>
                                        <td>{{$movie_detail['name']}}</td>
                                      </tr>
                                      <tr>
                                          <td><b>Movie</b></td>
                                          <td>
                                              <video src="{{$movie_detail['movie']}}" width="200px;" controls></video>
                                          </td>
                                      </tr>
                                    <tr>
                                        <td><b>Photos</b></td>
                                        @foreach($movie_detail as $movie_img)
                                        <td><img src="{{$movie_img}}" width="200px;" height="250px;"></td>
                                        @endforeach
                                    </tr>
                                      <tr>
                                        <td><b>Actor</b></td>
                                        <td>{{$movie_detail['actor']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Actress</b></td>
                                        <td>{{$movie_detail['actress']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Director</b></td>
                                        <td>{{$movie_detail['director']}}</td>
                                      </tr>
                            
                                      <tr>
                                        <td><b>Running Time</b></td>
                                        <td>{{$movie_detail['running_time']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Released Year</b></td>
                                        <td>{{$movie_detail['released_year']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Company</b></td>
                                        <td>{{$movie_detail['company_id']}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                          </div>
                    </div>
                  </div>
            </div>
        </div>

    </div>
@endsection