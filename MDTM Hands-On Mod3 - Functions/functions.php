<?php
// 1. Strict types turned on
declare(strict_types=1);

// 2. Multidimensional array
$candy = [
    'Toffee'   => ['price' => 3.00, 'stock' => 12],
    'Mints'    => ['price' => 2.00, 'stock' => 26],
    'Fudge'    => ['price' => 4.00, 'stock' => 8],
    'Caramel'  => ['price' => 5.00, 'stock' => 15],
    'Lollipop' => ['price' => 1.50, 'stock' => 6],
    'Gummies'  => ['price' => 3.50, 'stock' => 20],
];

// 3. Global variable for tax rate
$tax = 20;

// 4 & 5. Function to check if stock needs reordering (ternary operator)
function get_reorder_message(int $stock): string
{
    return ($stock < 10) ? 'Yes' : 'No';
}

// 6 & 7. Function to calculate total stock value
function get_total_value(float $price, int $quantity): float
{
    return $price * $quantity;
}

// 8 & 9. Function to calculate total tax due
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
    <style>
        body {
            background-color: #7d0a24;
            color: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 30px 40px;
        }
        h1 {
            font-family: Georgia, "Times New Roman", serif;
            color: #f3c669;
            font-size: 2.2rem;
            margin: 0 0 25px 0;
        }
        h2 {
            font-size: 0.95rem;
            letter-spacing: 2px;
            font-weight: normal;
            text-transform: uppercase;
            margin: 0 0 18px 0;
        }
        table {
            border: 1px solid #f7c5b8;
            border-spacing: 0;
            padding: 4px;
            min-width: 500px;
        }
        th {
            background-color: #f7c5b8;
            color: #7d0a24;
            text-align: left;
            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 6px 14px;
        }
        td {
            padding: 7px 14px;
            font-size: 0.9rem;
        }
    </style>
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
            <?php // 10. foreach loop through $candy ?>
            <?php foreach ($candy as $product_name => $data) { ?>
                <tr>
                    <?php // 11. Product name ?>
                    <td><?= $product_name ?></td>

                    <?php // 12. Stock level ?>
                    <td><?= $data['stock'] ?></td>

                    <?php // 13. Re-order message ?>
                    <td><?= get_reorder_message($data['stock']) ?></td>

                    <?php // 14. Total value ?>
                    <td>$<?= get_total_value($data['price'], $data['stock']) ?></td>

                    <?php // 15. Tax due ?>
                    <td>$<?= get_tax_due($data['price'], $data['stock'], $tax) ?></td>
                </tr>
            <?php // 16. Closing curly brace ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
