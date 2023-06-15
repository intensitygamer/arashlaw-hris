 
@extends('layouts.dashboard')

@section('content')
 
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <!-- <h1>Payroll</h1> -->
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <!-- <li class="active">Payroll</li> -->
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title"> Create Payroll </strong>
        </div>
        <div class="card-body">
        

                <form action = '{{ route('payroll.create') }}' method="POST" id="payroll_create">

                    @csrf 
                    
                    <div class="row">

                        <div class="col ">
                            <label> <b> From Date: </b></label>
                            <input type="date" name="from_date" class="form-control" required/>
                        </div>

                        
                        <div class="col">
                            <label> <b> To Date: </b></label>
                            <input type="date" name="to_date"  class="form-control" required/>
                        </div>


                    </div>
                    
                    <div class="row mt-2">

                        <div class="col">

                            <label> <b> Department: </b></label>
                            
                            {!! department_field(array( 'name'=>'department_id', 'class' => 'form-control standardSelect', 'required' => 'required')) !!}

                        </div> 


                    </div>

                    <div class="row mt-2">

                        <div class="col">

                            <label> <b> Notes: </b></label>
                            
                            <input type="text" class="form-control" name="note" />

                        </div> 

                        <div class="col">

                            <label> <b> Payroll Type: </b></label>
                            
                            <select class="form-control standardSelect" name="payroll_type" required>
                                <option value="Biweekly"> Biweekly </option>
                                <option value="Monthly"> Monthly  </option>
                            </select>

                        </div> 


                    </div>

                    <div class="row ">

                        <button class="btn btn-success m-4"> Create Payroll <i class="fa fa-money"></i></button>

                    </div>

                </form>

        </div>
    </div>
</div>


@endsection