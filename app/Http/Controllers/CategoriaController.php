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
        
        $categorias = $this->categoriaProdutoRepositoryInterface->all();

        return view('categoria.index', [
            'categorias' => $categorias
        ]);
    }

    public function create(int $id = null)
    {
        $categoria = new CategoriaProduto();

        if ($id) {
            $categoria = $this->categoriaProdutoRepositoryInterface->find($id);
        }

        return view('categoria.create', [
            'categoria' => $categoria
        ]);
    }

    public function delete(int $id)
    {
        $removerCategoria = $this->categoriaProdutoRepositoryInterface->delete($id);

        if (!$removerCategoria) {
            return redirect()->route('categoria.listar')->with('error', 'Categoria não foi removida!');
        }

        return redirect()->route('categoria.listar')->with('success', 'Categoria removida!');
    }

    public function save(int $id = null, CategoriaProdutoRequest $categoriaProdutoRequest)
    {

        if (!$categoriaProdutoRequest->validated()) {
            return redirect()->route('categoria.create', ['id' => $id])
            ->withErrors($categoriaProdutoRequest);
        }

        if ($id) {
            $this->categoriaProdutoRepositoryInterface
            ->update($id, request()->except('_token', '_method'));
        }

        if (!$id) {
            $this->categoriaProdutoRepositoryInterface
            ->create(request()->except('_token', '_method'));
        }

        return redirect()->route('categoria.listar')->with('success', 'Categoria salva com sucesso!');
    }
}
