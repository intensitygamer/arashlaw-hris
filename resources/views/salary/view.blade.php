 
@extends('layouts.dashboard')

@section('content')

<div class="content mt-3">

    <div class="row">

        <div class="col-lg-6">

            <div class="card">
                    
                <div class="card-header">
                    <strong class="card-title"> Earnings </strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                     
                        <tr>
                            <td>Basic Wage</td>
                            <td>P 20, 000.00</td>
                        </tr>

                        <tr>
                            <td>Allowance</td>
                            <td>P 5, 000.00</td>
                        </tr>

                        <tr>
                            <td>Night Differential</td>
                            <td>P 2, 310.00</td>
                        </tr>
                                            

                        <tr>
                            <td  class="px-5"><b>Pay Package Total </b</td>
                            <td ><b>P 27, 310.00 </b></td>
                        </tr>

                        <tr> <td><h4></h4></td> </tr>
                        
                        <tr>
                            <td>Sales Commission </td>
                            <td> P 0.00 </td>
                        </tr>
                        
                        <tr>
                            <td>Special Bonus </td>
                            <td>P 0.00 </td>
                        </tr>

                        <tr>
                            <td class="px-5"> Other Incentive Total </td>
                            <td> P 0.00 </td>
                        </tr>

                        <tr> <td><h4></h4></td> </tr>

                        <tr>
                            <td>ND Hours </td>
                            <td> 77 </td>
                        </tr>

                        <tr> <td><h4></h4></td> </tr>

                        <tr>
                            <td>Regular OT (hh):mm </td>
                            <td> 0.00  </td>
                        </tr>

                        <tr>
                            <td> Restday OT (hh):mm </td>
                            <td> 0.00 </td>
                        </tr>


                        <tr>
                            <td> Restday OT Special Holiday (hh):mm </td>
                            <td> 0.00 </td>
                        </tr>

                        
                        <tr>
                            <td> Restday OT Legan Holiday (hh):mm </td>
                            <td> 0.00 </td>
                        </tr>


                        
                        <tr>
                            <td class="px-5">  OT Premiums </td>
                            <td>  0.00  </td>
                        </tr>

                        <tr> <td><h4></h4></td> </tr>

                        <tr>
                            <td class="px-5"> <b>  Total Earnings </b></td>
                            <td>  0.00  </td>
                        </tr>


                    </table>
                                
                </div>
    
            </div>

        </div>

        <div class="col-lg-6">

            <div class="card">
                    
                <div class="card-header">
                    <strong class="card-title"> Deductions </strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text text-danger">
                        <tr>
                            <td>Days Absent/LWOP</td>
                            <td> P 2, 500.00</td>
                        </tr>
                        <tr>
                            <td>Lates</td>
                            <td> P 80.00</td>
                        </tr>
                        <tr>
                            <td>Deductions Based on Attendance</td>
                            <td> P 0.00</td>
                        </tr>
                        <tr>
                            <td>Adjustment Deduction</td>
                            <td> P 0.00</td>
                        </tr>

                        <tr> <td><h4></h4></td> </tr>

                        <tr>
                            <td> WTAX </td>
                            <td> P 0.00</td>
                        </tr>

                        <tr>
                            <td> SSS </td>
                            <td> P 0.00</td>
                        </tr>


                        <tr>
                            <td> PHIC </td>
                            <td> P 0.00</td>
                        </tr>

                        <tr>
                            <td> HDMF </td>
                            <td> P 0.00</td>
                        </tr>

                        <tr>
                            <td> Tax & Statutory Contributions </td>
                            <td> P 0.00</td>
                        </tr>

                        <tr rowspan="4" colspan="2">  <td ></td>
                        </tr>


                        <tr>
                            <td> Salary Loan </td>
                            <td> P 0.00 </td>
                        </tr>

                        <tr>
                            <td> SSS Calamity Loan </td>
                            <td> P 0.00 </td>
                        </tr>

                        <tr>
                            <td> HDMF Loan </td>
                            <td> P 0.00 </td>
                        </tr>

                        <tr>
                            <td> Other Deductions </td>
                            <td> P 0.00 </td>
                        </tr>

                        <tr>
                            <td class="px-5"> <b> Loans and Others Total </b> </td>
                            <td> P 0.00 </td>
                        </tr>

                        <tr rowspan="4" colspan="2">  <td ></td>
                        </tr>

                        <tr>
                            <td class="px-2"> <b> Total Deductions </b> </td>
                            <td> P 80.00 </td>
                        </tr>


                    </table>
        
                </div>

            </div>


        </div>


    </div>

    <div class="d-flex">

        <div class="p-1">
            <a href="#" class="btn btn-success mb-2 " data-toggle="modal" data-target="#editEmployeesModal"> <i class="menu-icon fa fa-edit"></i></a>  
        </div>

        <div class="p-1">
            <a href="{{ route('salary.print') }}" class="btn btn-primary mb-2"> <i class="menu-icon fa fa-print"></i></a> 
        </div>

    </div>

</div>
 

@endsection

