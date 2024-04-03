
<?php include 'config/config.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $thename ?></title>
<?php include 'meta.php'?>

</head>

<body>


 <section class="background">
    <div class="body-in">
    <div class="icon-div ">
       <?php include 'header.php'?>
     </div>
        <div class="request-loan">
            <div class="header-div">
                <div class="reques-view-loan">
                    <a href="index.php"><button class="btn"> Request For Loan</button></a>
                   <a href="request.php"><button class="btn"> View Loan Request </button></a>
                </div>
            </div>
            <div class="request-loan-text" data-aos ="fade-in" aos-duration ="10000">
               <h2>Request For Loan</h2>
            </div>

            <form action="config/code.php" method="POST" entype="multipart/form-data">
            <input type="hidden" name="action" value="LoanRequest"/>   
            <div class="label-input-div" data-aos ="fade-in" aos-duration ="10000">
                    <div class="fullname">
                        <label for="fullname" >Full Name:</label> <br>
                        <input type="text" class="text_field" name="fullname" placeholder="Type Full Name Here" class="textholder">
                    </div>

                    <div class="fullname">
                        <label for="fullname" >Loan Amount (N):</label> <br>
                        <input type="number" class="text_field" name="loan_amount" placeholder="00.00" class="textholder">
                    </div>

                    <div class="fullname">
                        <label for="fullname" >Loan Duration (Months):</label> <br>
                        <input type="number" class="text_field" name="loan_duration" placeholder="0." class="textholder">
                    </div>

                    <div class="button" data-aos ="fade-in" aos-duration ="10000">
                    <button class="btn" type="submit"> Request For Loan </button>
                    </div>
 
                </div>   
            </form>

        </div>

            
                <div class="footer" >
                    <div class="copyright" >
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