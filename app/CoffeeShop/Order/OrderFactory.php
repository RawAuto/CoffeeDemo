<?php

namespace CoffeeShop\Order;

use CoffeeShop\Drink\Controls\DrinkSize;
use CoffeeShop\Drink\Controls\DrinkType;
use CoffeeShop\Drink\DrinkFactory;

/**
 * Factory class responsible for creating orders and obtaining order components.
 */
class OrderFactory implements OrderFactoryInterface
{
    /**
     * Create a new order based on the provided customer name, drink type, and drink size.
     *
     * @param string $name The name of the customer placing the order.
     * @param string $drinkType The type of the drink to be included in the order.
     * @param int $drinkSize The size of the drink to be included in the order.
     *
     * @return Order|null An instance of the created order, or null if the drink creation fails.
     */
    public static function createOrder($name, string $drinkType, int $drinkSize): ?Order
    {
        $drink = DrinkFactory::createDrink(DrinkType::from($drinkType), $name);

        if ($drink) {
            return new Order($name, $drink, DrinkSize::from($drinkSize));
        }

        return null;
    }

    /**
     * Get the JSON representation of the components of a given order.
     *
     * @param Order $order The order for which to obtain components.
     *
     * @return string The JSON representation of the order components, formatted for display.
     */
    public static function getOrderComponents(Order $order): string
    {
        $drink = $order->getDrink();

        $componentsArray = [
            'Size of Drink' => $order->getdrinkSize()->getSize(),
            'Write on the cup' => $drink->getCupText(),
            'Add Milk?' => $drink->hasMilk() ? 'Yes' : 'No',
            'Make the drink' => $drink->getDrinkComponents(),
        ];

        $json = json_encode($componentsArray, JSON_PRETTY_PRINT);
        return '<pre>' . $json . '</pre>';
    }
}
