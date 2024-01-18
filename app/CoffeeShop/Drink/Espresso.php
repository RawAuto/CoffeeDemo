<?php

namespace CoffeeShop\Drink;

/**
 * Represents an Espresso drink in a coffee shop.
 *
 * This class extends the abstract Drink class and provides specific
 * implementations for an Espresso drink, including its components,
 * type, friendly name, and whether it contains milk.
 *
 * @property string $cupText Text to be written on the cup for this Espresso.
 */
class Espresso extends Drink
{
    /**
     * Constructor for Espresso class.
     *
     * @param string $cupText Text to be written on the cup for this Espresso.
     */
    public function __construct(string $cupText)
    {
        // Append the friendly name to the cup text
        $cupText .= ' ' . $this->getFriendlyName();

        // Call the parent constructor with the modified cup text
        parent::__construct($cupText);
    }

    /**
     * Get an array of components that make up this Espresso drink.
     *
     * @return array Array of components.
     */
    public function getDrinkComponents(): array
    {
        return [
            'shot of coffee'
        ];
    }

    /**
     * Get the type of the drink (Espresso).
     *
     * @return string Type of the drink.
     */
    public function getType(): string
    {
        return 'coffee';
    }

    /**
     * Get a user-friendly name for the Espresso drink.
     *
     * @return string User-friendly name.
     */
    public function getFriendlyName(): string
    {
        return 'an Espresso';
    }

    /**
     * Check if the Espresso drink contains milk.
     *
     * @return bool True if the drink contains milk, false otherwise.
     */
    public function hasMilk(): bool
    {
        return false;
    }
}
