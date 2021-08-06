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
            @if($categoria->id_categoria_planejamento)
                Atualizar Categoria
            @else
                Cadastrar Categoria
            @endif
        </div>
        <div class="card-body">
        <form acion="/categoria/{{$categoria->id_categoria_planejamento}}" method="POST" autocomplete="off">
            @csrf
            @if ($categoria->id_categoria_planejamento)
                <input type="hidden" name="_method" value="PUT" />
            @endif
        

            <div class="form-group">
                <label>Nome:</label>
                <input class="form-control" type="text" name="nome_categoria" required value="{{$categoria->nome_categoria}}"/>
            </div>
    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="{{$categoria->id_catgoria_planejamento ? 'Atualizar': 'Cadastrar'}}">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection