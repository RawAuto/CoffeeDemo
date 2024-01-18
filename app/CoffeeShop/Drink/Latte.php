<?php

namespace CoffeeShop\Drink;

/**
 * Represents a Latte drink in a coffee shop.
 *
 * This class extends the abstract Drink class and provides specific
 * implementations for a Latte drink, including its components, type,
 * friendly name, whether it contains milk, and a customized cup text.
 *
 * @property string $cupText Text to be written on the cup for this Latte.
 */
class Latte extends Drink
{
    /**
     * Constructor for Latte class.
     *
     * @param string $cupText Text to be written on the cup for this Latte.
     */
    public function __construct(string $cupText)
    {
        // Append the friendly name to the cup text
        $cupText .= ' ' . $this->getFriendlyName();

        // Call the parent constructor with the modified cup text
        parent::__construct($cupText);
    }

    /**
     * Get an array of components that make up this Latte drink.
     *
     * @return array Array of components.
     */
    public function getDrinkComponents(): array
    {
        return [
            'shot of coffee',
            'steamed milk'
        ];
    }

    /**
     * Get the type of the drink (Latte).
     *
     * @return string Type of the drink.
     */
    public function getType(): string
    {
        return 'coffee';
    }

    /**
     * Get a user-friendly name for the Latte drink.
     *
     * @return string User-friendly name.
     */
    public function getFriendlyName(): string
    {
        return 'a Latte';
    }

    /**
     * Check if the Latte drink contains milk.
     *
     * @return bool True if the drink contains milk, false otherwise.
     */
    public function hasMilk(): bool
    {
        return true;
    }

    /**
     * Get a customized cup text for this Latte drink.
     * Overrides the base class method.
     *
     * @return string Customized cup text.
     */
    public function getCupText(): string
    {
        return "Yum! This one is mine!";
    }
}
