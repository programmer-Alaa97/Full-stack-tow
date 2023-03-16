@extends('include.master')

@section('title')
message REC
@stop

@section('css')
@stack('scripts') 
@livewireScripts
@endsection

@section('header-name')
All The Details
@endsection

@section('button-name')

@endsection


@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                {{--  <livewire:massege-rec/>    --}}
                @livewire('massege-rec')

            </div>
        </div>
    </div>
</div>
<!-- row closed -->


</div>
 
@endsection

@section('js')

@endsection



