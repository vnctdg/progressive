<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name = trim($_POST['customer_name'] ?? '');
$type = $_POST['customer_type'] ?? '';
$product = $_POST['product'] ?? '';

$quantity = filter_var(
    $_POST['quantity'] ?? null,
    FILTER_VALIDATE_INT
);

$budget = filter_var(
    $_POST['budget'] ?? null,
    FILTER_VALIDATE_FLOAT
);

$valid = $name !== ''
    && in_array($type, ['student','employee','guest'], true)
    && in_array($product, ['M1','M2','M3','D1','D2'], true)
    && $quantity !== false
    && $quantity >= 1 && $quantity <= 10
    && $budget !== false && $budget >= 0;

if (!$valid) {
    include 'header.php';

    echo '<div class="content">';
    echo '<p class="error">Invalid order. Please check your input.</p>';
    echo '<a href="index.php">Return to form</a>';
    echo '</div>';

    include 'footer.php';
    exit;
}

// Product information
$item = match ($product) {
    'M1' => ['Chicken Adobo Meal', 85, true],
    'M2' => ['Pork Sisig Meal', 100, true],
    'M3' => ['Vegetable Meal', 70, true],
    'D1' => ['Bottled Water', 20, false],
    'D2' => ['Iced Tea', 35, false],
};

[$productName, $price, $isFood] = $item;

// Computation
$subtotal = $price * $quantity;

// Discount
if ($isFood && $type === 'student') {
    $rate = .10;
}
elseif ($isFood && $type === 'employee') {
    $rate = .05;
}
else {
    $rate = 0;
}

$discount = $subtotal * $rate;
$total = $subtotal - $discount;

$balance = $budget - $total;

include 'header.php';

?>

<div class="content">

    <div class="receipt-layout">

        <!-- LEFT: CUSTOMER INFORMATION -->

        <div class="details">

            <label>CUSTOMER</label>
            <div class="detail-value">
                <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
            </div>

            <label>CUSTOMER TYPE</label>
            <div class="detail-value">
                <?= htmlspecialchars(ucfirst($type), ENT_QUOTES, 'UTF-8') ?>
            </div>

            <label>PRODUCT</label>
            <div class="detail-value">
                <?= htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') ?>
            </div>

            <label>QUANTITY</label>
            <div class="detail-value">
                <?= $quantity ?>
            </div>

            <label>BUDGET</label>
            <div class="detail-value">
                PHP <?= number_format($budget, 2) ?>
            </div>

        </div>


        <!-- RIGHT: ORDER RECEIPT -->

        <div class="receipt-box">

            <h2>Order receipt</h2>

            <?php
            for ($i = 1; $i <= $quantity; $i++):
            ?>

                <div class="receipt-item">
                    <span>Item <?= $i ?></span>
                    <span>PHP <?= number_format($price, 2) ?></span>
                </div>

            <?php endfor; ?>

            <hr class="receipt-line">

            <p class="final-label">FINAL BILL</p>

            <p class="final-amount">
                PHP <?= number_format($total, 2) ?>
            </p>

        </div>

    </div>


    <!-- BUDGET STATUS -->

    <div class="budget-status">

        <?php if ($budget >= $total): ?>

            <p class="success">
                BUDGET SUFFICIENT &nbsp; • &nbsp;
                BALANCE PHP <?= number_format($balance, 2) ?>
            </p>

        <?php else: ?>

            <p class="error">
                INSUFFICIENT BUDGET &nbsp; • &nbsp;
                SHORTAGE PHP <?= number_format(abs($balance), 2) ?>
            </p>

        <?php endif; ?>

    </div>


    <!-- PREPARATION PROGRESS -->

    <h2>Preparation Progress</h2>

    <?php
    $counter = 1;

    while ($counter <= $quantity) {
        echo '<p style="font-size:11px;">Preparing item '
            . $counter . ' of ' . $quantity
            . '</p>';

        $counter++;
    }
    ?>

    <p>
        <a href="index.php">Place another order</a>
    </p>

</div>

<?php include 'footer.php'; ?>