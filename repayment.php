<?php include 'config/config.php'?>
<?php include 'config/function.php'?>

<?php 
$loan_id =$_POST['loan_id'];
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<title><?php echo $thename ?></title>
</head>



<body>


<section class="background repayment">


    <div class="body-in">
    <div class="icon-div-repayment ">
            <div class="icon-in">
                <img src="all-image/body-image/logo.png" alt="">
            </div>
        </div>

        <div class="request-loan-repayment">
            <?php include 'header2.php'?>


            <?php
                    $repayment = $callclass-> _get_loan_details ($conn, $loan_id);
                    $array = json_decode($repayment, true);
                        $loan_id=$array[0]['loan_id'];
                        $fullname=$array[0]['fullname'];
                        $loan_amount=$array[0]['loan_amount'];
                        $loan_duration=$array[0]['loan_duration'];
                        $loan_rate=$array[0]['loan_rate'];
                        $request_date=$array[0]['request_date'];
                        
                        $query= mysqli_query($conn, "SELECT * FROM repayment_breakdown WHERE load_id='$loan_id'");
                    while ($fetch =mysqli_fetch_array($query)){
                        $total = $fetch['total_repayment'];
                        $total_repayment = $total_repayment + $total;
                    }
                    
                ?>

            <div class="request-loan-text">
               <h2>Loan Repayment Details</h2>
            </div>

            <div class="repayment-left-right">  
                <div class="all-loan-div" data-aos ="fade-in" aos-duration ="40000">

                    <div class="individual">
                        <p>Loan ID :</p>
                        <div class="text"> <h4> <?php echo $loan_id ?> </h4> </div>
                    </div>

                    <div class="individual" >
                        <p>Customer Name:</p>
                        <div class="text"> <h4>  <?php echo $fullname ?> </h4> </div>
                    </div>

                    <div class="individual">
                        <p>loan Amount (N) :</p>
                        <div class="text"> <h4>  <?php echo number_format ($loan_amount, 2) ?> </h4> </div>
                    </div>

                    <div class="individual">
                        <p>Loan Duration :</p>
                        <div class="text"> <h4>  <?php echo $loan_duration ?> Months</h4> </div>
                    </div>

                    <div class="individual">
                        <p>Cumulative Repayment Amount (N):</p>
                        <div class="text"> <h4>  <?php echo number_format($total_repayment, 2) ?> </h4> </div>
                    </div>

                    <div class="individual">
                        <p>Date:</p>
                        <div class="text"> <h4>  <?php echo date ($request_date, 2)?> </h4> </div>
                    </div>
                 
                </div>
               
                <div class="loan-breakdown">
                    <div class="table-div"data-aos ="fade-in" aos-duration ="40000">
                  
                        <table>

                            <tr>
                                <th>MONTH (S)</th>
                                <th>LOAN BALANCE</th>
                                <th>SUB PAYMENT</th>
                                <th>INTEREST</th>
                                <th>TOTAL REPAYMENT</th>
                            </tr>
                        
                            <?php

                            $query=mysqli_query($conn, "SELECT * FROM repayment_breakdown WHERE loan_id='$loan_id'");
                            while ($fetch =mysqli_fetch_array($query)){
                                $month = $fetch['months'];
                                $deduction = $fetch['loan_balance'];
                                $sub_payment=$fetch['sub_payment'];
                                $interest=$fetch['interest'];
                                $total_repayment=$fetch['total_repayment'];
                               
                            ?>
                            <tr>
                                <td>  <?php echo $month?> </td>
                                <td> <?php echo number_format ($deduction, 2)?> </td>
                                <td>  <?php echo number_format ($sub_payment, 2)?> </td>
                                <td>  <?php echo number_format ($interest, 2)?> </td>
                                <td>  <?php echo number_format ($total_repayment, 2)?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                 </div>
            </div>
        </div>                 
    </div>
    <?php include 'bottom-scripts.php'?>
 </section>

    
</body>
</html>