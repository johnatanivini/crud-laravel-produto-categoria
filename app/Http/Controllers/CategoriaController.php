<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaProdutoRequest;
use App\Models\CategoriaProduto;
use App\Repositories\CategoriaProdutoRepositoryInterface;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

    public function create(int $id = null)
    {
        $categoria = new CategoriaProduto();

        if ($id) {
            $categoria = $this->categoriaProdutoRepositoryInterface->find($id);
        }

        view('categoria.form', [
            'categoria' => $categoria
        ]);
    }

    public function delete(int $id)
    {
        $removerCategoria = $this->categoriaProdutoRepositoryInterface->delete($id);

        if (!$removerCategoria) {
            return redirect()->route('categoria.listar')->with('error', 'Produto não foi removido!');
        }

       
        return redirect()->route('categoria.listar')->with('success', 'Produto removido!');
    }

    public function save(CategoriaProdutoRequest $categoriaRequest): void
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
