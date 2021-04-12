<form action="{{ $action }}" method="{{ $method }}">
    @csrf
    @if($isUpdate)
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="name">Nome do curso</label>
        <input 
            class="form-control" 
            id="name"
            name="nome"
            required 
            placeholder="Enter email"
            value="{{ optional($course)->nome }}"
        >
    </div>

    <div class="form-group">
        <label for="data_inicio">Data de início</label>
        <input 
            type="date"
            class="form-control"
            id="data_inicio"
            name="data_inicio"
            required 
            value="{{ optional(optional($course)->data_inicio)->format('Y-m-d') }}"
        >
    </div>

    <div class="float-right">
        <a type="button" class="btn btn-danger" href="{{ route('courses.index') }}">
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
