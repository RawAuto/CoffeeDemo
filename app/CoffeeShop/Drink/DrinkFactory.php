<?php

namespace CoffeeShop\Drink;

use CoffeeShop\Drink\Controls\DrinkType;

/**
 * Factory class responsible for creating instances of different drinks based on their types.
 */
class DrinkFactory
{
    /**
     * Create a new drink instance based on the provided drink type and name.
     *
     * @param DrinkType $drinkType The type of the drink.
     * @param string $name The name associated with the drink.
     *
     * @return Drink|null An instance of the created drink, or null if the class doesn't exist.
     */
    public static function createDrink(DrinkType $drinkType, string $name): ?Drink
    {
        // Construct the fully qualified class name based on the provided drink type
        $className = 'CoffeeShop\\Drink\\' . ucfirst($drinkType->value);

        // Check if the class exists before attempting to create an instance
        if (class_exists($className)) {
            return new $className($name);
        }

        // Return null if the class doesn't exist
        return null;
    }
}
