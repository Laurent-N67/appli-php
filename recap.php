<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php
    require "fonction.php";
    require "navbar.php";

    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Aucun produit en session ...</p>";
    }else{
    echo "<div class=container>",
        "<table>",
            "<thead>",
                "<tr>",
                    "<th>#</th>",
                    "<th>Nom</th>",
                    "<th>Prix</th>",
                    "<th>Quantité</th>",
                    "<th>Total</th>",
                    "<th>Supprimer</th>",
                "</tr>",
            "</thead>",
            "<tbody>";
    $totalGeneral= 0; 
    $totalProduct=0;
    foreach($_SESSION['products'] as $index =>$product){
        $total=$product['price']*$product['qtt'];
        echo    
                "<tr class=tableau>",
                    "<td>".$index."</td>",
                    "<td class=product>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td class=qtt><a href='traitement.php?action=down&id=$index'><button class=button><i class='fa-solid fa-minus'></i></button></a>".$product['qtt']."<a href='traitement.php?action=up&id=$index'><button class=button><i class='fa-solid fa-plus'></i></button></a></td>",
                    "<td>".number_format($total, 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td><a href='traitement.php?action=suppr&id=$index'><button class=button><i class='fa-solid fa-trash-can'></i></button></a></td>",
                "</tr>";
                
            $totalGeneral+=$total;
            $totalProduct+=$product['qtt'];
        }
        echo 
            "<tr class=tableau>",
                "<td colspan=3 class=total>Total général :</td>",
                "<td><strong>".number_format($totalProduct, 0, "","&nbsp;")."</strong></td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "<td><a href='traitement.php?action=delete'><button class='vide'>Tout effacer</button></a></td>",
            "</tr>",
            "</div>",
            "</tbody>",
            "</table>";
            
    }
    // unset($_SESSION['products']) ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>