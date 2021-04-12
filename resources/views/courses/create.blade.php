@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('courses._form',[
                'isUpdate' => false,
                'course' => false,
                'method' => 'POST',
                'action' => route('courses.store')
            ])
        </div>
    </div>
@stop
