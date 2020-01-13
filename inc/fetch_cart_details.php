<?php
    session_start();
    include('connection.php');
    include('function.php');

    $num_of_products = 0;
    $total_price = 0;

    $output = '';
    $popover = '';

    if(!empty($_SESSION['shopping_cart'])){
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {

            $sql = "SELECT * FROM product WHERE p_id = '{$_SESSION['shopping_cart'][$keys]['product_id']}';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $output .= '<div class="border rounded my-3">
                            <div class="row bg-white">
                                <div class="col-md-3">
                                    <img src="'.$row['image'].'" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="pt-2">'.$values["product_name"].'</h5>
                                    <small class="text-secondary">Seller: LKMart Admin</small>
                                    <h5 class="pt-2">Rs. '.number_format(discount($values['product_price'],$row['category']),2).'</h5>
                                </div>
                                
                                <div class="col-md-3 py-0">
                                    <button type="button" class="btn btn-danger float-right delete" id="'.$_SESSION['shopping_cart'][$keys]['product_id'].'"><span aria-hidden="true">&times;</span></button><br>
                                    <div class="py-4">                                  
                                    <button type="button" class="btn bg-light border rounded-circle minus " id="'.$values['product_id'].'"><i class="fas fa-minus"></i></button>
                                    <input type="text" value="'.$values['product_qty'].'" class="form-control w-25 d-inline text-center" readonly id="qty'.$values['product_id'].'">
                                    <button type="button" class="btn bg-light border rounded-circle plus" id="'.$values['product_id'].'"><i class="fas fa-plus"></i></button>
                                    <input type="hidden" name="hidden_name" id="name'.$row["p_id"].'" value="'.$row["name"].'" />
                                    <input type="hidden" name="hidden_price" id="price'.$row["p_id"].'" value="'.$row["u_price"].'" />
                                    </div>
                                </div>
                            </div>
                        </div>';

            $num_of_products =  $num_of_products + 1;
            $total_price = discount($values['product_price'],$row['category']) * $_SESSION['shopping_cart'][$keys]['product_qty'] + $total_price;
        }

        $popover .= '<a href="checkout.php" class="btn btn-primary" id="check_out_cart">
                        <span class="glyphicon glyphicon-shopping-cart"></span> View Cart
                    </a>
                    <a class="btn btn-warning" id="clear_cart">
                        <span class="glyphicon glyphicon-trash"></span> Clear
                    </a>';
    }else{
        $output = '<span class="display-4">Your Shopping Cart is Empty</span>';
        $popover = '<span>No Any Products in the Cart</span>';
    }

  $data = array(
        'LKR' => $total_price,
        'popover' => $popover,
        'output' => $output,
        'product_qtys' => $num_of_products,
        'total_price' => number_format($total_price,2)
    );

    echo json_encode($data);

?>