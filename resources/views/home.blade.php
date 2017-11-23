@extends('layouts.app')

@section('header')
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://use.fontawesome.com/b3e2d83542.js"></script>
<style type="text/css">
    @font-face {
    font-family: HARRP;
    src: url(/fonts/HARRP___.TTF);
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All News</div>

                      <div class="box-body chat" id="chat-box">
              <!-- chat item -->
              @foreach($posts as $post)
              <div class="item">
                <img src="\{{$post->user->image}}" alt="user image" class="online">

                <p class="message">
                  <a href="{{url('profile/'.$post->user->id)}}" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>{{$post->created_at}}</small>
                    <small class="text-muted pull-right" style="margin-right: 10px">{{$post->cat->text}}</small>
                    {{$post->user->name}}
                  </a>
                  {{$post->text}}
                </p>

                <!-- Commente start here -->
                <div class="attachment">
                  <h5 style="margin: 0 ; padding: 0">comments</h5>
                <hr>
                <div id="com_{{$post->id}}">
                @foreach($post->comments as $comment)
                  <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">{{$comment->user->name}}</span>
                        <span class="direct-chat-timestamp pull-right">{{$comment->created_at}}</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="\{{$comment->user->image}}" alt="user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        {{$comment->text}}
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <hr>
                @endforeach
              </div>
                @if(!Auth::guest())
              
                  <div class="input-group">
                <input name="text" id="text_{{$post->id}}" class="form-control" placeholder="Type Comment...">
                <div class="input-group-btn">
                <button type="submit" post_id="{{$post->id}}" class="postComment btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
              </div>
             
              @endif

                </div>
                <!-- /.attachment -->
              </div>
              <hr>
              @endforeach
        
            </div>
            </div>
        </div>
    </div>
</div>

<script>
  $(".postComment").click(function(){

                    var post_id = $(this).attr("post_id");
                    var text= $("#text_"+post_id).val();
                  
                    $.ajax({
                      type: 'post',
                      url: "{{url('/add/comment')}}",
                      data:"post_id="+post_id+"&text="+text+"&_token={{csrf_token()}}",
                      success: function( data ){
                                $("#text_"+post_id).val("");
                                $("#com_"+post_id).append(data);
                            }
                      
                  });

                  });
</script>

@endsection
