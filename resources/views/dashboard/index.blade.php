@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0b">
        <div class="card" style="background: linear-gradient(135deg, #1a9988, #076759);">
          <div class="d-flex align-items-center row">
            <div class="col-sm-7 hero-title">
              <div class="card-body">
                <h3 class="card-title fw-bold" style="color: #fff">Hello {{ $user['name'] }}</h3>
                <p class="text-white">
                  Welcome to the Lender Financial Reporting Dashboard!
                </p>
                <a href="/lender/profile" class="btn btn-sm btn-light" style="color: #1a9988"><i class='bx bx-badge-check'></i> {{ $static_report['member_lvl'] }}</a>
                <a href="/lender/profile" class="btn btn-sm btn-warning" style="color: #fff"><i class="bx bx-user me-1"></i>My Profile</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="{{ asset('img') }}/financial_report.svg" height="190" loading="lazy"
                  alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-2 order-0">
        <div class="row">
          <div class="col-12 col-md-6">
            <button class="btn btn-primary w-100 mb-3 fw-bold" style="font-size: 16px" id="currentTransaction">Current Transaction</button>
          </div>
          <div class="col-12 col-md-6">
            <button class="btn btn-primary w-100 fw-bold" style="font-size: 16px" id="sinceExist">Since Exist</button>
          </div>
        </div>
        <div class="row" id="rowCurrentTransaction">
          {{-- <h5>Current Transaction</h5> --}}
          <div class="col-lg-6">
            <div class="card mb-3 xmt-3" style="background-color: #fa5d48">
              {{-- <div class="row"> --}}
                <div class="col-md-12">
                  <div class="card-body">
                    <h5 class="card-title text-white">Total Fund </h5>
                    <h3 class="card-text text-white">
                      {{ formatRp($static_report['current']['total_investment']) }}
                    </h3>
                  </div>
                </div>
              {{-- </div> --}}
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3" style="background-color: #fa5d48">
              {{-- <div class="row g-0"> --}}
                <div class="col-md-12">
                  <div class="card-body">
                    <h5 class="card-title text-white">Amount Disbursed</h5>
                    <h3 class="card-text text-white">
                      {{ formatRp($static_report['current']['loan_project']) }}
                    </h3>
                  </div>
                </div>
              {{-- </div> --}}
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3" style="background-color: #fa5d48">
              {{-- <div class="row g-0"> --}}
                <div class="col-md-12">
                  <div class="card-body">
                    <h5 class="card-title text-white">Total Transactions</h5>
                    <h3 class="card-text text-white">
                      {{ $static_report['since_exist']['total_transaction'] }}
                    </h3>
                  </div>
                </div>
              {{-- </div> --}}
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3" style="background-color: #fa5d48">
              {{-- <div class="row g-0"> --}}
                <div class="col-md-12">
                  <div class="card-body">
                    <h5 class="card-title text-white">Available Fund</h5>
                    <h3 class="card-text text-white">
                      {{ formatRp($static_report['current']['avalaible_amount']) }}
                    </h3>
                  </div>
                </div>
              {{-- </div> --}}
            </div>
          </div>
        </div>
        <div class="row mt-3 d-none" id="rowSinceExist">
          {{-- <h5>Current Transaction</h5> --}}
          <div class="col-lg-6">
            <div class="card mb-3" style="background-color: #fa5d48">
              {{-- <div class="row g-0">
                <div class="col-md-8"> --}}
                  <div class="card-body">
                    <h5 class="card-title text-white">Total Transactions</h5>
                    <h3 class="card-text text-white">
                      {{ $static_report['since_exist']['total_transaction'] }}
                    </h3>
                  </div>
                {{-- </div>
              </div> --}}
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3" style="background-color: #fa5d48">
              {{-- <div class="row g-0">
                <div class="col-md-8"> --}}
                  <div class="card-body">
                    <h5 class="card-title text-white">Total Amount</h5>
                    <h3 class="card-text text-white">
                      {{ formatRp($static_report['since_exist']['total_amount']) }}
                    </h3>
                  </div>
                {{-- </div>
              </div> --}}
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3" style="background-color: #fa5d48">
              {{-- <div class="row g-0">
                <div class="col-md-8"> --}}
                  <div class="card-body">
                    <h5 class="card-title text-white">Total Return</h5>
                    <h3 class="card-text text-white">
                      {{ formatRp($static_report['since_exist']['total_return']) }}
                    </h3>
                  </div>
                {{-- </div>
              </div> --}}
            </div>
          </div>
        </div>
        </div>
        <div class="col-lg-3 mb-3">
            <button class="btn mb-3 w-100 fw-bold text-white" style="background-color: #1a9988; font-size: 16px;pointer-events: none; cursor: default;">Add Fund Investment</button>
            <div class="card" style="background-color: #1a9988">
              <div class="card-body">
                <form name="generateSpK">
                  <div class="form-group mb-2">
                    <label for="" class="text-white">Amount Investment
                    </label>
                    <input type="text" name="topup" class="form-control" value="Rp 50.000.000" onkeyup="addfundInvesment(this)">
                  </div>
                  <div class="form-group">
                    <label for="" class="text-white">Period Month</label>
                    <select name="period" class="form-select" id="">
                      <option value="3">3</option>
                      <option value="6">6</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                  <input type="hidden" name="no agreement" value="-">
                  <input type="hidden" name="tanggal perjanjian" value="{{ date('j F Y') }}">
                  <input type="hidden" name="NAME" value="{{ $user['name'] }}">
                  <input type="hidden" name="Name Proper" value="{{ $user['name'] }}">
                  <input type="hidden" name="NIK" value="{{ $user['nik'] }}">
                  <input type="hidden" name="alamat" value="{{ $user['address'] }}">
                  <input type="hidden" name="tanggal investment" value="{{ date('j F Y') }}">
                  <input type="hidden" name="no rekening" value="{{ $user['bank_account_number'] }}">
                  <input type="hidden" name="terbilang" class="form-control" value="......">
                  <input type="hidden" name="nama bank" value="{{ $user['bank_name'] }}">
                  <input type="hidden" name="nama rekening" value="{{ $user['bank_account_name'] }}">
                  <input type="hidden" name="phone" value="{{ $user['phone_number'] }}">
                  <input type="hidden" name="email" value="{{ $user['email'] }}">
                  <button id="ceratespk" type="submit" class="btn btn-warning w-100 my-2">Request add fund</button>
                </form>
              </div>
            </div>
        </div>
        <div class="col-lg-3">
            <button class="btn mb-3 w-100 fw-bold text-white" style="background-color: #1a9988; font-size: 16px;pointer-events: none; cursor: default;">Request Withdrawal Fund</button>
            <div class="card" style="background-color: #1a9988">
              <div class="card-body">
                <form name="reqWd">
                  <div class="form-group mb-2">
                    <label for="" class="text-white">Total Fund</label>
                    <input type="text" name="available_fund" class="form-control" value=" {{ formatRp($static_report['current']['total_investment']) }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="" class="text-white">Amount Withdrawal</label>
                    <input type="text" name="wd" class="form-control" onkeyup="addfundInvesment(this)" required>
                    <input type="hidden" name="name" value="{{ $user['name'] }}">
                    <input type="hidden" name="no_hp" value="{{ $user['phone_number'] }}">
                  </div>
                  <button id="btnWd" type="submit" class="btn btn-warning btn-block my-2 w-100">Request withdrawal</button>
                  <button id="btnLoadingWd" class="btn btn-warning w-100 my-2 d-none" disabled type="button">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Please wait...
                  </button>
                </form>
              </div>
            </div>
        </div>
      </div>
      <!-- Financial Statment -->
  
      <!-- Financial Statment end-->
      <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 my-4">
        <div class="card">
          <h5 class="card-header">Transaction</h5>
          <div class="card-body">
            <div class="row filter-transaction">
              <div class="col-md-2">
                  <select class="form-select" id="month" name="month">
                    @php
                        $bulanSaatIni = date('n');
                    @endphp
                    <option value="">All Month</option>
                    @for ($bulan = 1; $bulan <= 12; $bulan++)
                        <option value="{{ $bulan }}" {{ $bulan == $bulanSaatIni ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $bulan, 1)) }}
                        </option>
                    @endfor
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
                  <option value="50">50</option>
                  <option value="25">25</option>
                  <option value="10">10</option>
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-select" name="invest_status" id="status">
                  {{-- <option value="">--status--</option> --}}
                  <option value="">All Status</option>
                  <option value="disbursed">Disbursed</option>
                  <option value="repayment">Repayment</option>
                </select>
              </div>
              <div class="col-md-2 d-grid">
                <a href="/lender/export/transction" target="_blank" class="btn btn-primary btn-block"><i class='bx bx-spreadsheet'></i> Export</a>
              </div>
              <div class="col-md-2 d-grid">
                <a href="/lender/print/transction" class="btn btn-primary btn-block"><i class='bx bx-printer' ></i> PDF/Print</a>
              </div>
            </div>
            <div id="total" class="mt-3">

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
        {{-- <div id="total">
         
        </div> --}}
          <div class="card mt-3">
            <div class="card-body">
              <div class="table-responsive text-nowrap" id="dataTable">
   
              </div>
            </div>
          </div>
          <!--/ Bordered Table -->
      </div>
      <div class="row">
      <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
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
                    <div id="chart"></div>
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
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
      var month = $('#month').val();
      var year = $('#year').val();
      var start = 0;
      var length = 50;
      var invest_status = '';
      $(document).ready(function() {
        loadTable();
        loadChartMonthly();
      });

      $('#month').change(function() {
         month = $('#month').val();
         year = $('#year').val();
         length = $('#page').val();
         invest_status = $('#status').val();
         loadTable();
      });

      $('#status').change(function() {
         month = $('#month').val();
         year = $('#year').val();
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
      const scriptURL = 'https://script.google.com/macros/s/AKfycbxFIHrZawTwh8oq6M4zlShmHbPAKsoi2Fzlte1b6AvpylNnTM_ZvtQ1XvB3qJ8anCx-rw/exec';
      const form = document.forms['generateSpK']

      form.addEventListener('submit', e => {
        e.preventDefault()

        var  data = new FormData(form);
        var inputVal = data.get('topup');
        var topup = inputVal.replace(/\D/g, '');
        data.append('nominal', topup);

        sendWhatsApp(data);
        fetch(scriptURL, { method: 'POST', body: data})
          .then(response => console.log(response))
          .catch(error => console.error('Error!', error.message))
          swal({ title: 'Success', text: "Add Fund Investment Succes!", icon: 'success' });
      })

      async function sendWhatsApp(data)
      {
        var param = {
          url: '/lender/send-whatsapp',
          method: 'POST',
          data: data,
          processData: false,
          contentType: false,
          cache: false,
        }

        await transAjax(param).then((result) => {
          console.log('success');
        }).catch((err) => {
          console.log(err);
        });
      }

      const formWd = document.forms['reqWd'];
      formWd.addEventListener('submit', e => {
        e.preventDefault();
        var  dataWd = new FormData(formWd);
        reqwd(dataWd);     
      });

      async function  reqwd(dataWd) {
        var param = {
          url: '/lender/req-wd',
          method: 'POST',
          data: dataWd,
          processData: false,
          contentType: false,
          cache: false,
        }
      loadingwd(true);
      await transAjax(param).then((result) => {
        loadingwd(false);
        swal({ title: 'Success', text: result.message, icon: 'success' });
        }).catch((err) => {
          loadingwd(false);
          swal({ title: 'Error!', text: "Internal Server Error!", icon: 'error' });
        });
      }   

      function loadingwd(state) {
        if (state) {
          $('#btnWd').addClass('d-none');
          $('#btnLoadingWd').removeClass('d-none');
        }else {
          $('#btnWd').removeClass('d-none');
          $('#btnLoadingWd').addClass('d-none');
        }
      }

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

      function loadMore()
      {
        $('#btnLoadmore').addClass('d-none');
        $('#loadMore').removeClass('d-none');
        length = length * 2;
        loadTable();
      }
      

      // let minFund = 50000000;
      // document.getElementById('minFund').value = rupiah(minFund);
      // function formatRupiah(input) {
      //   const value = input.value.replace(/\D/g, ""); // Menghapus karakter non-digit
      //   input.value = rupiah(value); // Memformat nilai dan memperbarui nilai input
      // }

      // //simulate funding
      // function calculateInvestmentReturn(minFund, rate, period) {
      //     return minFund + (minFund * (rate * period));
      // }

      // document.getElementById("calculateBtn").addEventListener("click", function() {
      // // let minFund = parseFloat(document.getElementById("minFund").value);
      // let minFund = 50000000;
      // let rate = 0.015;
      // let period = parseFloat(document.getElementById("period").value);
      
      
      // $('#profit').removeClass('d-none');
      // confetti({
      //   particleCount: 150,
      //   spread: 60
      // });
      
      // let investmentReturn = calculateInvestmentReturn(minFund, rate, period);
      // document.getElementById("result").innerText = rupiah(investmentReturn - minFund);
      // document.getElementById("monthx").innerText = '/' + period + ' Month';
// });



function loadChartMonthly() {
      $.ajax({
        url: 'https://dashboard.duluin.com/api/v1/chart_v1_monthly_growth',
        type: 'GET',
        dataType: 'JSON',
        success: (response) => {
          console.log('API Response:', response); 

          if (response.success && response.data) {
            var legend = response.data.legend;
            var xAxis = response.data.xAxis;
            var series = response.data.series.map((s) => ({
              name: s.name,
              type: s.type,
              data: s.data
            }));
            renderChart(legend, xAxis, series);
          } else {
            console.error('Invalid API response format', response);
          }
        },
        error: (xhr, status, error) => {
          console.error('Error loading chart data:', error);
        }
      });
    }

    function renderChart(legend, xAxis, series) {
      var options = {
        chart: {
          type: 'bar',
          height: 350
        },
        colors: ["#1a9988", "#1a9988"],
        dataLabels: {
          enabled: true,
          formatter: function (val, opts) {
            return val + ' Mio';
          },
          style: {
            fontSize: '16px', 
            fontWeight: '500',
            colors: ['var(--body-color)']
          }
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            dataLabels: {
              position: 'top'
            }
          }
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: 'Monthly Growth',
          align: 'left',
          style: {
            fontSize: '18px' 
          }
        },
        xaxis: {
          categories: xAxis,
          labels: {
            style: {
              fontSize: '16px' 
            }
          }
        },
        yaxis: {
          title: {
            text: 'Values',
            style: {
              fontSize: '12px' 
            }
          },
          labels: {
            formatter: function (val) {
              return val + ' Mio';
            },
            style: {
              fontSize: '14px' 
            }
          }
        },
        series: series,
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          fontSize: '14px'
        },
        tooltip: {
          theme: 'dark',
          y: {
            formatter: function (value) {
              return value;
            },
            style: {
              fontSize: '16px' 
            }
          }
        }
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    }
</script>
@endpush