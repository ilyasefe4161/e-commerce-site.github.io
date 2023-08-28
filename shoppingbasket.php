<?php

// Sepeti başlatma veya mevcut sepeti alma
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Ürünü sepete ekleme
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Ürünü sepete ekleme veya miktarı güncelleme
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

// // Sepetten ürünü kaldırma
// if (isset($_GET['remove'])) {
//     $product_id = $_GET['remove'];
//     if (isset($_SESSION['cart'][$product_id])) {
//         unset($_SESSION['cart'][$product_id]);
//     }
// }

// // Sepeti boşaltma
// if (isset($_GET['clear'])) {
//     $_SESSION['cart'] = array();
//     header("Location:index.php?PN=200");
//     exit();
// }


// Sepetten ürünü kaldırma
if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
    header("Location: index.php?PN=200");
    exit();
}

// Sepeti boşaltma
if (isset($_GET['clear'])) {
    if ($_GET['clear'] === '1') {
        $_SESSION['cart'] = array();
    }
    header("Location: index.php?PN=200");
    exit();
}


// Sepetin toplam tutarını hesaplama
$total_price = 0;

// Sepetin içeriğini görüntüleme
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Sepet</title>";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">";
echo "</head>";
echo "<body>";
echo "<div class=\"container\">";
echo "<h1>Shopping Basket</h1>";

if (empty($_SESSION['cart'])) {
    echo "<p>Sepetiniz boş.</p>";
} else {
    echo "<table>";
    echo "<tr><th>Product</th><th>Cost</th><th>Amount</th><th></th></tr>";

    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result);

    foreach ($_SESSION['cart'] as $product_id => $quantity) {

        if (isset($products[$product_id])) {
            $product = $products[$product_id];
            $product_name = $product['products_name'];
            $product_price = $product['products_cost'];
            $subtotal = $product_price * $quantity;
            $total_price += $subtotal;

            echo "<tr>";
            echo "<td>$product_name</td>";
            echo "<td>$product_price TL</td>";
            echo "<td>$quantity</td>";
            echo "<td><a href=\"?remove=$product_id\">Remove</a></td>";
            echo "</tr>";
        }
    }

    echo "<tr><td colspan=\"4\">Sum: $total_price TL</td></tr>";
    echo "</table>";

    echo "<p><a href=\"?clear=1\">Empty the Shopping Basket</a></p>";
}
// Ürünleri ekleme için bir form
echo "<h2>Add Product</h2>";
echo "<form method=\"post\" action=\"\">";
echo "<label for=\"product_id\">Product: </label>";
echo "<select name=\"product_id\" id=\"product_id\">";
foreach ($products as $product_id => $product) {
    $product_name = $product['products_name'];
    echo "<option value=\"$product_id\">$product_name</option>";
}
echo "</select>";
echo "<br>";
echo "<br>";
echo "<label for=\"quantity\">Amount: </label>";
echo "<input type=\"number\" name=\"quantity\" id=\"quantity\" value=\"1\">";
echo "<br>";
echo "<br>";
echo "<input class=greenButtonArea type=\"submit\" value=\"Add the Shopping Basket\">";
echo "</form>";
echo "</div>";
echo "</body>";
echo "</html>";