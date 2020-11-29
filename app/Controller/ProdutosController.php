<?php


namespace Mini\Controller;

use Mini\Model\Produto;

class ProdutosController
{
    public function index()
    {
        $Produto = new Produto();
        $produtos = $Produto->getAllProdutos();
        $amount_of_produtos = $Produto->getAmountOfProdutos();

        require APP . 'view/_templates/header.php';
        require APP . 'view/produtos/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if (isset($_POST["submit_add_produto"])) {
            $Produto = new Produto();
            $Produto->add($_POST["descricao"], $_POST["unidade"]);
        }

        header('location: ' . URL . 'produtos/index');
    }

    public function delete($produto_id)
    {
        if (isset($produto_id)) {
            $Produto = new Produto();
            $Produto->delete($produto_id);
        }

        header('location: ' . URL . 'produtos/index');
    }

    public function edit($produto_id)
    {
        if (isset($produto_id)) {
            $Produto = new Produto();
            $produto = $Produto->getProduto($produto_id);

            if ($produto === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                require APP . 'view/_templates/header.php';
                require APP . 'view/produtos/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            header('location: ' . URL . 'produtos/index');
        }
    }

    public function update()
    {
        if (isset($_POST["submit_update_produto"])) {
            $Produto = new Produto();
            $Produto->update($_POST["descricao"], $_POST["unidade"], $_POST['produto_id']);
        }

        header('location: ' . URL . 'produtos/index');
    }

    public function ajaxGetStats()
    {
        $Produto = new Produto();
        $amount_of_produtos = $Produto->getAmountOfProdutos();

        echo $amount_of_produtos;
    }

}
