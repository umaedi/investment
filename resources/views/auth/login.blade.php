@extends('layouts.auth')
@section('content')
       <!-- Content -->
       <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
              <span id="notif"></span>
              <div class="card-body">
                <!-- Logo -->
                {{-- <div class="app-brand text-center">
                  <a href="/">
                      <img src="{{ asset('img/logo/logo.webp') }}" alt="" width="50%">
                  </a>
                </div> --}}
                <!-- /Logo -->
                {{-- <h4 class="mb-2">Welcome Lender! 👋</h4> --}}
                <h4 class="mb-4">Please sign-in to your account</h4>
  
                <form id="formAuthentication" class="mb-3">
                    @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                      type="text"
                      class="form-control"
                      id="email"
                      name="email"
                      placeholder="Enter your email"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Password</label>
                      <a href="/lender/forgot-password">
                        <small>Forget Password?</small>
                      </a>
                    </div>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember-me" />
                      <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                  </div>
                  <div class="mb-3">
                    <button id="btn_loading" class="btn btn-primary w-100 d-none" type="button" disabled>
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Please wait...
                    </button>
                    <button id="btn_submit" class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                  </div>
                </form>
  
                {{-- <p class="text-center">
                  <span>New on our platform?</span>
                  <a href="auth-register-basic.html">
                    <span>Create an account</span>
                  </a>
                </p> --}}
              </div>
            </div>
            <!-- /Register -->
          </div>
        </div>
      </div>
      <!-- / Content -->
@endsection
@push('js')
    <script type="text/javascript">
      $('#formAuthentication').submit(async function(e) {
        e.preventDefault();

        var credential = {
          email: $('#email').val(),
          password: $('#password').val()
        }
        var param = {
          url: '{{ url()->current() }}',
          method: 'GET',
          data: credential
        }
        loading(true);
        await transAjax(param).then((result) => {
          loading(false);
          if(result.message == 'akses_diterima') {
            window.location.href = result.metadata;
          }
          $('#notif').html(` <div class="alert alert-warning">${result.message}</div>`);
        }).catch((err) => {
          loading(false);
          return alert(err)
        });
      });

      function loading(state)
      {
        if(state) {
          $('#btn_loading').removeClass('d-none');
          $('#btn_submit').addClass('d-none');
        }else {
          $('#btn_loading').addClass('d-none');
          $('#btn_submit').removeClass('d-none');
        }
      }
    </script>
@endpush
