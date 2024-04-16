@forelse ($table['data'] as $key => $adb)
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
  <tbody>
    <tr>
      <th scope="row">{{ $key + 1 }}</th>
      <td>{{ $adb['transaction_date'] }}</td>
      <td>{{ $adb['bank_name'] }}</td>
      <td>{{ $adb['bank_account_number'] }}</td>
      <td>{{ $adb['debit'] }}</td>
      <td>{{ $adb['credit'] }}</td>
      <td>{{ $adb['close_balance'] }}</td>
      <td>{{ $adb['description'] }}</td>
      {{-- <td><span class="badge bg-primary">repayment</span></td> --}}
    </tr>
  </tbody>
</table>
@empty
<div class="col text-center">
  <div class="empty-img">
      <svg  style="width: 96px; height: 96px" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M12.983 8.978c3.955 -.182 7.017 -1.446 7.017 -2.978c0 -1.657 -3.582 -3 -8 -3c-1.661 0 -3.204 .19 -4.483 .515m-2.783 1.228c-.471 .382 -.734 .808 -.734 1.257c0 1.22 1.944 2.271 4.734 2.74"></path>
          <path d="M4 6v6c0 1.657 3.582 3 8 3c.986 0 1.93 -.067 2.802 -.19m3.187 -.82c1.251 -.53 2.011 -1.228 2.011 -1.99v-6"></path>
          <path d="M4 12v6c0 1.657 3.582 3 8 3c3.217 0 5.991 -.712 7.261 -1.74m.739 -3.26v-4"></path>
          <line x1="3" y1="3" x2="21" y2="21"></line>
      </svg>
  </div>
  <p class="empty-title">No data found!</p>
</div>   
@endforelse
