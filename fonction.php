<?php

    function quantity()
    {
        $quantity=0;
        if(isset($_SESSION['products'])){foreach($_SESSION['products'] as $index =>$product){
            $quantity+=$product['qtt'];
        }}
        return $quantity;
    }
    


?>