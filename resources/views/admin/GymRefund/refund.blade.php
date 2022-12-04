<html>
<?php 

       $assKey='FYC7172O8WC3HZXOC2YZ';
       $secret_key="556e33423e971f6106d5e1c68fa3ffc468ad65eb";
       $merchantTxnId='58de1f453eeea1490952005';
       $pgTxnId='1000000003885948';
       $rrn='031324';
       $authIdCode='120323';
       $currencyCode='INR';
       $amount='1.00';
       $txnType='Refund';

       $data="merchantAccessKey=" .$assKey. "&transactionId=" .$merchantTxnId. "&amount=" .$amount; 

       
         $securitySignature = hash_hmac('sha1', $data, $secret_key);

 ?>
<form method='post'  Content-Type='application/x-www-form-urlencoded'  action='https://admin.citruspay.com/api/v2/txn/refund' >

<input type='text' name='merchantTxnId' id='merchantTxnId' value='58de1f453eeea1490952005' >


<input type='text' name='signature' id='signature' value='<?php echo $securitySignature; ?>' >
<input type='text' name='access_key' id='access_key' value='<?php echo $assKey; ?>' >

<input type='text' name='pgTxnId' id='pgTxnId' value='<?php echo $pgTxnId; ?>' >
<input type='text' name='rrn' id='rrn' value='<?php echo $rrn; ?>'  >
<input type='text' name='authIdCode' id='authIdCode' value='<?php echo $authIdCode; ?>' >
<input type='text' name='currencyCode' id='currencyCode'  value='INR' >
<input type='text' name='amount' id='amount'  value='1.00' >
<input type='text' name='txnType' id='txnType' value='Refund' >
<input type='submit' value='Refund' >  

</form>
</html>