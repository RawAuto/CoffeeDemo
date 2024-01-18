<?php

namespace CoffeeShop\Order;

/**
 * Interface defining the contract for an Order Factory in the Coffee Shop application.
 */
interface OrderFactoryInterface
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
    public static function createOrder($name, string $drinkType, int $drinkSize): ?Order;

    /**
     * Get the JSON representation of the components of a given order.
     *
     * @param Order $order The order for which to obtain components.
     *
     * @return string The JSON representation of the order components, formatted for display.
     */
    public static function getOrderComponents(Order $order): string;
}
