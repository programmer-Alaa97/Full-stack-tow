@extends('include.master')

@section('title')
message
@stop

@section('css')

@endsection

@section('header-name')
Message
@endsection

@section('button-name')

@endsection

@section('content')


  
      


 <div class="container">
  
    <div class="card">
      <div class="card-header bg-secondary text-white" style="background-color: #3c63d2b8!important;border-color: #3c63d2b8!important">Content of message</div>

      <ul class="list-group list-group-flush" style="color:#423737fc;font-size: 17px;">
        <li class="list-group-item">
          <span class="span-1" style="color: #3f65d4;font-weight: 500;font-size: 20px;font-family:Segoe UI Symbol">From : </span>
          {{$message->send_user->name}}
        </li>

        <li class="list-group-item">
          <span class="span-1" style="color: #3f65d4;font-weight: 500;font-size: 20px;font-family:Segoe UI Symbol">To : </span> 
          {{$message->rev_user->name}}
        </li>

        <li class="list-group-item">
          <span class="span-1" style="color: #3f65d4;font-weight: 500;font-size: 20px;font-family:Segoe UI Symbol">Content message : </span> 
            {{$message->msg_content}}
        </li>

        <li class="list-group-item">
          <span class="span-1" style="color: #3f65d4;font-weight: 500;font-size: 20px;font-family:Segoe UI Symbol"> Photo : </span> 
            <img height= "7%" width= "141%"  src="{{asset($message->photo)}}"/></br>
        </li>
        
      </ul>
    </div>
    </div>
    
  <style>
            img {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 40%;
            }

            .span-1 {
                
                margin-right:10px;
            }
            </style>
 
 </div>
 </div>
@endsection


@section('js')

@endsection
