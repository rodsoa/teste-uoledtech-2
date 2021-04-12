<form action="{{ $action }}" method="{{ $method }}">
    @csrf
    @if($isUpdate)
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="name">Nome do aluno</label>
        <input 
            class="form-control" 
            id="name"
            name="nome"
            required 
            placeholder="Digite o nome do aluno"
            value="{{ optional($student)->nome }}"
        >
    </div>

    <div class="form-group">
        <label for="email">Endereço de email</label>
        <input 
            type="email"
            class="form-control"
            id="email"
            name="email"
            required placeholder="Digite o email"
            value="{{ optional($student)->email }}"
        >
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input
            type="password"
            class="form-control"
            id="password"
            name="senha"
            placeholder="Senha"
            required
            value="{{ optional($student)->senha }}"
        >
    </div>

    <div class="float-right">
        <a type="button" class="btn btn-danger" href="{{ route('students.index') }}">
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
