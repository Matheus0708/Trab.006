<?php
session_start();

$carrinho = $_SESSION['Carrinho'];
include("./testecarrinho.php");

$total = 0; // Variável para armazenar a soma total dos valores

// Excluir um item do carrinho
if (isset($_GET['excluir'])) {
  $itemExcluir = $_GET['excluir'];

  // Percorre o carrinho para encontrar o item a ser excluído
  foreach ($carrinho as $index => $item) {
    if ($item['nome'] == $itemExcluir) {
      unset($carrinho[$index]); // Remove o item do carrinho
      $_SESSION['Carrinho'] = $carrinho;
      echo "Item removido do carrinho com sucesso!";
      break; // Interrompe o loop após encontrar o item
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Carrinho de Compras</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #1f1f1f;
      color: #fff;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #333;
      border-radius: 8px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #444;
    }

    .total {
      text-align: right;
      font-weight: bold;
    }

    .checkout {
      margin-top: 20px;
      text-align: right;
    }

    .checkout button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .checkout button:hover {
      background-color: #45a049;
    }

    .product-image {
      width: 150px;
    }

    .botao-voltar {
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
      border-radius: 4px;
    }

    .botao-voltar:hover {
      background-color: #0056b3;
    }

    .excluir {
      background-color: #dc3545;
      color: #fff;
      padding: 5px 10px;
      border-radius: 4px;
      text-decoration: none;
    }

    .excluir:hover {
      background-color: #c82333;
    }

  </style>
</head>

<body>
  <div class="container">
    <h2>Carrinho de Compras</h2>
    <table>
      <tr>
        <th>Produto</th>
        <th>Imagem</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Total</th>
        <th>Ação</th>
      </tr>
      <?php foreach ($carrinho as $item) {
        $nome = $item['nome'];
        $valor = $item['valor'];
        $quantidade = $item['quantidade'];
        $url_imagem = $item["url_imagem"];
        $totalItem = $quantidade * $valor;
        $total += $totalItem;
      ?>
        <tr>
          <td><?php echo $nome; ?></td>
          <td><img src="<?php echo $url_imagem; ?>" class="product-image" alt="..."></td>
          <td><?php echo $valor; ?></td>
          <td><?php echo $quantidade; ?></td>
          <td><?php echo $totalItem; ?></td>
          <td><a href="?excluir=<?php echo $nome; ?>" class="excluir">Excluir</a></td>
        </tr>
      <?php } ?>
      <tr>
        <td colspan="4" class="total">Total</td>
        <td><?php echo $total; ?></td>
        <td></td>
      </tr>
    </table>
    <div class="checkout">
      <input class="botao-voltar" type="button" value="Voltar" onclick="goBack()">
    </div>
    <div class="checkout">
      <button>Finalizar Compra</button>
    </div>
  </div>
</body>

</html>

<script>
  function goBack() {
    history.go(-1);
  }
</script>