<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<style>

    .content{
        display:flex;
    }
    .header{
        height: 80px;
        margin-top: 70px;
        font-family: arial;
        font-size: 20px;
        margin-left:16%;
    }
    .content div{
        width:50%;
    }

    table{
        font-family: arial;
        margin-left:30%;
    }
    table tr{
       background-color: #adadad;
       height: 40px;
    }
    td,th{
       padding:10px;
    }
	</style>
<body>
<div class="content">
		<div>
            <div class="header">payed payments</div>
            <div>
                <table class="" id="" style="">
                    <tr>
                        <th>Payment Value</th>
                        <th>Payment Date</th>

                    </tr>
    <?php
    use App\Http\controllers\LoanController;
    $loanController=new LoanController();
    $paidPayments=$loanController->readPaidPayments($loanId);
    $remainedPayments=$loanController->readRemainedPayments($loanId);
    foreach($paidPayments as $payment){
    ?>
                    <tr>
                        <td>{{$payment[0]}}</td>
                        <td>{{$payment[1]}}</td>
                    </tr>

    <?php } ?>

                </table>
            </div>
            </div>
    <div>
        <div class="header">remained paymenst</div>
        <div>
            <table class="" id="" style="">
                <tr>
                    <th>Payment Value</th>
                    <th>Payment Date</th>
                </tr>
    <?php foreach($remainedPayments as $payment){ ?>
                <tr>
                    <td>{{$payment[0]}}</td>
                    <td>in {{$payment[1]}}</td>
                </tr>
    <?php } ?>
            </table>
        </div>
        </div>
</div>
</body>
</html>