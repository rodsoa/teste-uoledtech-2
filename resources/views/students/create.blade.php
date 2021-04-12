@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('students._form',[
                'isUpdate' => false,
                'student' => false,
                'method' => 'POST',
                'action' => route('students.store')
            ])
        </div>
    </div>
@stop
