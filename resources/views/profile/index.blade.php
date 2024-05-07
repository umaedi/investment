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
                    name="bank_name"
                    value="{{ $user['bank_name'] }}"
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
                {{-- <div class="mb-3 col-md-6">
                  <a href="{{ $user['file_ktp'] }}" class="btn btn-primary btn-block">KTP</a>
                  <a href="{{ $user['file_pks'] }}" class="btn btn-primary btn-block">PKS</a>
                </div> --}}
              </div>
            </div>
        </div>
      </form>
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
