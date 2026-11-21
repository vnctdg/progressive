<?php
declare(strict_types=1);

$candy = [
    'Toffee'   => ['price' => 3.00, 'stock' => 12],
    'Mints'    => ['price' => 2.00, 'stock' => 26],
    'Fudge'    => ['price' => 4.00, 'stock' => 8],
    'Caramel'  => ['price' => 5.00, 'stock' => 15],
    'Lollipop' => ['price' => 1.50, 'stock' => 6],
    'Gummies'  => ['price' => 3.50, 'stock' => 20],
];

$tax = 20;

function get_reorder_message(int $stock): string
{
    return ($stock < 10) ? 'Yes' : 'No';
}

function get_total_value(float $price, int $quantity): float
{
    return $price * $quantity;
}

function get_tax_due(float $price, int $quantity, int $tax = 0): float
{
    return ($price * $quantity) * ($tax / 100);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Candy Store - Stock Control</title>
    <link rel="icon" type="image/png" href="candy-icon.png">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Stock Control</h2>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Stock</th>
                <th>Re-Order</th>
                <th>Total Value</th>
                <th>Tax Due</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candy as $product_name => $data) { ?>
                <tr>
                    <td><?= $product_name ?></td>
                    <td><?= $data['stock'] ?></td>
                    <td><?= get_reorder_message($data['stock']) ?></td>
                    <td>&#8369;<?= get_total_value($data['price'], $data['stock']) ?></td>
                    <td>&#8369;<?= get_tax_due($data['price'], $data['stock'], $tax) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
