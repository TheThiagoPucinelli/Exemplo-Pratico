<?php
// Adiciona item ao carrinho se veio via GET
if (isset($_GET['produto'])) {
    $produto = $_GET['produto'];

    // Recupera o carrinho existente
    if (isset($_COOKIE['carrinho'])) {
        $carrinho = json_decode($_COOKIE['carrinho'], true);
    } else {
        $carrinho = [];
    }

    // Adiciona o novo produto
    $carrinho[] = $produto;

    // Atualiza o cookie (1 hora de validade)
    setcookie('carrinho', json_encode($carrinho), time() + 3600);

    // Redireciona para evitar recarregar GET
    header("Location: carrinho.php");
    exit;
}

// Mostra os itens já no carrinho
if (isset($_COOKIE['carrinho'])) {
    $itens = json_decode($_COOKIE['carrinho'], true);
    foreach ($itens as $item) {
        echo "<li>" . htmlspecialchars($item) . "</li>";
    }
} else {
    echo "<li>O carrinho está vazio.</li>";
}
?>
