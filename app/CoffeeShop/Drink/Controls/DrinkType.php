<?php

namespace CoffeeShop\Drink\Controls;

/**
 * Enum representing different types of drinks in a coffee shop.
 *
 * This enum defines four drink types: LATTE, ESPRESSO, ENGLISH_TEA, and AMERICANO.
 * Each type is represented by a string value.
 */
enum DrinkType: string
{
    // Enum values representing drink types
    case LATTE = 'latte';
    case ESPRESSO = 'espresso';
    case ENGLISH_TEA = 'englishtea';
    case AMERICANO = 'americano';
}
