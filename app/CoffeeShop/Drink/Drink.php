<?php

namespace CoffeeShop\Drink;

/**
 * Abstract class representing a generic drink in a coffee order.
 *
 * @property string $cupText Text to be written on the cup for this drink.
 */
abstract class Drink
{
    /**
     * @var string Text to be written on the cup for this drink.
     */
    protected $cupText;

    /**
     * Drink constructor.
     *
     * @param string $cupText Text to be written on the cup for this drink.
     */
    public function __construct(string $cupText)
    {
        $this->cupText = $cupText;
    }

    /**
     * Get the text to be written on the cup for this drink.
     *
     * @return string Cup text.
     */
    public function getCupText(): string
    {
        return $this->cupText;
    }

    /**
     * Get an array of components that make up this drink.
     *
     * @return array Array of components.
     */
    abstract public function getDrinkComponents(): array;

    /**
     * Get the type of the drink (e.g., coffee, tea).
     *
     * @return string Type of the drink.
     */
    abstract public function getType(): string;

    /**
     * Get a user-friendly name for the drink.
     *
     * @return string User-friendly name.
     */
    abstract public function getFriendlyName(): string;

    /**
     * Check if the drink contains milk.
     *
     * @return bool True if the drink should contain milk, false otherwise.
     */
    abstract public function hasMilk(): bool;
}
