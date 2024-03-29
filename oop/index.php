<?php

include_once 'Product.php';
session_start();
$product = new Product();
$listOfProducts = $product->getAllProducts();
?>


<html>
<head>
    <title>Homepage</title>
</head>

<body>
<div style="text-align: center">
    <h1>
        Products list
    </h1>

    <table style="margin: auto; text-align: center;">
        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($listOfProducts)) {
            $id = $row['id'];
            $url_read = "read_product.php?id=" . $row['id'];
            $url_edit = "edit.php?id=" . $row['id'];
            $url_delete = "delete.php?id=" . $row['id'];

            ?>

            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['price']; ?></td>

                <td><a href="<?php echo $url_read; ?> ">View product</a></td>
                <td><a href="<?php echo $url_edit; ?> "> Edit </a></td>
                <td><a href="<?php echo $url_delete ?> "> Delete </a></td>

            </tr>
        <?php } ?>
    </table>

    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
    }
    session_unset();
    ?>

</body>
</html>