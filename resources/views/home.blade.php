@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('msg'))
    <p>{{session('msg')}}</p>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>




                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  Friends
@livewire('friends')
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


@livewire('post')
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
