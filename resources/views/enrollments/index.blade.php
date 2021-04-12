@extends('layouts.base')

@section('content')
    <div style="margin-bottom: 12px">
        <a role="button" class="btn btn-primary" href="{{ route('enrollments.create') }}">Adicionar</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="enrollments-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Curso</th>
                        <th>Aluno</th>
                        <th>Início</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enrollments as $enrollment)
                        <tr
                            @if (!$enrollment->ativo) class="bg-danger" @endif
                        >
                            <td>{{ $enrollment->id }}</td>
                            <td>{{ $enrollment->student->nome}}</td>
                            <td>{{ $enrollment->course->nome }}</td>
                            <td>{{ $enrollment->course->data_inicio->format('d/m/Y') }}</td>
                            <td>
                                <a role="button" class="btn btn-sm btn-secondary" href="{{route('enrollments.edit',['enrollment' => $enrollment->id])}}">editar</a>
                                <button type="button" class="btn btn-sm btn-danger" href="#"
                                    onclick="deletecourse({{ $enrollment->id }})">deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include("enrollments._delete")
@stop

@section('script')
    <script>
        $(document).ready(function() {
            $('#enrollments-table').DataTable();
        });

        function deletecourse(id) {
            const form = $("#delete-form");
            form.attr("action", "/enrollments/"+id);
            form.submit();
        }

    </script>
@endsection
