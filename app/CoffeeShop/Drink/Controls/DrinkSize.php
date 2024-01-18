<?php

namespace CoffeeShop\Drink\Controls;

/**
 * Enum representing different sizes for drinks in a coffee shop.
 *
 * This enum defines three drink sizes: SMALL, MEDIUM, and LARGE.
 * It also provides a method to retrieve a string representation of
 * the size based on the enum value.
 */
enum DrinkSize: int
{
    case SMALL = 0;
    case MEDIUM = 1;
    case LARGE = 2;

    /**
     * Get the string representation of the drink size.
     *
     * @return string String representation of the size (small, medium, or large).
     */
    public function getSize(): string
    {
        switch ($this) {
            case self::SMALL:
                return 'small';
            case self::MEDIUM:
                return 'medium';
            case self::LARGE:
                return 'large';
            default:
                // Default to 'small' if an unknown size is encountered
                return 'small';
        }
    }
}
