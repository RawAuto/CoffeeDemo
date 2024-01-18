<?php

namespace CoffeeShop\Order;

use CoffeeShop\Drink\Drink;
use CoffeeShop\Drink\Controls\DrinkSize;

/**
 * Represents an order in the Coffee Shop application.
 *
 * An order consists of a customer name, a selected drink, and the size of the drink.
 * This class encapsulates the details of an order and provides methods to retrieve
 * information about the order.
 */
class Order
{
    /** @var string The name of the customer placing the order. */
    private string $customerName;

    /** @var DrinkSize The size of the drink in the order. */
    private DrinkSize $drinkSize;

    /** @var Drink The drink included in the order. */
    private Drink $drink;

    /**
     * Order constructor.
     *
     * @param string $customerName The name of the customer placing the order.
     * @param Drink $drink The drink included in the order.
     * @param DrinkSize $drinkSize The size of the drink in the order.
     */
    public function __construct(string $customerName, Drink $drink, DrinkSize $drinkSize)
    {
        $this->customerName = $customerName;
        $this->drink = $drink;
        $this->drinkSize = $drinkSize;
    }

    /**
     * Get the name of the customer placing the order.
     *
     * @return string The customer's name.
     */
    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    /**
     * Get the drink included in the order.
     *
     * @return Drink The selected drink.
     */
    public function getDrink(): Drink
    {
        return $this->drink;
    }

    /**
     * Get the size of the drink in the order.
     *
     * @return DrinkSize The size of the drink.
     */
    public function getdrinkSize(): DrinkSize
    {
        return $this->drinkSize;
    }

    /**
     * Get the type of drink included in the order
     * 
     * @return string The type of drink
     *
     */
    public function getDrinkType(): string
    {
        return $this->drink->getType();
    }

    /**
     * Get a summary of the order.
     *
     * @return string A string summarizing the order details.
     */
    public function getOrderSummary(): string
    {
        // Use <br> for HTML line breaks
        $eol = '<br>';
        return $this->customerName . ' ordered ' .
            $this->drink->getFriendlyName() .
            ' (' . $this->drinkSize->getSize() . ')' .
            $eol;
    }
}
