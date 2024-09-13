<?php 
    include "views/includes/header.php";
?>


<?php
    if(isset($_GET['action'])) {
        if ($_GET['action'] == "clearall") {
            unset($_SESSION['cart']);
        }

        if ($_GET['action'] == "remove") {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['DrinkID'] == $_GET['DrinkID']) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
?>


<?php
    function processCart() {
        if (isset($_POST['add_to_cart'])) {
            if (isset($_SESSION['cart'])){
                $session_array_id = array_column($_SESSION['cart'], "DrinkID");
                if (!in_array($_GET['DrinkID'], $session_array_id)) {
                    $session_array = array(
                        'DrinkID' => $_GET['DrinkID'],
                        'DrinkName' => $_POST['DrinkName'],
                        'Price' => $_POST['Price'],
                        'Quantity' => $_POST['Quantity'],
                    );
                    $_SESSION['cart'][] = $session_array;
                }
            } else {
                $session_array = array(
                    'DrinkID' => $_GET['DrinkID'],
                    'DrinkName' => $_POST['DrinkName'],
                    'Price' => $_POST['Price'],
                    'Quantity' => $_POST['Quantity'],
                );
                $_SESSION['cart'][] = $session_array;
            }
        }

        $total = 0;
        $output = "";

        $output .= "
        <table class='table table-bordered table-striped'>
            <tr>
                <th>DrinkID</th>
                <th>Drink Name</th>
                <th>Drink Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        ";

        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $output .= "
                <tr>
                    <td>".$value['DrinkID']."</td>
                    <td>".$value['DrinkName']."</td>
                    <td>".$value['Price']."</td>
                    <td>".$value['Quantity']."</td>
                    <td>
                        <a href='".ROOT."cart?action=remove&DrinkID=".$value['DrinkID']."'>
                            <button class='btn btn-danger btn-block'>Remove</button>
                        </a>
                    </td>
                ";

                $total = $total + $value['Price'] * $value['Quantity'];
            }

            $output .= "
            <tr>
                <td></td>
                <td></td>   
                <td><b>Total Price</b></td>
                <td>".number_format($total, 2)."</td>
                <td>
                    <a href='cart?action=clearall'>
                        <button class='btn btn-warning btn-block'>Clear All</button>
                    </a>
                </td>
            </tr>
            ";
        }

        return $output;
    }

    $output = processCart();
?>



<main>
    <div class="container">
        <h2 class="text-center">Item</h2>
        <?php echo $output; ?>
        <a href="<?php echo ROOT . "drinks/all"; ?>" style="color: darkblue;" class="btn"><<--BACK</a>
    </div>
</main>

<?php 
    include "views/includes/footer.php";
?>
