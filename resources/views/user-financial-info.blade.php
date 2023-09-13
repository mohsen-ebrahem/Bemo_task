<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<style>
    .content{
        display: flex;
        flex-direction: column;
        margin-top: 200px;
    }
    
    .content div{
    background-color: #b9bde9;
    width: 50%;
    border-radius: 10px;
    height: 60px;
    font-family: arial;
    padding: 20px;
    margin-bottom: 30px;
    }

    .content .user-name{
    font-size: 30px;
    margin-bottom:10px;
    background-color:white;
    margin-left: 30px;
    }
    

    table{
    margin-left: 30px;
    margin-top: 10px;
    width: 90%;
    font-family: arial;
    }

    table tr{
    background-color: #adadad;
    height: 40px;
    }

    td{
    padding:10px;
    }
    
    .btn{
    background: #adadad;
    color:black;
    text-decoration: none;
    padding-top: 9px;
    text-align: center;
    width: 80px;
    height: 26px;
    border-radius: 5px;
    margin-left: 85%;
    margin-bottom: 5px;
    border-bottom-style: solid;
    border-right-style: solid;
    border-bottom-color: #d5d2d2;
    border-right-color: #d5d2d2;
    }
	</style>
<body>
<div class="content">
    <?php
    use App\Models\Customer;
    $customer=Customer::findOrFail($customerId)
    ?>
				<div class="user-name">The financial information of {{$customer->full_name}}</div><a href={{URL('/add-loan/'.$customerId)}} class="btn">Add Loan</a>
                <table class="" id="" style="">
<tr>
<th>Total Loan Value</th>
<th>Loan Type</th>
<th>Paid Value</th>
<th>Remained Value</th>
<th>Loan Date</th>
<th>Expire Loan Date</th>
<th>Payments</th>
<th>Add Payment</th>
</tr>
<?php
use App\Models\Loan;
$loans=Loan::all()->where('loan_owner','=',$customerId);

foreach($loans as $loan){
    ?>
    <tr>
    <td>{{$loan->total_amount}}</td>
    <td>{{$loan->loan_type}}</td>
    <td>{{$loan->paid_value}}</td>
    <td>{{$loan->total_amount-$loan->paid_value}}</td>
    <td>{{$loan->loan_date}}</td>
    <td>{{$loan->expire_loan_date}}</td>
    <td><a href={{URL('/show-payments/'.$loan->id)}} >click</a></td>
    <td><a href={{URL('/add-payment/'.$loan->id)}} >pay</a></td>
    </tr>
<?php
}
?>

</table>
</div>
</body>
</html>