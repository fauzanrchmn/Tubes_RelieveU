@extends('layouts.loginLayout')

@section('content')
<section class="h-100 gradient-form" style="background: linear-gradient(135deg, #f9d5d3); min-height: 100vh;">
  <div class="container-xxl py-5 h-400">
      <div class="col-xl-10">
        <div class="shadow rounded-3 bg-white">
          <div class="row g-2">
            <!-- Left Side: Form -->
            <div class="col-lg-6">
              <div class="card-body p-md-5 text-black">
                <a href="/" class="btn btn-light position-absolute top-0 start-0 m-3">
                  <span class="fw-bold text-danger">
                    <i class="bi bi-box-arrow-left"></i>
                  </span>
                </a>
                <div class="text-center">
                  <h4 class="mb-5 pb-2 text-danger">Admin Log In</h4>
                </div>

                <form method="POST" action="{{ route('layouts.login') }}">
                  @csrf
                  <!-- Email -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email address" />
                    @if($errors->has('email'))
                      <div class="alert alert-danger mt-2">
                        {{ $errors->first('email') }}
                      </div>
                    @endif
                  </div>

                  <!-- Password -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    @if($errors->has('password'))
                      <div class="alert alert-danger mt-2">
                        {{ $errors->first('password') }}
                      </div>
                    @endif
                  </div>

                  <!-- Remember Me -->
                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="check_example" id="check_example">
                    <label class="form-check-label" for="check_example">Keep me logged in</label>
                  </div>

                  <!-- Submit Button -->
                  <div class="text-center">
                    <button class="btn btn-danger btn-lg btn-block" type="submit">Log In</button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Right Side: Description -->
            <div class="col-lg-6 d-flex align-items-center" style="background: linear-gradient(135deg, #f7a1a0, #f67171);">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Relieve U Management System</h4>
                <p class="medium mb-0">
                  Aplikasi berbasis web yang efisien untuk pengelolaan Dokter, Pasien, dan Konten - Konten menarik tentang Kesehatan Mental.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
