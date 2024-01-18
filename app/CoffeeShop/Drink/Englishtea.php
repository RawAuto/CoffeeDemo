<?php

namespace CoffeeShop\Drink;

/**
 * Represents an English Tea drink in a coffee shop.
 *
 * This class extends the abstract Drink class and provides specific
 * implementations for an English Tea drink, including its components,
 * type, friendly name, and whether it contains milk.
 *
 * @property string $cupText Text to be written on the cup for this English Tea.
 */
class Englishtea extends Drink
{
    /**
     * Constructor for Englishtea class.
     *
     * @param string $cupText Text to be written on the cup for this English Tea.
     */
    public function __construct(string $cupText)
    {
        // Append the friendly name to the cup text
        $cupText .= ' ' . $this->getFriendlyName();

        // Call the parent constructor with the modified cup text
        parent::__construct($cupText);
    }

    /**
     * Get an array of components that make up this English Tea drink.
     *
     * @return array Array of components.
     */
    public function getDrinkComponents(): array
    {
        return [
            'tea bag',
            'hot water'
        ];
    }

    /**
     * Get the type of the drink (English Tea).
     *
     * @return string Type of the drink.
     */
    public function getType(): string
    {
        return 'tea';
    }

    /**
     * Get a user-friendly name for the English Tea drink.
     *
     * @return string User-friendly name.
     */
    public function getFriendlyName(): string
    {
        return 'a cup of English tea';
    }

    /**
     * Check if the English Tea drink contains milk.
     *
     * @return bool True if the drink contains milk, false otherwise.
     */
    public function hasMilk(): bool
    {
        return true;
    }
}
