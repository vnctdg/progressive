<?php

declare(strict_types=1);

echo '<img src="logo.png" alt="logo">'; 

$products = [
    'Toffee' => ['price' => 3, 'stock' => 12],
    'Mints' => ['price' => 2, 'stock' => 26],
    'Fudge' => ['price' => 4, 'stock' => 8],
    'Bubblegum' => ['price' => 6, 'stock' => 15], 
    'Lollipop' => ['price' => 7, 'stock' => 22], 
    'Chocolates' => ['price' => 13, 'stock' => 17], 
];

$tax_rate = 20;

function get_reorder_message(int $stock): string {
    return $stock < 10 ? 'Yes' : 'No';
}

function get_total_value(float $price, int $quantity): float {
    return $price * $quantity;
}

function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float {
    $total_value = $price * $quantity;
    return $total_value * ($tax_rate / 100);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candy Store-Stock Control</title> 
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>The Candy Store</h1> 
        <h2>STOCK CONTROL</h2> 
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Reorder</th>
                    <th>Total Value</th>
                    <th>Tax Due</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $vincent => $data): ?> 
                <tr>
                    <td><?= $vincent?></td> 
                    <td><?= $data['stock'] ?></td>
                    <td><?= get_reorder_message($data['stock']) ?></td>
                    <td>₱<?= number_format(get_total_value($data['price'], $data['stock']), 0) ?></td>
                    <td>₱<?= number_format(get_tax_due($data['price'], $data['stock'], $tax_rate), 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
