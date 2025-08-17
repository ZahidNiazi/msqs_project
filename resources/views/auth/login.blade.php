<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary" style="background:#17a673;">
  <!-- Bootstrap 5 Login Form -->
<section class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
  <div class="bg-white p-4 rounded shadow w-100" style="max-width: 400px;">
    <h2 class="text-center text-success mb-4">Login to MCQs Mind</h2>

    <div id="error-message" class="text-danger text-center mb-3"></div>

    <form action="{{route('login.action')}}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Email or Username</label>
        <input type="text" id="email" name="email" class="form-control" required autocomplete="username">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <div class="input-group">
          <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
          <span class="input-group-text" style="cursor: pointer;" id="togglePassword">
            <i class="fas fa-eye text-muted"></i>
          </span>
        </div>
      </div>


      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
          <input type="checkbox" id="remember" name="remember" class="form-check-input">
          <label for="remember" class="form-check-label">Remember Me</label>
        </div>
        <a href="/forgot-password" class="text-success text-decoration-none">Forgot Password?</a>
      </div>

      <button type="submit" class="btn btn-success w-100">Login</button>
    </form>

    <p class="mt-3 text-center text-muted">Don't have an account?
      <a href="{{ route('register') }}" class="text-success text-decoration-none">Register here</a>
    </p>
  </div>
</section>

<!-- JavaScript -->
<script>
  // Toggle password visibility
  document.getElementById('togglePassword')?.addEventListener('click', function () {
    const input = document.getElementById('password');
    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
    input.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
  });

  // Error message from URL parameter
  const urlParams = new URLSearchParams(window.location.search);
  const error = urlParams.get('error');
  if (error) {
    const errorMessage = document.getElementById('error-message');
    if (error === 'invalid_credentials') {
      errorMessage.textContent = 'Invalid email or password.';
    } else {
      errorMessage.textContent = 'An error occurred. Please try again.';
    }
  }

  // Newsletter alert with email validation (if used elsewhere)
  function newsletterAlert(event) {
    event.preventDefault();
    const emailInput = event.target.querySelector('input[type="email"]');
    const email = emailInput.value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const successDiv = document.getElementById('newsletter-success');

    if (emailRegex.test(email)) {
      successDiv.textContent = "Thank you for subscribing! Please check your email for confirmation.";
      successDiv.classList.remove('d-none');
      emailInput.value = '';
    } else {
      successDiv.textContent = "Please enter a valid email address.";
      successDiv.classList.remove('d-none');
    }
  }
</script>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
