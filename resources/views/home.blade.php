<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up</title>
</head>
<body>
  <div style="display:flex;justify-content:center;align-items:center;height:100vh;">
    <form action="/sign-up" method="POST" style="display:flex;flex-direction:column;width:280px;gap:10px;" novalidate>
      @csrf

      <h2>Sign Up</h2>
      
      <input type="text" name="first_name" id="name" placeholder="First Name" required value="{{ old('first_name') }}">
      <small class="hint" aria-live="polite" style="min-height:1em;color:#c00;"></small>
      @error('name')<small style="color:#c00">{{ $message }}</small>@enderror

      <input type="text" name="second_name" id="second_name" placeholder="Second Name" required value="{{ old('second_name') }}">
      <small class="hint" aria-live="polite" style="min-height:1em;color:#c00;"></small>
      @error('surname')<small style="color:#c00">{{ $message }}</small>@enderror

      <input type="email" name="email" id="email" placeholder="Email" required autocomplete="email" value="{{ old('email') }}">
      <small class="hint" aria-live="polite" style="min-height:1em;color:#c00;"></small>
      @error('email')<small style="color:#c00">{{ $message }}</small>@enderror

      <input type="password" name="password" id="password" placeholder="Password" required minlength="8" autocomplete="new-password">
      <small class="hint" aria-live="polite" style="min-height:1em;color:#c00;"></small>
      @error('password')<small style="color:#c00">{{ $message }}</small>@enderror

      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" required autocomplete="new-password">
      <small class="hint" aria-live="polite" style="min-height:1em;color:#c00;"></small>

      <button type="submit" id="submitBtn">Register</button>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const form = document.querySelector('form');
      const password = document.getElementById('password');
      const confirm  = document.getElementById('password_confirmation');
      const submit   = document.getElementById('submitBtn');

      const getHint = (input) =>
        input.nextElementSibling && input.nextElementSibling.classList.contains('hint')
          ? input.nextElementSibling : null;

      function showHint(input, msg) {
        const hint = getHint(input);
        if (hint) hint.textContent = msg || '';
      }

      function validatePassword() {
        let msg = '';
        if (password.value.length && password.value.length < 8) {
          msg = 'Password must be at least 8 characters.';
        }
        showHint(password, msg);
        // let built-in minlength/required handle blocking; don't override unless needed
        password.setCustomValidity(msg ? msg : '');
      }

      function validateConfirm() {
        let msg = '';
        if (confirm.value && confirm.value !== password.value) {
          msg = 'Passwords do not match.';
        }
        showHint(confirm, msg);
        confirm.setCustomValidity(msg ? msg : '');
      }

      // Basic "required" hints (optional nicety)
      form.querySelectorAll('input[required]').forEach((input) => {
        input.addEventListener('blur', () => {
          if (!input.value.trim()) showHint(input, 'This field is required.');
        });
        input.addEventListener('input', () => {
          if (input.value.trim()) showHint(input, '');
        });
      });

      password.addEventListener('input', () => {
        validatePassword();
        validateConfirm(); // keep in sync when password changes
      });
      confirm.addEventListener('input', validateConfirm);

      form.addEventListener('submit', (e) => {
        validatePassword();
        validateConfirm();
        if (!form.checkValidity()) {
          e.preventDefault();
          form.reportValidity();
        }
      });

      // Optional: disable button until valid
      const toggleButton = () => { submit.disabled = !form.checkValidity(); };
      form.addEventListener('input', toggleButton);
      toggleButton();
    });
  </script>
</body>
</html>