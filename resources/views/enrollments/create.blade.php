@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('enrollments._form',[
                'isUpdate' => false,
                'enrollment' => false,
                'students' => $students,
                'courses' => $courses,
                'method' => 'POST',
                'action' => route('enrollments.store')
            ])
        </div>
    </div>
@stop
