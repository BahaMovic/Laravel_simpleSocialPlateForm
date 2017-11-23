@extends("layouts.app")

@section("header")
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://use.fontawesome.com/b3e2d83542.js"></script>
<script>
    $(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
</script>
<style>
@font-face {
    font-family: HARRP;
    src: url(/fonts/HARRP___.TTF);
}
</style>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection
@section('content')
<div container>
<div class="col-lg-10 col-sm-10" style="margin-top: -30px; margin-left: 8%">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="\{{$user->image}}">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="\{{$user->image}}">
               @if(Auth::user() && Auth::user()->id == $user->id)
                <form action="{{URL::to('/edit/photo')}}"/edit/photo" method="post" files="true" style="margin-top:-20px ; margin-left: 80%; index-z:1212"  enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="file" name="image" id="file" class="inputfile" />
                <label for="file" style="padding:4px">edit photo</label>
                <input type="submit"  name="submit"  value="update" style="background:#119;color:white;width:80px ;border:0px;height:37px;margin:-14px 0px 0px 0px" />
                
            </form>
            @endif
            
        </div>
        <div class="card-info"> <span class="card-title">{{$user->name}}</span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="fa fa-user" aria-hidden="true"></span>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="fa fa-info" aria-hidden="true"></span>
                <div class="hidden-xs">About</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="fa fa-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Hobbies</div>
            </button>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
            <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>

              <h3 class="box-title">Chat</h3>

              
            </div>
            <div class="box-footer">
              <div class="input-group">
          <form action="{{URL::to('/Add/post')}}" method="post">
                        {!! csrf_field() !!}
            <div class="box-footer">
              <div class="input-group">
              
                <input name="text" style="width: 1000px" class="form-control" placeholder="Type message...">
                       <select name="cat_id" style="height: 35px">
                        <option value="1">sport</option>
                        <option value="2">Art</option>
                        <option value="3">Education</option>
                    </select>

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
               
              </div>
            </div>
              </form>
              </div>
            </div>
            <br><br>
            <div class="box-body chat" id="chat-box">
              <!-- chat item -->
              @foreach($posts as $post)
              <div class="item">
                <img src="\{{$post->user->image}}" alt="user image" class="online">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>{{$post->created_at}}</small>
                    {{$post->user->name}}
                  </a>
                  {{$post->text}}
                </p>
                <div class="attachment">
                  <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">{{$user->name}}</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="\{{$user->image}}" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Working with AdminLTE on a great new app! Wanna join?
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                  <div class="input-group">
                <input class="form-control" placeholder="Type message...">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
              </div>

                </div>
                <!-- /.attachment -->
              </div>
              <hr>
              @endforeach
        
            </div>
      
         
          </div>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3>This is tab 2</h3>
        </div>
        <div class="tab-pane fade in" id="tab3">
          <h3>This is tab 3</h3>
        </div>
      </div>
    </div>
    
    </div>
            
    
</div>
@endsection