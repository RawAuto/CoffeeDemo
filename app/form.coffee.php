<?php

namespace CoffeeShop;

use CoffeeShop\Drink\Controls\DrinkSize;
use CoffeeShop\Drink\Controls\DrinkType;
use CoffeeShop\Order\OrderFactory;

/* 
* Autoloader and session configuration to make this tiny code run with no:
* - database dependencies
* - composer config
*/
require_once 'autoloader.php';
session_start();

// Check for an error message in the session
$error = isset($_SESSION['error']) ? $_SESSION['error'] : null;

// if an error is set in the session, unset it to avoid repeats
if ($error) {
    unset($_SESSION['error']);
}

// Retrieve and unserialize orders from the session
if (isset($_SESSION['orders'])) {
    $orders = [];
    foreach ($_SESSION['orders'] as $serializedOrder) {
        $orders[] = unserialize($serializedOrder);
    }
} else {
    $orders = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Orders</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
</head>
<body>
    <h1>Bert is busy compiling a batch of drink orders . . .</h1>
    <p>The problem: Bert takes the drinks orders for the staff but he often gets the sizes wrong.
        Ernie is responsible for making the drinks but doesn't know what goes into each one and likes to keep the Latte's for himself.

        Enter some names and a variety of drinks to get Bert started and see what Ernie needs to make the drinks be produced below.
    </p>
    <iframe src="https://giphy.com/embed/TKFvzSiGFOSPotjJRp" width="480" height="359" class="giphy-embed"></iframe>
    <h4> Make sure at least one person gets a Latte to see what happens and try a combination of drinks and sizes. </h4>
    <form action="control.coffee.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="drinkType">Drink:</label>
        <select id="drinkType" name="drinkType" required>
            <option value="<?= DrinkType::LATTE->value; ?>">Latte</option>
            <option value="<?= DrinkType::ESPRESSO->value; ?>">Espresso</option>
            <option value="<?= DrinkType::ENGLISH_TEA->value; ?>">English Tea</option>
            <option value="<?= DrinkType::AMERICANO->value ?>">Americano</option>
        </select>

        <label for="drinkSize">Size:</label>
        <select id="drinkSize" name="drinkSize" required>
            <option value="<?= DrinkSize::SMALL->value; ?>">Small</option>
            <option value="<?= DrinkSize::MEDIUM->value ?>">Medium</option>
            <option value="<?= DrinkSize::LARGE->value; ?>">Large</option>
        </select>

        <button type="submit">Add Drink</button>
    </form>

    <?php if ($error): ?>
        <!-- Display error message if set -->
        <p class="error-message"><?= $error ?></p>
    <?php endif; ?>

    <h2>Current Orders</h2>

    <?php if (empty($orders)) : ?>
        <!-- Display a message if there are no orders -->
        <p>No orders yet.</p>
    <?php else : ?>
        <!-- Display the list of orders -->
        <ul>
        <?php foreach ($orders as $index => $order) {?>
            <li>
                <?= $order->getCustomerName() ?> ordered <?= $order->getDrink()->getFriendlyName() ?>
                <a href="control.coffee.php?remove=<?= $index ?>" class="remove-button">Remove</a>
            </li>
        <?php } ?>
        </ul>
    <?php endif; ?>
    <h2>Meanwhile in the shop Ernie is getting ready to make the order.
        Ernie doesn't know how to make these orders so here are the components he needs:</h2>

    <?php if (empty($orders)) : ?>
        <!-- Display a message if there are no orders -->
        <p>No orders yet.</p>
    <?php else : ?>
        <!-- Display the components of each order -->
        <ul class=vertical>
            <?php foreach ($orders as $index => $order) {?>
                <li>
                    <?= $order->getOrderSummary()?>
                    <?php
                        $drinkType = $order->getDrink()->getType();
                        $imagePath = ($drinkType === 'tea') ? '../assets/tea.png' : '../assets/coffee-mug.png';
                    ?>
                        
                    <img src="<?= $imagePath ?>" alt="Icon" width="20" height="20">
                    <?= OrderFactory::getOrderComponents($order)?>
                </li>
            <?php } ?>
        </ul.vertical>
    <?php endif; ?>
</body>
</html>
