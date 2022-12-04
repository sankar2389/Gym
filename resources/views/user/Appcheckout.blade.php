 <html>
     <head><title>Payment</title>
         <meta HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=iso-8859-1">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     </head>
     <body style="margin:20px; padding:10px; align:center" align="center" >
     <h2>Payment</h2>
     <p align="left">Name: <?php echo $postArr['firstName']; ?></p>
     <p align="left">Email: <?php echo $postArr['email']; ?></p>
     <p align="left">Mobile: <?php echo $postArr['mobile']; ?></p>
     <p align="left">Amount: Rs.<?php echo $postArr['orderAmount']; ?></p>
        <form align="center" method="post" action="<?php echo $postArr['formPostUrl']; ?>">
      <input type="text" id="merchantTxnId" name="merchantTxnId" value="<?php echo $postArr['merchantTxnId']; ?>" />
      <input type="text" id="orderAmount" name="orderAmount" value="<?php echo $postArr['orderAmount']; ?>" />
      <input type="text" id="currency" name="currency" value="<?php echo $postArr['currency']; ?>" />
      <input type="text" id="firstName" name="firstName" value="<?php echo $postArr['firstName']; ?>" />
      <input type="text" id="email" name="email" value="<?php echo $postArr['email']; ?>" />
      <input type="text" id="mobile" name="mobile" value="<?php echo $postArr['mobile']; ?>" />
      <input type="text" name="returnUrl" value="<?php echo $postArr['returnURL'];  ?>" />
      <input type="text" id="secSignature" name="secSignature" value="<?php echo $postArr['securitySignature']; ?>" />
      <input type="Submit" class="btn btn-primary" value="Pay Now"/>
         </form>
     </body>
 </html>


 


 

 