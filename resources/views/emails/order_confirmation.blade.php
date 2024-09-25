<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Thank you for your order, {{ $orders[0]->name }}!</h1>
    

    @if($orders && count($orders) > 0)
        <ul>
            @php
                $total = 0;
            @endphp

            @foreach($orders as $order)
                <li>
                    <strong>Product:</strong> {{ $order->product_name }}<br>
                    <strong>Quantity:</strong> {{ $order->quantity }}<br>
                    <strong>Price:</strong> Tk. {{ $order->price }}<br>
                </li>
                <br>

                @php                   
                    $total += $order->price * $order->quantity;
                @endphp

            @endforeach
        </ul>

        <p><strong>Total Price: Tk. {{ $total }}</strong></p>
    
    @endif

    <p>Your order will be delivered to the address:</p>
    <p>{{ $orders[0]->addres }}</p>

    <p>Thank you for shopping with us!</p>
</body>
</html>
