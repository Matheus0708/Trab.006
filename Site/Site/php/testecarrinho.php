<?php

// Verifica se o carrinho de compras já existe na sessão, se não existir, cria um novo array vazio
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// Verifica se o parâmetro "item" foi enviado na URL
if (isset($_GET['item'])) {
    $item = $_GET['item'];

    // Verifica se o item já existe no carrinho
    if (in_array($item, $_SESSION['carrinho'])) {
        echo "O item já está no carrinho.";

        // Aumenta a quantidade do item no carrinho
        for ($i = 0; $i < count($_SESSION['carrinho']); $i++) {
            if ($_SESSION['carrinho'][$i] == $item) {
                $_SESSION['quantidade'][$i]++;
                break;
            }
        }
    } else {
        // Adiciona o item ao carrinho
        $_SESSION['carrinho'][] = $item;
        $_SESSION['quantidade'][] = 1;
        echo "Item adicionado ao carrinho com sucesso!";
    }
}
?>
