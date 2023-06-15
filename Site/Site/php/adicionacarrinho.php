<?php

    session_start();

    $nome = $_GET["nome"];
    $valor = $_GET["valor"];


    $carrinho = @$_SESSION["carrinho"];

    //Novo produto, carrinho vazio
    if ($carrinho == "")
    {

        $novo = array
        (
            "quantidade" => 1,
            "nome"       => $nome,
            "valor"      => $valor              
        );

        $_SESSION["carrinho"][] = $novo;

    }
    else 
    {
        $achou = 0;

        for($i=0; $i<count($carrinho); $i++)
        {
        
            if ($carrinho[$i]["nome"] == $nome)
            {
                $achou = 1;
                $carrinho[$i]["quantidade"] = $carrinho[$i]["quantidade"] + 1;
            }
        }

        if ($achou == 0)
        {
            $add = array
            (
                "quantidade" => 1,
                "nome"       => $nome,
                "valor"      => $valor              
            );

            $carrinho[] = $add;
        }

        
        $_SESSION["carrinho"] = $carrinho;
    }

    




?>