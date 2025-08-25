<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Auth</title>
</head>
<body>
  <div class="wrap">
    <!-- SIGN UP -->
    <fieldset>
      <legend>Sign Up</legend>
      <form action="/sign-up" method="POST" novalidate>
        @csrf

        <div class="row">
          <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
            @error('first_name')<div class="err">{{ $message }}</div>@enderror
          </div>
          <div>
            <label for="second_name">Second Name</label>
            <input type="text" name="second_name" id="second_name" value="{{ old('second_name') }}" required>
            @error('second_name')<div class="err">{{ $message }}</div>@enderror
          </div>
        </div>

        <div>
          <label for="signup_email">Email</label>
          <input type="email" name="email" id="signup_email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')<div class="err">{{ $message }}</div>@enderror
        </div>

        <div>
          <label for="signup_password">Password</label>
          <input type="password" name="password" id="signup_password" required autocomplete="new-password">
          @error('password')<div class="err">{{ $message }}</div>@enderror
        </div>

        <button type="submit">Register</button>
      </form>
    </fieldset>

    <!-- LOG IN -->
    <fieldset>
      <legend>Log In</legend>
      <form action="/login" method="POST" novalidate>
        @csrf

        <div>
          <label for="login_email">Email</label>
          <input type="email" name="login_email" id="login_email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')<div class="err">{{ $message }}</div>@enderror
        </div>

        <div>
          <label for="login_password">Password</label>
          <input type="password" name="login_password" id="login_password" required autocomplete="current-password">
          @error('password')<div class="err">{{ $message }}</div>@enderror
        </div>

        <button type="submit">Log In</button>
      </form>
    </fieldset>
  </div>
</body>
</html>