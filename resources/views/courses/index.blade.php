@extends('layouts.base')

@section('content')

    <div style="margin-bottom: 12px">
        <a role="button" class="btn btn-primary" href="{{ route('courses.create') }}">Adicionar</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="course-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <th>{{ $course->id }}</th>
                            <th>{{ $course->nome }}</th>
                            <th>{{ $course->data_inicio->format('d/m/Y') }}</th>
                            <th>
                                <a role="button" class="btn btn-sm btn-secondary" href="{{route('courses.edit',['course' => $course->id])}}">editar</a>
                                <button type="button" class="btn btn-sm btn-danger" href="#"
                                    onclick="deletecourse({{ $course->id }})">deletar</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include("courses._delete")
@stop

@section('script')
    <script>
        $(document).ready(function() {
            $('#course-table').DataTable();
        });

        function deletecourse(id) {
            const form = $("#delete-form");
            form.attr("action", "/courses/"+id);
            form.submit();
        }

    </script>
@endsection
