<?php
namespace AvoRed\Framework\Shipping;

interface ShippingInterface
{
    /**
     * Get the identifier
     *
     * @return string
     */
    public function getIdentifier();

    /**
     * Get the title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get the amount
     *
     * @return string
     */
    public function getAmount();
}
