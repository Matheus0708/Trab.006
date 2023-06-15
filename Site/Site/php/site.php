<?php

  include ("./produtos.php");



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site de Vendas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type='text/css' href="../css/style.css">
</head>

<body>
  
  <section class="barra_navegacao">  
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
            <a class="nav-link active" href="site.php">Site</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Departamentos </a>
            <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="computador.html">Computadores</a></li>
        <li><a class="dropdown-item" href="notebook.html">Notebooks</a></li>
        <li><a class="dropdown-item" href="monitor.html">Monitores</a></li>
            </ul>
        </li>

        
      <li class="navbar-carrinho">
        <a class="btn btn-outline-light" href="carrinho.php" style="margin-left: 73em;">🛒 Carrinho</a>
      </li>
    </div>
  </div>
</nav>
</section>

<div class="card_produtos">
  <?php for ($i = 0; $i < count($produtos); $i++) {
    $item = $produtos[$i]["item"];
    $nome = $produtos[$i]["nome"];
    $valor = $produtos[$i]["valor"];
    $quantidade = $produtos[$i]["quantidade"];
    $url_imagem = $produtos[$i]["url_imagem"];
    ?>
    <div class="row">
      <div class="col-sm-3">
        <div class="card text-center text-bg-dark" style="width: 20rem;">
          <img src="<?php echo $url_imagem; ?>" class="card-img-top" alt="...">
           <a href="./detalhesproduto.php?item=<?php echo $item; ?>"><div class="card-body">
            <h5 class="card-title"><?php echo $nome; ?></h5>
            <p class="card-text" id="preco">Preço: <?php echo $valor; ?></p>
            <p class="card-text" id="quantidade">Quantidade: <?php echo $quantidade; ?></p>
            <a class="btn btn-outline-light" href="detalhesproduto.php?item=<?php echo $item; ?>">Detalhes do Produto</a>
          </div> </a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

  


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"crossorigin="anonymous"></script>
</body>

</html>