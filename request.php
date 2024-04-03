<?php include 'config/config.php'?>
<?php include 'config/function.php'?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
</head>

<body>

<section class="background">
    <div class="body-in">
    <div class="icon-div ">
       <?php include 'header.php'?>
     </div>
        <div class="request-loan">
           <?php include 'header2.php'?>
            <div class="request-loan-text">
               <h2>All Loan Request</h2>
            </div>

           
            
            <div class="back-div">                   
                <?php
                    $query= mysqli_query($conn, "SELECT * FROM loan_request");
                    while ($fetch =mysqli_fetch_array($query)){
                    $loan_id = $fetch['loan_id'];
                    $fullname = $fetch['fullname'];
                    $loan_amount = $fetch['loan_amount'];
                    $loan_duration = $fetch['loan_duration'];
       individual             $loan_rate = $fetch['loan_rate'];
                    $request_date = $fetch['request_date'];
                ?>
                
                <div class="" data-aos ="zoom-in" aos-duration ="40000">
                <form method="POST" action="repayment.php">
                    <input type="hidden" name="loan_id" value="<?php echo $loan_id?>"/>
                    <p><?php echo $loan_id?> </p>
                    <div class="text"> <h2><?php echo $fullname ?></h2> </div>
                    <div class="amount-month">
                    <div class="amount"><p><?php echo $loan_amount ?></p></div>
                    <div class="month">
                   <button class="btn" type="submit"> <?php echo $loan_duration?> Months</button>
                    </div>
                    </div>
                    </form>
                </div> 
                    
                <?php } ?>
            </div>

          
            
        </div>
   
            
                <div class="footer">
                    <div class="copyright">
                       <h6>©2024. All Right Reserved </h6>
                    </div>
                    <div class="social-media">
                        <ul>
                            <li><i class="bi bi-facebook"></i></li>
                            <li><i class="bi bi-twitter"></i></li>
                            <li><i class="bi bi-google"></i></li>
                            <li><i class="bi bi-linkedin"></i></li>   
                        </ul>
                  </div>
                </div>
                            
    </div>
    <?php include 'bottom-scripts.php'?>
 </section>
    
</body>
</html>