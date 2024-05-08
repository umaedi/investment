@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="fw-light"><a href="/lender/dashboard">Dashboard</a>/</span> Account</h4>
    <div class="row">
      <div class="col-md-6 mb-3">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item d-flex">
            <a class="nav-link active me-2" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
            <form id="logout">
              <button id="btnLogout" type="submit" class="btn btn-danger">Logout</button>
            </form>
          </li>
          <button id="btnLogoutLoading" class="btn btn-danger d-none" type="button">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Please wait...
          </button>
        </ul>
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
          <hr class="my-0" />
          <div class="card-body">
            <form id="formUpdateAccount">
              @csrf
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="nik" class="form-label">NIK</label>
                  <input
                    class="form-control"
                    type="text"
                    id="nik"
                    name="nik"
                    value="{{ $user['nik'] }}"
                    readonly
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="name" class="form-label">Name</label>
                  <input class="form-control" type="text" name="name" id="name" value="{{ $user['name'] }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    value="{{ $user['email'] }}"
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="address" class="form-label">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    value="{{ $user['address'] }}"
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="Birthday Addrees">Birthday Address</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="text"
                      id="Birthday Addrees"
                      name="birthday_address"
                      class="form-control"
                      value="{{ $user['birthday_address'] }}"
                    />
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="Birthday Date" class="form-label">Birthday Date</label>
                  <input type="text" class="form-control" id="Birthday Date" name="birthday_date" value="{{ $user['birthday_date'] }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="phone_number" class="form-label">Phone Number</label>
                  <input class="form-control" type="text" id="phone_number" name="phone_number" value="{{ $user['phone_number'] }}" />
                </div>
                <div class="mb-3 col-md-3">
                  <label for="gender" class="form-label">Gender</label>
                  <select name="gender" class="form-select" aria-label="Default select example">
                    <option value="1">{{ $user['gender'] == 'L' ? 'Male' : 'Female'}}</option>
                    <option value="L">Male</option>
                    <option value="P">Female</option>
                  </select>
                </div>
                <div class="mb-3 col-md-3">
                  <label for="age" class="form-label">Age</label>
                  <input
                    type="text"
                    class="form-control"
                    id="age"
                    name="age"
                    value="{{ $user['age'] }}"
                  />
                </div>
              </div>
              <div class="mt-2">
                <button id="btnLoading" class="btn btn-primary d-none" type="button">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Please wait...
                </button>
                <button id="btnSubmit" type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
              </div>
          </div>
          <!-- /Account -->
        </div>
      </div>
      <div class="col-md-6">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Emergency Information</a>
          </li>
        </ul>
        <div class="card">
          <div class="card-body">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="emergency_name" class="form-label">Emergency Name</label>
                  <input
                    class="form-control"
                    type="text"
                    id="emergency_name"
                    name="emergency_name"
                    value="{{ $user['emergency_name'] }}"
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="emergency_relation" class="form-label">Emergency Relation</label>
                  <input class="form-control" type="text" name="emergency_relation" id="emergency_relation" value="{{ $user['emergency_relation'] }}" />
                </div>
                <div class="mb-3 col-md-12">
                  <label for="emergency_phone_number" class="form-label">Emergency Phone Number</label>
                  <input class="form-control" type="text" name="emergency_phone_number" id="emergency_phone_number" value="{{ $user['emergency_phone_number'] }}" />
                </div>
              </div>
            </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="bank_name" class="form-label">Bank Name</label>
                  <input
                    class="form-control"
                    type="text"
                    id="bank_name"
                    value="{{ $user['bank_name'] }}"
                    readonly
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="bank_account_number" class="form-label">Bank Account Number</label>
                  <input class="form-control" type="text" id="bank_account_number" readonly value="{{ $user['bank_account_number'] }}" />
                </div>
                <div class="mb-3 col-md-12">
                  <label for="bank_account_name" class="form-label">Bank Account Name</label>
                  <input class="form-control" type="text" id="bank_account_name" readonly value="{{ $user['bank_account_name'] }}" />
                </div>
              </div>
            </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </symbol>
              <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
              </symbol>
              <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>
            <div class="d-flex align-items-center" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
              <div>
            Perhatian !! Jika anda merasa terdapat kesalahan maupun ingin melakukan pengkinian data pada data rekening, anda dapat menghubungi kami melalui kontak resmi <a href="https://duluin.com">duluin.com</a> 
            <span></span>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="my-3">
        <button class="btn btn-primary funding-balance"><i class='bx bx-credit-card-alt'></i>Funding Balance</button>
        <a href="/lender/export/funding_balance" class="btn btn-primary"><i class='bx bx-spreadsheet'></i>Export</a>
        <a href="/lender/print/funding_balance" class="btn btn-primary"><i class='bx bx-printer' ></i>PDF/Print</a>
    </div>
      <div class="card mb-4">
        <button id="loading" class="btn btn-primary d-none" type="button">
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
        </button>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Transaction Date</th>
                  <th>Bank Name</th>
                  <th>Bank Acount Number</th>
                  <th>Debit</th>
                  <th>Credit</th>
                  <th>Close Balance</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody id="dataTable">
                
              </tbody>
            </table>
          </div>
        </div>
    </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        loadTable();
      });

      async function loadTable()
      {
        var param = {
          url: '{{ url()->current() }}',
          method: 'GET',
          data: {
            load: 'table'
          }
        }

        loading(true);
        await transAjax(param).then((result) => {
          loading(false)
          $('#dataTable').html(result);
        }).catch((err) => {
          loading(false);
          return alert(err.message)
        });
      }

      function loading(state)
      {
        if(state) {
          $('#loading').removeClass('d-none');
        }else{
          $('#loading').addClass('d-none');
        }
      }

      //update acount
      $('#formUpdateAccount').submit(async function(e) {
        e.preventDefault();

        var data = new FormData(this);
        var param = {
          url: '/lender/update_account',
          method: 'POST',
          data: data,
          processData: false,
          contentType: false,
          cache: false
        }

        loadingsubmit(true);
        await transAjax(param).then((result) => {
          loadingsubmit(false);
          swal({
              text: result.message,
              icon: 'success',
              timer: 3000,
          }).then(() => {
              loadingsubmit(false);
              window.location.href = '/lender/profile';
          });
        }).catch((err) => {
          swal({ title: 'Success', text: "Internal Server Error!", icon: 'error' });
        });

        function loadingsubmit(state)
        {
          if(state) {
            $('#btnLoading').removeClass('d-none');
            $('#btnSubmit').addClass('d-none');
          }else {
            $('#btnLoading').addClass('d-none');
            $('#btnSubmit').removeClass('d-none');
          }
        }
      })

      $('#logout').submit(async function(e){
        e.preventDefault();

        var data = new FormData(this);
        var param = {
          url: '/lender/logout',
          method: 'POST',
          data: data,
          processData: false,
          contentType: false,
          cache: false
        }

        loadingLogout(true);
        await transAjax(param).then((result) => {
          loadingLogout(false);
          swal({
              text: result.message,
              icon: 'success',
              timer: 3000,
          }).then(() => {
              loadingLogout(false);
              window.location.href = '/';
            });
          }).catch((err) => {
          loadingLogout(false);
          swal({ title: 'Success', text: "Internal Server Error!", icon: 'error' });
        });

        function loadingLogout(state)
        {
          if(state) {
            $('#btnLogoutLoading').removeClass('d-none');
            $('#btnLogout').addClass('d-none');
          }else {
            $('#btnLogoutLoading').addClass('d-none');
            $('#btnLogout').removeClass('d-none');
          }
        }

      });
    </script>
@endpush
