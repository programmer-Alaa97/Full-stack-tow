
@extends('include.master')

@section('title')
usres
@stop

@section('css')

@endsection

@section('header-name')
All Users
@endsection

{{--  @section('button-name')
Create new user
@endsection  --}}


@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h3 class="display-4" style='font-size: 2rem; margin-bottom: 35px;'>All Users  </h3>
                    <a class="btn btn-primary" href="{{ route('user.create') }}">Create new user </a>
                </div>
            </div>
        </div>


      <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                          </div>
                           @if ($users->count() > 0)

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Make admin</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      @php
                                      $i = 1;
                                     @endphp
                                @foreach ($users as $item)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{$item->name}} </td>
                                            <td>{{ $item->email }}</td>

                                            <td> 
                                             
                                                @if ($item->admin)
                                                <a class="" href="{{route('user.not.admin',['id' => $item->id])}}">
                                                         admin
                                                </a>
                                                @else
                                                    
                                                    <a class="" href="{{route('user.admin',['id' => $item->id])}}">
                                                            not admin
                                                    </a>
                                                @endif
                                            </td>




                                            <td> <a class="text-danger"
                                                href="{{ route('user.destroy', ['id' => $item->id]) }}"> <i
                                                class="fas  fa-2x fa-trash-alt"></i> </a></td>
                                          
                                        </tr>
                                @endforeach
                                    </tbody>
                                </table>

                                {!! $users->links() !!}
                            </div>
                        </div>
                    </div>
                     @else
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                          No Users
                    </div>
                </div>
                @endif

                </div>
                <!-- /.container-fluid -->
@endsection

@section('js')

@endsection