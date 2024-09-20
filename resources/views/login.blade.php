<h1>Login Page</h1>
<form action="/check_login" method="POST">
    <input type="text" name="email" placeholder="Email" id="">
    <input type="text" name="password" placeholder="Passwords" id="">
    <button text="submit">Login</button>
    @csrf
</form>