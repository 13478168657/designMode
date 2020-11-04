<?php

namespace strategy;


class Order
{
    /**
     * For the sake of simplicity, we'll store all created orders here...
     *
     * @var array
     */
    private static $orders = [];

    /**
     * ...and access them from here.
     *
     * @param int $orderId
     * @return mixed
     */
    public static function get($orderId = null)
    {
        if ($orderId === null) {
            return static::$orders;
        } else {
            return static::$orders[$orderId];
        }
    }

    public function __construct($attributes)
    {
        $this->id = count(static::$orders);
        $this->status = "new";
        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }
        static::$orders[$this->id] = $this;
    }

    /**
     * The method to call when an order gets paid.
     */
    public function complete()
    {
        $this->status = "completed";
        echo "Order: #{$this->id} is now {$this->status}.";
    }
}