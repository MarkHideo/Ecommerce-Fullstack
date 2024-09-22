<h1>Hi, {{ $nameInfo }}</h1>
<h2>Thank you for your order!</h2>
<p>Please confirm your order by clicking the link below:</p>
<a href="{{ url('/order/confirm/' . $token) }}">Confirm Order</a>  