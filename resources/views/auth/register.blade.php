<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Register - MCQs Mind</title>

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Custom font (optional) -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-light">
  <section class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="bg-white p-4 rounded shadow w-100" style="max-width: 500px;">
      <h2 class="text-center text-success mb-4">Create an Account</h2>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li class="small">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('register.save') }}" method="POST" class="user">
        @csrf

        <div class="mb-3">
          <label for="exampleInputName" class="form-label fw-semibold">Name</label>
          <input type="text" name="name" id="exampleInputName"
            class="form-control @error('name') is-invalid @enderror"
            placeholder="Enter your name" value="{{ old('name') }}">
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail" class="form-label fw-semibold">Email</label>
          <input type="email" name="email" id="exampleInputEmail"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="Enter your email" value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="row mb-3">
          <div class="col-sm-6">
            <label for="exampleInputPassword" class="form-label fw-semibold">Password</label>
            <input type="password" name="password" id="exampleInputPassword"
              class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-sm-6">
            <label for="exampleRepeatPassword" class="form-label fw-semibold">Repeat Password</label>
            <input type="password" name="password_confirmation" id="exampleRepeatPassword"
              class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Repeat Password">
            @error('password_confirmation')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <button type="submit" class="btn btn-success w-100 mb-3">Register Account</button>
      </form>

      <p class="text-center mb-1">
        <a href="{{ route('login') }}" class="text-decoration-none text-success small">Already have an account? Login!</a>
      </p>
      <p class="text-center">
        <a href="{{url('/')}}" class="text-decoration-none text-muted small">Back to website</a>
      </p>
    </div>
  </section>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
