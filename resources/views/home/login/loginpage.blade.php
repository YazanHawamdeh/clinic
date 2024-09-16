<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/login.css">

  <title>Login</title>
</head>

<body>
@include('home.navbar')


  <div class="center-container">
    <div class="login-container">
      <h1>Enter Your Account</h1>
      <p class="subheading">It’s always great to have you back! Enter your information below to enter your account.</p>
      
      <!-- Laravel Blade Form -->
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-group mt-5">
          <label for="email" class="col-10">Email</label>
          <x-text-input id="email" class="col-4" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email Address"/>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-group mt-3">
          <label for="password" class="col-10">Password</label>
          <x-text-input id="password" class="col-4" type="password" name="password" required autocomplete="current-password" placeholder="Password"/>
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
          <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
          </label>
        </div>

        <!-- Forgot Password and Submit Button -->
        <a href="{{ route('password.request') }}" class="forgot-password mt-3">Forgot Password?</a>
        <button type="submit" class="submit-btn">Login</button>
      </form>
    </div>
  </div>

  @include('home.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="login.js"></script>
</body>

</html>
