@extends('layouts.master')

@section('title')
 {{ isset($income)? 'Edit-Income' : 'Create-Income' }}
@endsection

@section('content')
  <div class="conatiner-fluid">
    <div class="card small">
      <div class="card-header">
        {{  isset($income)? 'Edit Income' : 'Add Income' }}
        <a href="{{ route('incomes') }}" class="btn btn-secondary btn-sm float-right mb-2"> <i class="fas fa-arrow-left"></i>Back to Income records</a>
      </div>
      <!-- CardBody -->
      <div class="card-body">
        <div class="col-md-8 container-fluid">
          <form action="{{ isset($income) ? route('update-income', $income->id) : route('store-income') }}" method="POST" class="form-group">
                 @csrf
                 @if(isset($income))
                  @method('PUT')
                 @endif

                 <div class="form-row form-group col-md-8 justify-content-left">
                     <h5 class="font-weight-bold"> <i class="fas fa-user"> &nbsp;&nbsp; </i><u>Payment Info</u></h5>
                 </div>
                 <div class="form-row justify-content-center">
                   <div class="form-group col-md-6">
                     <label for="incomegroup">Income Group</label>
                     <select class="form-control" name="incomegroup">
                       <option value="{{ isset($income) ? $income->incomegroup->id : '' }}">{{ isset($income) ? $income->incomegroup->name : 'Choose Income group' }}</option>
                       @foreach($incomegroups as $icg)
                        <option value="{{ $icg->id }}">{{ $icg->name }}</option>
                       @endforeach
                     </select>
                   </div>
                   <div class="form-group col-md-6">
                     <label for="paid_by">Payer</label>
                     <select class="form-control" name="paid_by">
                       <option value="{{ isset($income) ? $income->memership->id : '' }}">{{ isset($income) ? $income->memership->name : 'Choose payer' }}</option>
                       @foreach($memberships as $mb)
                       <option value="{{ $mb->id }}">{{ $mb->name }}</option>
                       @endforeach
                     </select>
                   </div>
                 </div>
                 <!-- ************************************************ -->

                 <div class="form-row justify-content-center">
                   <div class="form-group col-md-6">
                     <label for="date">Date</label>
                     <input type="date" class="form-control" name="date" value="{{ isset($income) ? $income->date : '' }}">
                   </div>
                   <div class="form-group col-md-6">
                     <label for="incomegroup">Recorded by</label>
                     <input type="text" class="form-control" name="user" value="{{ isset($income) ? $income->user->name : Auth::user()->name }}" readonly>
                   </div>
                 </div>

                 <div class="form-row justify-content-center">
                   <div class="form-group col-md-12">
                     <label for="description">Description</label>
                     <textarea name="description" rows="1" cols="1" class="form-control"></textarea>
                   </div>
                 </div>
                 <hr>
                 <!-- ****************************************************************** -->
                 <div class="form-row form-group col-md-8 justify-content-left">
                     <h5 class="font-weight-bold"> <i class="fas fa-credit-card"> &nbsp;&nbsp; </i><u>Payment Info</u></h5>
                 </div>
                 <div class="form-row justify-content-center">
                   <div class="form-group col-md-4">
                     <label for="input_amount">Amount</label>
                     <input type="number" class="form-control" id="input_amount" name="input_amount" step="0.01" value="{{ isset($income) ? $income->input_amount : '0.00' }}">
                   </div>
                   <div class="form-group col-md-4">
                     <label for="currency">Currency</label>
                     <select class="form-control" name="currency">
                       <option value="{{ isset($income) ? $income->currency : '' }}">{{ isset($income) ? $income->currency : 'Choose Currency' }}</option>
                       <option value="GHS">GHS</option>
                       <option value="EURO">EURO</option>
                       <option value="USD">USD</option>
                       <option value="POUNDS">POUNDS</option>
                     </select>
                   </div>
                   <div class="form-group col-md-4">
                     <label for="rate">Rate</label>
                     <input type="number" class="form-control" id="rate" name="rate" step="0.01" value="{{ isset($income) ? $income->rate : '1.00' }}">
                   </div>
                 </div>
                 <div class="form-row justify-content-center">
                   <div class="form-group col-md-12">
                     <label for="payment_mode"></label>
                     <select class="form-control" name="payment_mode">
                       <option value="">Choose payment mode</option>
                       <option value="Cash">Cash</option>
                       <option value="Cheque">Cheque</option>
                       <option value="Mobile Transfer">Mobile Transfer</option>
                       <option value="Other">Other</option>
                     </select>
                   </div>
                 </div>
                 <!-- **************************************************************** -->

                 <div class="form-row justify-content-center">
                   <div class="form-group col-md-4">
                     <label for="bank_name">Bank Name/Branch</label>
                     <input type="text" class="form-control" name="bank_name" value="{{ isset($income) ? $income->bank_name : '' }}">
                   </div>
                   <div class="form-group col-md-4">
                     <label for="cheque_no">Check Number</label>
                     <input type="text" class="form-control" name="cheque_no" value="{{ isset($income) ? $income->cheque_no : '' }}">
                   </div>
                   <div class="form-group col-md-4">
                     <label for="cheque_date">Check Date</label>
                     <input type="date" class="form-control" name="cheque_date" value="{{ isset($income) ? $income->cheque_date : '' }}">
                   </div>
                 </div>
                 <div class="form-row justify-content-center">
                   <div class="form-group col-md-12">
                     <label for="amount">Total Amount</label>
                     <input type="number" step="0.001" class="form-control" readonly name="amount" value="{{ isset($income) ? $income->amount : '' }}" onChange="amount()">
                   </div>
                 </div>
                 <hr>
                <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i>
                    {{isset($income) ? 'Edit Income Record' : 'Add Income Record'}}
                </button>

                 </div>
             </form>
        </div>
      </div>
    </div>
  </div>
@endsection

<script type="text/javascript">
  function amount(){
    var rate = document.getElementById("rate").value;
    var input_amount = document.getElementById("input_amount").value;
    var total = rate * input_amount;

    console.log(total);
  }
</script>
