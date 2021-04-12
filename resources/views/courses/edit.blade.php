@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('courses._form',[
                'isUpdate' => true,
                'course' => $course,
                'method' => 'POST',
                'action' => route('courses.update', ['course' => $course->id])
            ])
        </div>
    </div>
@stop
