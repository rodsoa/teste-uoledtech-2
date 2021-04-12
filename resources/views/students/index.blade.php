@extends('layouts.base')

@section('content')
    <div style="margin-bottom: 12px">
        <a role="button" class="btn btn-primary" href="{{ route('students.create') }}">Adicionar</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="student-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <th>{{ $student->id }}</th>
                            <th>{{ $student->nome }}</th>
                            <th>{{ $student->email }}</th>
                            <th>
                                <a role="button" class="btn btn-sm btn-secondary"
                                    href="{{ route('students.edit', ['student' => $student->id]) }}">editar</a>
                                <button type="button" class="btn btn-sm btn-danger" href="#"
                                    onclick="deleteStudent({{ $student->id }})">deletar</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include("students._delete")
@stop

@section('script')
    <script>
        $(document).ready(function() {
            $('#student-table').DataTable();
        });

        function deleteStudent(id) {
            const form = $("#delete-form");
            form.attr("action", "/students/" + id);
            form.submit();
        }

    </script>
@endsection
