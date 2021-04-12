@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('enrollments._form',[
                'isUpdate' => true,
                'enrollment' => $enrollment,
                'students' => $students,
                'courses' => $courses,
                'method' => 'POST',
                'action' => route('enrollments.update', ['enrollment' => $enrollment->id])
            ])
        </div>
    </div>
@stop
