<?php
    require "header.php";
    session_start();
    $product_ids = array();
    //session_destroy();
    

    //check if add to cart button has been submitted
    if(filter_input(INPUT_POST, 'add_to_cart')){
        if(isset($_SESSION['shopping_cart'])){
            //keep track of how many products are in the shopping cart
            $count = count($_SESSION['shopping_cart']);
            //create sequential array for matching array keys to product id's
            $product_ids = array_column($_SESSION['shopping_cart'], 'id'); //returns values from the single column of input array

            if(!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
                $_SESSION['shopping_cart'][$count] = array
                (
                    'id' => filter_input(INPUT_GET, 'id'),
                    'name' => filter_input(INPUT_POST, 'name'),
                    'price' => filter_input(INPUT_POST, 'price'),
                    'quantity' => filter_input(INPUT_POST, 'quantity')
                ); 
         } else { //product already exists, increase quantity
            //match array key to the id of the product being added to the cart
            for($i=0; $i< count($product_ids); $i++){
                if($product_ids[$i]==filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                } 

            }
        }
     } else { //if shopping cart doesnt exist, create first product with array key 0
            // create array using submitted form data, start from key 0 and fill it with values
            $_SESSION['shopping_cart'][0] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity') 
            );
    } 
    

    
        
    }  
    if(filter_input(INPUT_GET, 'action') == 'delete'){
        //loop through all the products in the shopping cart until it matches with the get id variable
        foreach($_SESSION['shopping_cart'] as $key => $product){
            if($product['id'] == filter_input(INPUT_GET, 'id')){
                //remove product from the shopping cart when it matches with the GET id
                unset($_SESSION['shopping_cart'][$key]);
            }
        }
        //reset session array keys so they match with $product_ids numeric array
        $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
    }

    
    
?>


   

<body>
    <div class="container">


<?php 
        require 'includes/dbh.inc.php';
        $query = "SELECT * FROM products ORDER BY id ASC;";

        $result = mysqli_query($conn, $query);

        if($result):
            if(mysqli_num_rows($result)>0):
                while($product = mysqli_fetch_assoc($result)):
                   ?>
                    <div class = "col-sm-4 col-md-3" >
                        <form method="post" action = "index.php?action=add&id=<?php echo $product['id'];?>">
                        <div class = "products">
                        <img src = "<?php echo $product['image']; ?>" class = "img-responsive" />
                        <h4 class = "text-info"><?php echo $product['name']; ?></h4>
                        <h4 class ="price"> <?php echo "RM".$product ['price'];?></h4>
                        <input type = "text" name = "quantity" class = "form-control" value = "1" />
                        <input type = "hidden" name = "name" value = "<?php echo $product['name']; ?>" />
                        <input type = "hidden" name = "price" value = "<?php echo $product['price']; ?>" />
                        <input type = "submit" name = "add_to_cart" style = "margin-top: 5px;" class = "btn-info" value = "Add to Cart" />
                        </div> 
                        </form>
                    </div>
                   <?php
                endwhile;
            endif;
        endif;
    ?>
    
        <div style = "clear:both"></div>
        <br/>
    <div class = "table-responsive">
        <table class = "table">
            <tr><th colspan = "5"><h3>Order Details</h3></th></tr>
        <tr>
            <th width="40%">Product Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>
        <?php
            if(!empty($_SESSION['shopping_cart'])):
                $total = 0;
                foreach($_SESSION['shopping_cart'] as $key => $product):
        ?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['quantity']; ?></td>
            <td>RM<?php echo number_format($product['price'],2); ?></td>
            <td>RM<?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
            <td>
                <a href="index.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class = "btn-danger">Remove</div>
                </a>
            </td>
        </tr>
        <?php 
                $total = $total + ($product['quantity'] * $product['price']);
            endforeach;
        ?>
        <tr>
            <td colspan = "3" align = "right">Total</td>
            <td align = "right">RM<?php echo number_format($total, 2); ?></td>
            <td></td>
        </tr>
        <tr>
            <td  colspan = "5">
                <?php
                    if(isset($_SESSION['shopping_cart'])):
                    if(count($_SESSION['shopping_cart']) > 0):
                ?>
                    <input type = "submit" name = "checkout"  class = "checkoutbtn" value = "Checkout" />
                <?php endif;
             endif; ?>
            </td>
        </tr>
        <?php
          endif;
        ?>
        </table> 

    </div>
    </div>
</body>