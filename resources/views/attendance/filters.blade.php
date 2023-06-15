
<div class="row">

    <div class="col col-4">
            
        <form action = '' method="GET">

        @csrf    

        <table class="table">
                
            <tr><td><b> From Date </b> </td> 
                <td><input type="date" class="form-control" name="from_date" value="{{$from_date}}"/> 
            </td>

            <tr><td><b>To Date </b> </td>  
                <td><input type="date" class="form-control" name="to_date" value="{{$to_date}}"/>  
            </td>
        
        </table>

    </div>

    <div class="col col-2">
    </div>

    <div class="col col-4">
        <table class="table">

            <tr><td><b> Employee </b> </td>  
                <td><select class="form-control" name="employee" id="employee-dropdown" multiple="multiple">
                    <option>Khera</option>
                    <option>Ken</option>
                    <option>Vinz</option>
                </select>                              
            </td>


            <tr><td><b> Department </b> </td>  
                <td><select class="form-control" id="department-dropdown" multiple="multiple">
                    <option>Production</option>
                    <option>Software Development</option>
                    <option>VA Department</option>
                    <option>Business Dev</option>
                    <option>Operations</option>
                    <option>HR and Recruitment</option>
                </select>  
            </td>
            
        </table>


</div>