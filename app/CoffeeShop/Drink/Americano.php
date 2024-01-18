<?php

namespace CoffeeShop\Drink;

/**
 * Represents an Americano drink in a coffee shop.
 *
 * This class extends the abstract Drink class and provides specific
 * implementations for an Americano drink, including its components,
 * type, friendly name, and whether it contains milk.
 *
 * @property string $cupText Text to be written on the cup for this Americano.
 */
class Americano extends Drink
{
    /**
     * Constructor for Americano class.
     *
     * @param string $cupText Text to be written on the cup for this Americano.
     */
    public function __construct(string $cupText)
    {
        // Append the friendly name to the cup text
        $cupText .= ' ' . $this->getFriendlyName();

        // Call the parent constructor with the modified cup text
        parent::__construct($cupText);
    }

    /**
     * Get an array of components that make up this Americano drink.
     *
     * @return array Array of components.
     */
    public function getDrinkComponents(): array
    {
        return [
            'shot of coffee',
            'hot water'
        ];
    }

    /**
     * Get the type of the drink (Americano).
     *
     * @return string Type of the drink.
     */
    public function getType(): string
    {
        return 'coffee';
    }

    /**
     * Get a user-friendly name for the Americano drink.
     *
     * @return string User-friendly name.
     */
    public function getFriendlyName(): string
    {
        return 'an Americano';
    }

    /**
     * Check if the Americano drink contains milk.
     *
     * @return bool True if the drink contains milk, false otherwise.
     */
    public function hasMilk(): bool
    {
        return false;
    }
}
