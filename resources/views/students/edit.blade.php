@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('students._form',[
                'isUpdate' => true,
                'student' => $student,
                'method' => 'POST',
                'action' => route('students.update', ['student' => $student->id])
            ])
        </div>
    </div>
@stop
