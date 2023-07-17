<?php

namespace OrderDemo;

class Order 
{
    private OrderState $orderState;

    public function __construct(OrderState $state)
    {
        $this->setOrderState($state);
    }

    public function setOrderState(OrderState $state): void
    {
        echo "Order: set state to " . get_class($state) . ".\n";
        $this->orderState = $state;
        $this->orderState->setOrder($this);
    }

    public function cancelled(): void
    {
        $this->orderState->cancelled();
    }

    public function completed(): void
    {
        $this->orderState->completed();
    }
}

abstract class OrderState
{
    /**
     * @var Order
     */
    protected $order;

    public function setOrder(Order $order)
    {
        $this->order = $order;
    }

    abstract public function waitingForConfirmation(): void;
    
    abstract public function requestSupport(): void;

    abstract public function lookingForDriver(): void;

    abstract public function restaurantIsPreparing(): void;

    abstract public function restaurantIsReady(): void;

    abstract public function driverNotFound(): void;

    abstract public function isShipping(): void;

    abstract public function customerRejected(): void;

    abstract public function completed(): void;

    abstract public function cancelled(): void;

    abstract public function refunded(): void;

    // Add more actions of order ...
}

class WaitForConfirmation extends OrderState
{
    public function waitingForConfirmation(): void
    {
        echo "ConcreteStateA handles request1.\n";
        echo "ConcreteStateA wants to change the state of the context.\n";
        // $this->context->transitionTo(new ConcreteStateB());
    }

    public function requestSupport(): void
    {
        echo "ConcreteStateA handles request2.\n";
    }

    public function lookingForDriver(): void
    {
        
    }

    public function restaurantIsPreparing(): void
    {
        
    }
    
    public function restaurantIsReady(): void
    {
        
    }

    public function driverNotFound(): void
    {
        
    }

    public function isShipping(): void
    {
        
    }

    public function customerRejected(): void
    {
        
    }

    public function completed(): void
    {
        
    }

    public function cancelled(): void
    {
        
    }

    public function refunded(): void
    {
        
    }
}

$order = new Order(new WaitForConfirmation());
