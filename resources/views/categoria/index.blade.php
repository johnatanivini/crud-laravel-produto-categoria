@extends('templates.layout')
@section('conteudo')
<div class="d-flex justify-content-center">
    <a class="p-2 btn btn-primary" href="{{ route('home') }}">
        Home
    </a>
    <a class="p-2 btn btn-primary" href="{{ route('categoria.create') }}">
        Cadastrar Categoria
    </a>
</div>
@include('../templates.alerta')
<table class="mt-5 table table-bordered">
    @foreach ($categorias as $categoria)
        <tr class="bg-light">
            <td class="p2 mr2">
                {{$categoria->id_categoria_planejamento}}
            </td>
            <td class="p2 mr-2">
                {{$categoria->nome_categoria}}
            </td>
           
            <td class="p2 m2" style="width:2%">
                <div class="d-flex flex-row">
                    <a href="/categoria/{{$categoria->id_categoria_planejamento}}" class="btn btn-info">Editar</a>

                    <form action="{{ route('categoria.delete', ['id'=>$categoria->id_categoria_planejamento]) }}" method="POST">
                        @csrf()
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                </div>
            </td>
        </div>
        
    @endforeach
</table>
@endsection