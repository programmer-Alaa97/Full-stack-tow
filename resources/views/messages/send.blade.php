
@extends('include.master')

@section('title')
Submission
@stop

@section('css')

@endsection

@section('header-name')
 <div class="container" >
      @if ($message = Session::get('success'))
      <div class="alert alert-success" role="alert">
        <button class="close" type="button" data-dismiss="alert" style="margin: 6px 0px 10px 10px;">
          <i class="fa fa-times"></i>

          
        </button>
     <span>{{$message}}</span>
      </div>
        
      @endif

  </div>
@endsection

@section('content')


 

    <div class="container" >

         @if (count($errors) > 0)

           <ul class="navbar-nav mr-auto">
              @foreach ($errors->all() as $error )
                  <li class="nav-item active">
                      {{$error}}
                  </li>
              @endforeach
           </ul>
           @endif
        <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="exampleFormControlInput1"> The sender name</label>
                <input type="text" name="sender_name" class="form-control"
                 placeholder="Enter the sender name"
                value="{{Auth()->user()->name}}" disabled>
            </div>


            <div class="form-group">
                <label for="resaver_name">{{ ' The recipient name ' }}:<span class="text-danger">*</span></label>
                <select class="custom-select mr-sm-2" name="resaver_name">
                    <option selected disabled >{{ 'Enter the recipient name' }}...</option>
                    @foreach ($users as $user)
                        @if ($user->id != Auth()->user()->id)
                            <option value="{{ $user->id }}" >{{ $user->name }}</option>
                        @endif

                    @endforeach
                </select>
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">content  </label>
              <textarea class="form-control"  name="msg_content"   rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                <input id="password" type="password" class="form-control form-control-user" 
                placeholder="Enter Password"name="password">
               

            </div>


            <div class="form-group">
                <label for="photo">Add photo </label>
                <input type="file" class="form-control-file" name="photo" style="text-align: end" placeholder="choose photo"  >
            </div>

            <div class="form-group">
           
                <button type="submit" class="btn btn-primary">send</button>

            </div>



        </form>
    </div>
@endsection

@section('js')

@endsection
