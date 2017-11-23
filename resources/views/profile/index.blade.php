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
           @if(Auth::user() && Auth::user()->id == $user->id)
                <form action="{{URL::to('/edit/photo')}}"/edit/photo" method="post" files="true" style="margin-top:-20px ; index-z:1212"  enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="file" name="image" id="file" class="inputfile" />
                <label for="file" style="padding:4px">edit photo</label>
                <input type="submit"  name="submit"  value="update" style="background:#119;color:white;width:80px ;border:0px;height:37px;margin:-14px 0px 0px 0px" />
                
            </form>
            @endif
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