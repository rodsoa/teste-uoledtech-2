<form action="{{ $action }}" method="{{ $method }}">
    @csrf
    @if ($isUpdate)
        @method('PUT')
    @endif

    @if (!$isUpdate)
        <input type="hidden" name="ativo" value="1">
    @endif

    @if ($isUpdate)
        <label for="ativo">Ativo</label>
        <select class="form-control" id="ativo" name="ativo" required>
            <option value="1" @if (optional($enrollment)->ativo == 1) selected @endif>
                Ativo
            </option>
            <option value="0" @if (optional($enrollment)->ativo == 0) selected @endif>
                Inativo
            </option>
        </select>
    @endif

    <div class="form-group">
        <label for="aluno_id">Aluno</label>
        <select class="form-control" id="aluno_id" name="aluno_id" required>
            <option>Selecione um opção...</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}" @if (optional($enrollment)->aluno_id == $student->id) selected @endif>
                    {{ $student->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="curso_id">Curso</label>
        <select class="form-control" id="curso_id" name="curso_id">
            <option>Selecione um opção...</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}" @if (optional($enrollment)->curso_id == $course->id) selected @endif>
                    {{ $course->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="float-right">
        <a type="button" class="btn btn-danger" href="{{ route('enrollments.index') }}">
            Cancelar
        </a>
        <button type="submit" class="btn btn-sucess">
            @if ($isUpdate)
                Atualizar dados
            @else
                Salvar dados
            @endif
        </button>
    </div>
</form>
