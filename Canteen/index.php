
<?php include 'header.php'; ?>

<h2>Available Menu</h2>

<?php include 'menu.php'; ?>

<h2>Place Your Order</h2>

<form method="POST" action="process.php">

    <label>NAME</label>
    <input name="customer_name" type="text" required>

    <label>CUSTOMER TYPE</label>
    <select name="customer_type">
        <option value="student">Student</option>
        <option value="employee">Employee</option>
        <option value="guest">Guest</option>
    </select>

    <label>PRODUCT</label>
    <select name="product">
        <option value="M1">Chicken Adobo Meal</option>
        <option value="M2">Pork Sisig Meal</option>
        <option value="M3">Vegetable Meal</option>
        <option value="D1">Bottled Water</option>
        <option value="D2">Iced Tea</option>
    </select>

    <label>QUANTITY</label>
    <input name="quantity" type="number"
           min="1" max="10" required>

    <label>BUDGET (PHP)</label>
    <input name="budget" type="number"
           min="0" step="0.01" required>

    <button type="submit">Process Order</button>

</form>

<?php include 'footer.php'; ?>
