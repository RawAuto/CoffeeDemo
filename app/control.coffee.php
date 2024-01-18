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

// If the form has been submitted, validate the request and create the order
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $selectedDrinkType = $_POST['drinkType'];
    $selectedDrinkSize = $_POST['drinkSize'];

    // Validate the order and either create it or set an error message
    if (!isValidDrinkSizeForType(DrinkType::from($selectedDrinkType), DrinkSize::from($selectedDrinkSize))) {
        // Set an error message in the session
        $_SESSION['error'] = 'You cannot order ' .
        DrinkType::from($selectedDrinkType)->value .
        ' in a ' . DrinkSize::from($selectedDrinkSize)->getSize() . ' size.';
    } else {
        // Check if the maximum orders limit is reached
        if (isset($_SESSION['orders']) && count($_SESSION['orders']) > 3) {
            // Set an error message if the maximum orders limit is reached
            $_SESSION['error'] = 'Bert can only take 4 orders at a time. Please remove an order to add another.';
        } else {
            // All OK - Use a factory model to create the order
            $order = OrderFactory::createOrder($name, $selectedDrinkType, $selectedDrinkSize);
            // Serialize and store in the session to access later
            $_SESSION['orders'][] = serialize($order);
        }
    }
}

// Remove order if remove button is clicked and reindex
if (isset($_GET['remove'])) {
    $removeIndex = $_GET['remove'];

    if (isset($_SESSION['orders'][$removeIndex])) {
        unset($_SESSION['orders'][$removeIndex]);
        $_SESSION['orders'] = array_values($_SESSION['orders']);
    }
}

// Redirect back to the main form to prevent form resubmission
header('Location: form.coffee.php');
exit;

/**
 * Check if the selected drink type and size combination is valid.
 *
 * @param DrinkType $drinkType
 * @param DrinkSize $drinkSize
 * @return bool
 */
function isValidDrinkSizeForType(DrinkType $drinkType, DrinkSize $drinkSize): bool
{
    $allowed = true;
    // A Latte can be small or medium
    if ($drinkType === DrinkType::LATTE) {
        $allowed = in_array($drinkSize, [DrinkSize::SMALL, DrinkSize::MEDIUM]);
    }

    // An Espresso can only be a small size
    if ($drinkType === DrinkType::ESPRESSO) {
        $allowed = $drinkSize === DrinkSize::SMALL;
    }

    // An English Tea can only be medium or large size
    if ($drinkType === DrinkType::ENGLISH_TEA) {
        $allowed = in_array($drinkSize, [DrinkSize::MEDIUM, DrinkSize::LARGE]);
    }

    return $allowed;
}
