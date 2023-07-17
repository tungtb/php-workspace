<?php

namespace OrderDemo2;

// interface AOrderState {
//     function setOrder(Order $order);
//     function changeToCancelled(Order $order);
// }

interface IOrderState 
{
    function toWaitingForConfirmation();

    function toRequestSupport();

    function toLookingForDriver();

    function toRestaurantIsPreparing();

    function toRestaurantIsReady();

    function toDriverNotFound();

    function toShipping();

    function toCustomerRejected();

    function toCompleted();

    function toRefunded();

    function toCancelled();
}

abstract class AOrderState implements IOrderState
{
    /**
     * @var Order
     */
    protected $order;

    public function setOrder(Order $order)
    {
        $this->order = $order;
    }

    public function toWaitingForConfirmation(){
        return 'Default toWaitingForConfirmation';
    }
}

class DefaultState extends AOrderState {
    
    function __construct(Order $order) {
        $this->setOrder($order);
    }

    public function toWaitingForConfirmation(){
        return parent::toWaitingForConfirmation() . ' (Overrided)';
    }

    public function toRequestSupport(){}

    public function toLookingForDriver(){}

    public function toRestaurantIsPreparing(){}

    public function toRestaurantIsReady(){}

    public function toDriverNotFound(){}

    public function toShipping(){}

    public function toCustomerRejected(){}

    public function toCompleted(){}

    public function toRefunded(){}

    function toCancelled()
    {
        return "Order has updated from " . get_class($this) . " to Cancelled";
    }
}

class WaitForConfirmation extends AOrderState {
    
    function __construct(Order $order) {
        $this->setOrder($order);
    }

    public function toWaitingForConfirmation(){
        return 'WaitForConfirmation toWaitingForConfirmation';
    }

    public function toRequestSupport(){}

    public function toLookingForDriver(){}

    public function toRestaurantIsPreparing(){}

    public function toRestaurantIsReady(){}

    public function toDriverNotFound(){}

    public function toShipping(){}

    public function toCustomerRejected(){}

    public function toCompleted(){}

    public function toRefunded(){}

    function toCancelled()
    {
        return "Order has updated from " . get_class($this) . " to Cancelled";
    }
}

class LookingForDriver extends AOrderState {
    
    function __construct(Order $order) {
        $this->setOrder($order);
    }

    public function toWaitingForConfirmation(){
        return 'LookingForDriver toWaitingForConfirmation';
    }

    public function toRequestSupport(){}

    public function toLookingForDriver(){}

    public function toRestaurantIsPreparing(){}

    public function toRestaurantIsReady(){}

    public function toDriverNotFound(){}

    public function toShipping(){}

    public function toCustomerRejected(){}

    public function toCompleted(){}

    public function toRefunded(){}

    function toCancelled()
    {
        return "Order has updated from " . get_class($this) . " to Cancelled";
    }
}

class RequestSupport extends AOrderState {
    
    function __construct(Order $order) {
        $this->setOrder($order);
    }

    public function toWaitingForConfirmation(){
        return 'RequestSupport toWaitingForConfirmation';
    }

    public function toRequestSupport(){}

    public function toLookingForDriver(){}

    public function toRestaurantIsPreparing(){}

    public function toRestaurantIsReady(){}

    public function toDriverNotFound(){}

    public function toShipping(){}

    public function toCustomerRejected(){}

    public function toCompleted(){}

    public function toRefunded(){}

    function toCancelled()
    {
        return "Order has updated from " . get_class($this) . " to Cancelled";
    }
}

// class LookingForDriver implements AOrderState {
    
//     function __construct() {
        
//     }

//     function setOrder(Order $order) {
//         $order->setState($this);
//         return "Order has updated to LookingForDriver";
//     }

//     function toCancelled(Order $order)
//     {
//         return "Order has updated from " . get_class($this) . " to Cancelled";
//     }
// }

// class RequestSupport implements AOrderState {
    
//     function __construct() {
        
//     }

//     function setOrder(Order $order) {
//         $order->setState($this);
//         return "Order has updated to RequestSupport";
//     }

//     function toCancelled(Order $order)
//     {
//         return "Order has updated from " . get_class($this) . " to Cancelled";
//     }
// }

class Order
{
    private AOrderState $orderState;

    function __construct()
    {
        $this->setState(OrderStatusFactory::getOrderStatus($this));
    }

    function getOrderStatus()
    {
        return rand(0,5);
    }

    function setState(AOrderState $orderState)
    {
        $this->orderState = $orderState;		
    }
  
    function getState()
    {
        return $this->orderState;
    }
}

function writeln($line = '') {
    echo $line."<br/>";
}

class OrderStatusFactory {
	
    static function getOrderStatus(Order $order){	
        $status = $order->getOrderStatus();
        if($status === 1){
            return new WaitForConfirmation($order);
        } 
        else if($status === 0){
            return new LookingForDriver($order);
        } 
        else if($status === 2){
            return new RequestSupport($order);
        }  
        return new DefaultState($order);
    }
 }

$order = new Order();
// writeln($order->getState()->toCancelled());
writeln($order->getState()->toWaitingForConfirmation());



