<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaProdutoRequest;
use App\Models\CategoriaProduto;
use App\Repositories\CategoriaProdutoRepositoryInterface;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CategoriaController extends Controller
{
    public function __construct(
        protected CategoriaProdutoRepositoryInterface $categoriaProdutoRepositoryInterface
    )
    {
    }

    public function index()
    {
        
        $produtos = $this->categoriaProdutoRepositoryInterface->all();

        view('categoria.index', [
            'categorias' => $produtos
        ]);
    }

    public function form(int $id = null)
    {
        $categoria = new CategoriaProduto();

        if ($id) {
            $categoria = $this->categoriaProdutoRepositoryInterface->find($id);
        }

        view('categoria.form', [
            'categoria' => $categoria
        ]);
    }

    public function delete(int $id): void
    {
        $removerCategoria = $this->categoriaProdutoRepositoryInterface->delete($id);

        if (!$removerCategoria) {
            redirect('index')->with('error', 'Não foi possivel remover o categoria');
        }

        redirect('index')->with('msg', 'Registro removido');
    }

    public function create(CategoriaProdutoRequest $categoriaRequest): void
    {

        $categoria = $this->categoriaProdutoRepositoryInterface->create($categoriaRequest->attributes());

        if ($categoria) {
            redirect('form')->withErrors($categoriaRequest->validated());
        }

        redirect('form')->with('success', 'Categoria Cadastrada');
    }

    public function update($id, CategoriaProdutoRequest $categoriaRequest): void
    {

        $categoria = $this->categoriaProdutoRepositoryInterface->update($id, $categoriaRequest->attributes());

        if ($categoria) {
            redirect('form')->withErrors($categoriaRequest->validated());
        }

        redirect('form')->with('success', 'categoria Cadastrado');
    }
}
