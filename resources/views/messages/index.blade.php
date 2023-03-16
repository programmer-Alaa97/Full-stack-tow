
@extends('include.master')

@section('title')
message
@stop

@section('css')

@endsection

@section('header-name')
All The Details
@endsection

@section('button-name')

@endsection


@section('content')
  

      <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                          </div>
                           @if ($messages->count() > 0)

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>sender name</th>
                                            <th>recipient name</th>
                                            <th>password</th>
                                            <th>photo</th>
                                            <th>time</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      @php
                                      $i = 1;
                                     @endphp
                                @foreach ($messages as $key=>$value)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $value->send_user->name }}</td>
                                            <td>{{ $value->rev_user->name }}</td>
                                            <td type="password">{{ $value->password }}</i></td>
                                            <td><img src="{{$value->photo}}"  class="img-thumbnail" width="100px" height="100px"></td>
                                            <td>{{ $value->created_at->diffForHumans()}}</td>
                                          
                                        </tr>
                                @endforeach
                                    </tbody>
                                </table>
                                     

                            </div>
                        </div>
                    </div>
                     @else
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        no messages
                    </div>
                </div>
                @endif

                
                            {!! $messages->links() !!}
                            

                </div>
                <!-- /.container-fluid -->
@endsection

@section('js')

@endsection


{{--  <i class="fas fa-eye">  --}}