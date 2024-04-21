@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0b">
        <div class="card" style="background-color: #076759">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7 hero-title">
              <div class="card-body">
                <h3 class="card-title" style="color: #fff">Welcome back👋</h3>
                <p class="text-white">
                  Welcome to the Lender Financial Reporting Dashboard! We hope this dashboard serves as a useful tool for you in making informed and strategic decisions.
                </p>
                <a href="/lender/profile" class="btn btn-sm btn-light" style="color: #076759"><i class='bx bx-badge-check'></i>Member Pemula</a>
                <a href="/lender/profile" class="btn btn-sm btn-warning" style="color: #fff"><i class="bx bx-user me-1"></i>My Profile</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="{{ asset('img') }}/illustrations/man-with-laptop-light.png" height="190" loading="lazy"
                  alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 mb-2 order-0">
        <div class="row">
          <div class="col-12 col-md-6">
            <button class="btn btn-primary w-100 mb-3" id="currentTransaction">Current Transaction</button>
          </div>
          <div class="col-12 col-md-6">
            <button class="btn btn-primary w-100" id="sinceExist">Since Exist</button>
          </div>
        </div>
        <div class="row" id="rowCurrentTransaction">
          {{-- <h5>Current Transaction</h5> --}}
          <div class="col-lg-6">
            <div class="card mb-3 xmt-3" style="background-color: #ecba0b">
              <div class="row">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title text-white">Total Fund </h5>
                    <p class="card-text text-white">
                      {{ formatRp($static_report['current']['total_investment']) }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3" style="background-color: #ecba0b">
              <div class="row g-0">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title text-white">Amount disbursed</h5>
                    <p class="card-text text-white">
                      {{ formatRp($static_report['current']['loan_project']) }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3" style="background-color: #ecba0b">
              <div class="row g-0">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title text-white">Total transactions</h5>
                    <p class="card-text text-white">
                      {{ $static_report['since_exist']['total_transaction'] }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3" style="background-color: #ecba0b">
              <div class="row g-0">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title text-white">Available fund</h5>
                    <p class="card-text text-white">
                      {{ formatRp($static_report['current']['avalaible_amount']) }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3 d-none" id="rowSinceExist">
          {{-- <h5>Current Transaction</h5> --}}
          <div class="col-lg-4">
            <div class="card mb-3" style="background-color: #ecba0b">
              {{-- <div class="row g-0">
                <div class="col-md-8"> --}}
                  <div class="card-body">
                    <h5 class="card-title text-white">Total Transactions</h5>
                    <p class="card-text text-white">
                      {{ $static_report['since_exist']['total_transaction'] }}
                    </p>
                  </div>
                {{-- </div>
              </div> --}}
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-3" style="background-color: #ecba0b">
              {{-- <div class="row g-0">
                <div class="col-md-8"> --}}
                  <div class="card-body">
                    <h5 class="card-title text-white">Total Amount</h5>
                    <p class="card-text text-white">
                      {{ formatRp($static_report['since_exist']['total_amount']) }}
                    </p>
                  </div>
                {{-- </div>
              </div> --}}
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-3" style="background-color: #ecba0b">
              {{-- <div class="row g-0">
                <div class="col-md-8"> --}}
                  <div class="card-body">
                    <h5 class="card-title text-white">Total Return</h5>
                    <p class="card-text text-white">
                      {{ formatRp($static_report['since_exist']['total_return']) }}
                    </p>
                  </div>
                {{-- </div>
              </div> --}}
            </div>
          </div>
        </div>
        </div>
        <div class="col-lg-4">
            <button class="btn btn-primary mb-3 w-100">Add Fund Investment</button>
            <div class="card" style="background-color: #076759">
              <div class="card-body">
                <form name="generateSpK">
                  <div class="form-group mb-2">
                    <label for="" class="text-white">Amount Investment
                    </label>
                    <input type="text" name="nominal" class="form-control" onkeyup="addfundInvesment(this)">
                  </div>
                  <div class="form-group">
                    <label for="" class="text-white">Periode Amount</label>
                    <select name="periode" class="form-select" id="">
                      <option value="3">3</option>
                      <option value="6">6</option>
                      <option value="12">12</option>
                    </select>
                  </div>

                  <input type="hidden" name="no agreement" value="018/LENDER/02/2024">
                  <input type="hidden" name="tanggal perjanjian" value="{{ date('D M Y') }}">
                  <input type="hidden" name="NAME" value="UMAEDI KH">
                  <input type="hidden" name="Name Proper" value="umaedi">
                  <input type="hidden" name="NIK" value="123456789123456">
                  <input type="hidden" name="alamat" value="Way Kanan">
                  <input type="hidden" name="terbilang" value="Lima Puluh Juta">
                  <input type="hidden" name="tanggal investment" value="{{ date('D M Y') }}">
                  <input type="hidden" name="no rekening" value="12345">
                  <input type="hidden" name="nama bank" value="BRI">
                  <input type="hidden" name="nama rekening" value="UMAEDI">
                  <input type="hidden" name="phone" value="085741492045">
                  <input type="hidden" name="email" value="umaedi@duluin.com">
                  <button id="ceratespk" type="submit" class="btn btn-warning btn-block mt-2">Create Agreement</button>
                </form>
              </div>
            </div>
        </div>
      </div>
      <!-- Financial Statment -->
      {{-- <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 my-3">
        <div class="card">
          <div class="row row-bordered g-0">
            <div class="col-md-8">
              <h5 class="card-header m-0 me-2 pb-3">Financial Statment</h5>
              <img src="{{ asset('img/financial/financial-statment.png') }}" alt="Financial Statment Duluin" lazy="loading" width="100%">
            </div>
            <div class="col-md-4 py-5">
              <div class="card-body">
                <div class="text-center">
                  <div class="dropdown">
                    <button
                      class="btn btn-sm btn-outline-primary dropdown-toggle"
                      type="button"
                      id="growthReportId"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      2024
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                      <a class="dropdown-item" href="javascript:void(0);">2024</a>
                    </div>
                  </div>
                </div>
              </div>
              <div id="growthChart"></div>
              <div class="text-center fw-semibold pt-3 mb-3">78% Company Growth</div>

              <div class="ms-3">
                <div class="col-md-4">
                  <span class="badge bg-primary">Projection: {{ $static_report['financial_statment']['current_fund'] }}</span>
                </div>
                <div class="col-md-4">
                  <span class="badge bg-primary">Current Funding</span>
                </div>
                <div class="col-md-4">
                  <span class="badge bg-primary">Total Funding Needed</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- Financial Statment end-->
      <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
          <h5 class="card-header">Transaction</h5>
          <div class="card-body">
            <div class="row filter-transaction">
              <div class="col-md-2">
                <select class="form-select" id="month">
                  {{-- <option value="">--select month--</option> --}}
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-select" id="year">
                  {{-- <option value="">--status year--</option> --}}
                  @php
                  $tahun_sekarang = date('Y');
                  $tahun_mulai = 2024;
                  $tahun_akhir = $tahun_sekarang;
                  @endphp
              
                  @for ($tahun = $tahun_mulai; $tahun <= $tahun_akhir; $tahun++)
                      <option value="{{ $tahun }}">{{ $tahun }}</option>
                  @endfor
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-select" id="page" name="length">
                  {{-- <option value="">--perpage--</option> --}}
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-select" name="invest_status" id="status">
                  {{-- <option value="">--status--</option> --}}
                  <option value="">Show All Status</option>
                  <option value="disbursed">Disbursed</option>
                  <option value="repayment">Repayment</option>
                </select>
              </div>
              <div class="col-md-2 d-grid">
                <a href="/lender/export/transction" target="_blank" class="btn btn-primary btn-block"><i class='bx bx-spreadsheet'></i>Export</a>
              </div>
              <div class="col-md-2 d-grid">
                <a href="/lender/print/transction" class="btn btn-primary btn-block"><i class='bx bx-printer' ></i>PDF/Print</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
        <div class="row text-center d-none" id="loading">
          <div class="col">
            <button class="btn btn-primary" type="button">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Please wait...
            </button>
          </div>
        </div>
          <div class="card mt-3">
            <div class="card-body">
              <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Borrower Name</th>
                    <th>Loan Amount</th>
                    <th>Interest</th>
                    <th>Return</th>
                    <th>Margin</th>
                    <th>Repayment Date</th>
                    <th>Disbursed Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody id="dataTable">
                  
                </tbody>
              </table>
              </div>
            </div>
          </div>
          <!--/ Bordered Table -->
      </div>
      <div class="row">
      <div class="col-12 col-lg-4 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <h5 class="card-header">Come on, try simulating your investment 🎉</h5>
            <div class="card-body">
              <div class="form-group">
                <label for="">Min Funding</label>
                <input type="text" id="minFund" class="form-control" min="50000000" onkeyup="formatRupiah(this)">
              </div>
              <div class="form-group mt-3">
                <label for="">Periode</label>
                <select id="period" name="periode" class="form-select" id="">
                  <option value="3">3</option>
                  <option value="6">6</option>
                  <option value="12">12</option>
                </select>
              </div>
            </div>
            <button id="calculateBtn" class="btn btn-primary btn-block mt-3">Simulate</button>
          </div>
          <!--/ Bordered Table -->
      </div>
      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <div class="card h-100">
              <div class="card-body px-0">
                <div class="tab-content p-0">
                  <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                    <div class="d-flex p-4 pt-3 d-none" id="profit">
                      <div class="avatar flex-shrink-0 me-3">
                        <img src="{{ asset('img') }}/icons/unicons/cc-success.png" alt="User" />
                      </div>
                      <div>
                          <small class="text-muted d-block">Profit</small>
                          <div class="d-flex align-items-center">
                            <h6 class="mb-0 me-1" id="result"></h6>
                            <h6 class="mb-0 me-1" id="monthx"></h6>
                        </div>
                      </div>
                    </div>
                    <div id="incomeChart"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
      var month = '';
      var year = '';
      var start = 0;
      var length = 25;
      var invest_status = '';
      $(document).ready(function() {
        loadTable();
      });

      $('#status').change(function() {
         month = $('#month').val();
         year = $('#year').val();
         if(year == '') {
          return alert('Please select year');
         }
         length = $('#page').val();
         invest_status = $('#status').val();
         loadTable();
      });

      async function loadTable()
      {
        var param = {
          url: '{{ url()->current() }}',
          method: 'GET',
          data: {
            load: 'table',
            month: month,
            year: year,
            length: length,
            invest_status: invest_status
          }
        }

        loading(true);
        await transAjax(param).then((result) => {
          loading(false);
          $('#dataTable').html(result);
        }).catch((err) => {
          loading(false);
          return alert('Internal Server Error!');
        });
      }

      function loading(state)
      {
        if(state) {
          $('#loading').removeClass('d-none');
        }else {
          $('#loading').addClass('d-none');
        }
      }

      $('#currentTransaction').click(function() {
        $('#rowCurrentTransaction').removeClass('d-none');
        $('#rowSinceExist').addClass('d-none');
      });
      
      $('#sinceExist').click(function() {
        $('#rowCurrentTransaction').addClass('d-none');
        $('#rowSinceExist').removeClass('d-none');
      });

      //generate spk
      const scriptURL = 'https://script.google.com/macros/s/AKfycbyyJSyoaZ6XEOrzrlHBnU1nd1zXpYTO6iEtAeW2T_p-NMwdQstewQfjEKodPf6uCm6C/exec';
      const form = document.forms['generateSpK']

      form.addEventListener('submit', e => {
        e.preventDefault()
        // $('#btnLoading').removeClass('d-none');
        // $('#ceratespk').addClass('d-none');
        fetch(scriptURL, { method: 'POST', body: new FormData(form)})
          .then(response => console.log('Success!', response))
          .catch(error => console.error('Error!', error.message))
          swal({ title: 'Success', text: "Add Fund Investment Succes!", icon: 'success' });
      })

      const rupiah = (number) => {
      const formattedNumber = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
      }).format(number);
        return formattedNumber.split(",")[0]; // Mengambil bagian pertama sebelum tanda koma
      };

      function addfundInvesment(input)
      {
        const value = input.value.replace(/\D/g, "");
        input.value = rupiah(value);
      }

      let minFund = 50000000;
      document.getElementById('minFund').value = rupiah(minFund);
      function formatRupiah(input) {
        const value = input.value.replace(/\D/g, ""); // Menghapus karakter non-digit
        input.value = rupiah(value); // Memformat nilai dan memperbarui nilai input
      }

      //simulate funding
      function calculateInvestmentReturn(minFund, rate, period) {
          return minFund + (minFund * (rate * period));
      }

      document.getElementById("calculateBtn").addEventListener("click", function() {
      // let minFund = parseFloat(document.getElementById("minFund").value);
      let minFund = 50000000;
      let rate = 0.015;
      let period = parseFloat(document.getElementById("period").value);
      
      
      $('#profit').removeClass('d-none');
      confetti({
        particleCount: 150,
        spread: 60
      });
      
      let investmentReturn = calculateInvestmentReturn(minFund, rate, period);
      document.getElementById("result").innerText = rupiah(investmentReturn - minFund);
      document.getElementById("monthx").innerText = '/' + period + ' Month';
});
</script>
@endpush