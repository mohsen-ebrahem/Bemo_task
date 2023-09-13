<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<style>
	.customer{
	    position: absolute;
        top: 100px;
	    width:60%;
	    left: 20%;
	}

    .customer form{
	    display:flex;
	    flex-direction:row;
	}

    .customer form input{
     	margin-right:20px;
	}
    
	.input-name{
		height: 40px;
        border-style: none;
        width: 300px;
        background: #cdc8c8;
        border-radius: 6px;
	}

    .input-button{
	    padding:10px;
    }

    .search-result{
	    font-size: 21px;
        width: 100%;
        margin-top: 30px;
        background: #9d9696;
        height: 60px;
        border-radius: 5px;
        padding: 10px;
        font-family: arial;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .cus-info{
	    display: flex;
        flex-direction: column;
	    height: 100%;
        justify-content: center;
    }

    a{
     	text-decoration: none;
        background: #7e7ee3;
        padding: 5px;
        border-radius: 5px;
        color: black;
        border-bottom-style: solid;
        border-right-style: solid;
        border-bottom-color: #8a8ae1;
        border-right-color: #8a8ae1;
    }
	</style>
<body>
<div class="customer">
				<h2 class="heading">Search Form</h2>
				<form method=post action="{{route('search')}}" class="checkout-form">
					@csrf
					<div class="form-group">
						<input class="input-name" type="text" id="name" name="name">
					</div>
					
					<div class="input-button">
						<input type="submit" id="" name="" value="Send">
					</div>
				</form>	
				<?php
				if(Isset($customers)){
					foreach($customers as $customer){
				?>
				<div class="search-result">
	                <div class="cus-info">
		                <div>{{$customer->full_name}}</div>
		                <div style="font-size:13px">{{$customer->address}}</div>
	                </div>
	                <div><a href={{URL('/user-financial-info/'.$customer->id)}}>Show financial information</a></div>
                </div>
                <?php }} ?>
			</div>
		
</body>
</html>