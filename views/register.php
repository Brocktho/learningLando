<body>
    <form action="/register" method="POST">
        <h1>Register</h1>
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" required>
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </li>
            <input type="submit" name="submit" value="Register">
        </ul>
    </form>
</body>