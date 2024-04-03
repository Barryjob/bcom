<?php include 'config.php'?>
<?php include 'function.php'?>
<?php
   $action = $_POST['action']; ////GET PERFORM FUNCTION ON URL
?>

<?php
   if ($action=="LoanRequest"){
        if (($fullname=='') || ($loan_amount=='') || ($loan_duration=='')){?>
            <script>
                alert('Erorr! All Fields Required')
                window.parent(location='../index.php')
            </script>
<?php
        }else{
            $sequence=$callclass->_get_sequence_count($conn, 'TRANS');
			$array = json_decode($sequence, true);
			$no= $array[0]['no'];
			$loan_id='TRANS'.date("Ymdhis").$no;
            

            mysqli_query($conn,"INSERT INTO `loan_request`
			(`loan_id`, `fullname`, `loan_amount`, `loan_duration`, `loan_rate`, `request_date`) VALUES
			('$loan_id','$fullname','$loan_amount','$loan_duration','$loan_rate',  NOW())")or die (mysqli_error($conn));
        
    $amount = $loan_amount;
    $month =  $loan_duration;
    $sub_payment = $amount / $month;
    for ($b = 1; $b <= $month; $b++) {
        $interest = ($loan_rate / 100) * $amount;
        $total = $sub_payment + $interest;
        $amount = $amount - $sub_payment;
        $total_repayment = $total_repayment + $total;
        $deduction =$amount + $sub_payment;

        mysqli_query($conn,"INSERT INTO `repayment_breakdown`
        (`months`,`loan_id`, `loan_balance`, `sub_payment`, `interest`, `loan_rate`, `total_repayment`) VALUES
        ('$b','$loan_id','$deduction','$sub_payment','$interest','$loan_rate', '$total_repayment')")or die (mysqli_error($conn));
    
    }
}
    
        ?>
        <script>
            alert('Loan Request Successfull')
            window.parent(location='../index.php')
        </script>
   
        
   <?php
        
        
    }
 
    ?>
