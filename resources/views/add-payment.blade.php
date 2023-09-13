<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>


        .customer{
			padding: 30px;
            background-color: #9da8a9;
            width: 500px;
            height: 300px;
            display: flex;
            flex-direction: column;
            position: absolute;
            top: 20%;
            left: 28%;
            border-radius: 3%;
         	align-items: center;
		}

        form{
			display: flex;
            flex-direction: column;
		}

        form div{
	        margin-bottom: 20px;
            display: flex;
            flex-direction: column;
		}
        form div input{
            width:300px;
	        height:30px;
	        margin-bottom:10px;
	        margin-top:5px;
			border-radius: 5px;
            border-style: none;
		}
    </style>
</head>
<body>
<div class="customer">
				<h2 class="heading">Add Payment</h2>
				<form method=post action={{URL('/create-payment/'.$loanId)}} class="checkout-form">
					@csrf
					<div class="form-group">
						<label>Payment Value</label>
						<input type="text" id="full_name" name="payment_value">
					</div>
					
					<div class="form-group">
						<input type="submit" id="" name="" value="Send">
					</div>
				</form>	
			</div>
</body>
</html>