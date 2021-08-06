@extends('templates.layout')
@section('conteudo')
<div class="d-flex justify-content-center">
    <a class="p-2 btn btn-primary" href="{{ route('home') }}">
        Home
    </a>
    <a class="p-2 btn btn-primary" href="{{ route('produto.listar') }}">
        Lista de Produtos
    </a>
</div>
@include('../templates.alerta')
<div class="d-flex justify-content-center">

    <div class="card mt-5">
        <div class="card-header">
            @if($produto->id_produto)
                Atualizar produto
            @else
                Cadastrar produto
            @endif
        </div>
        <div class="card-body">
        <form acion="/produto/{{$produto->id_produto}}" method="POST" autocomplete="off">
            @csrf
            @if ($produto->id_produto)
                <input type="hidden" name="_method" value="PUT" />
            @endif
            
            <div class="form-group">
                <label>Categoria:</label>
                <select class="form-control" name="id_categoria_produto" required>
                    <option>Selecione</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id_categoria_planejamento}}" {{$produto->id_categoria_produto == $categoria->id_categoria_planejamento ? 'selected': '' }}>{{$categoria->nome_categoria}}</option>    
                    @endforeach
                </select>
            </div>

            

            <div class="form-group">
                <label>Nome do produto:</label>
                <input class="form-control" type="text" name="nome_produto" required value="{{$produto->nome_produto}}"/>
            </div>
            
            <div class="form-group">
                <label>Valor do produto:</label>
                <input class="form-control" type="number" name="valor_produto" required value="{{$produto->valor_produto}}"/>
            </div>

            <div class="form-group">
                <label>Data de cadastro:</label>
                <input class="form-control" type="date" name="data_cadastro" required value="{{$produto->data_cadastro?->format('Y-m-d')}}"/>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="{{$produto->id_produto ? 'Atualizar': 'Cadastrar'}}">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection