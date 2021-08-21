<?php 
$connect=mysqli_connect("localhost","root","","justiceforyoudb");
if(isset($_SESSION['paymentid']))
{
    $paymentid=$_SESSION['paymentid'];
   $select="SELECT * FROM payment p, appointment b, lawyer l, availableslot avs,client c
            WHERE p.bookingid=b.bookingid and l.lawyerid=b.lawyerid AND avs.slotid=b.slotid AND p.paymentid='$paymentid' AND c.clientid=b.clientid";
   $run=mysqli_query($connect,$select);
   $row=mysqli_fetch_array($run);
   $cname=$row['clname'];
   $paymentid=$row['paymentid'];
   $paymentdate=$row['paymentdate'];
   $caddress=$row['caddress'];
   $creditcardpassword=$row['creditcardpassword'];
   $creditcardnumber=$row['creditcardnumber'];
   $wavemoneyphnumber=$row['wavemoneyphnumber'];
   $wavemoneypassword=$row['wavemoneypassword'];
   $paymentfees=$row['paymentfees'];
   if($creditcardpassword==null)
  {
    $paymentmethod='Wave money';
    $wavephoneno=$wavemoneyphnumber;  
    $wavepass=$wavemoneypassword;    
} 
else
 {    
      $paymentmethod='Credit Card';
    $wavephoneno=$creditcardnumber;
     $wavepass =$creditcardpassword;                
}
}


 ?>
 <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-spacing: 0;
        border-collapse: collapse;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        /*font-weight: bold;*/
    }

    .text-align-right {
        text-align: right;
    }

    @media  only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
    <div class="content">
        <div class="container-fluid">
<div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title">
                                
                                Justice For You
                            </td>

                            <td>
                                Date: <?php echo $paymentdate ?><br>
                                Invoice ref.: <?php echo $paymentid ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                
                                Justice For You<br>
                                No.56, Zayyathukha Street<br>
                                Sanchaung Township<br>
                                Yangon
                            </td>
                            <td>
                                <?php echo $cname ?><br>
                                <?php echo $caddress ?><br>
                                
                            </td>
                        </tr>
                         <tr>
                        <td>
                             <?php echo $paymentmethod ?><br>
                             <?php echo $wavephoneno ?><br>
                                <?php echo $wavepass ?><br>
                        </td>
                        </tr>
                       
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Description</td>
                <td>Payment Fees</td>
                <td class="text-align-right">Total</td>
            </tr>

                         <tr class="item">
                                        <td>Booking</td>
                                        <td>$<?php echo $paymentfees ?></td>
                        <td class="text-align-right">$<?php echo $paymentfees ?></td>
                    </tr>

            
            <tr class="total">
                <td></td>
                <td colspan="2">
                   <b>Grand Total: $<?php echo $paymentfees ?></br><br/>
                </td>
            </tr>

                    </table>
                    <div class='other-info'>
                  <a href='invoiceprint.php?paymentid=<?php echo $paymentid?>' class='btn btn-primary'>Print</a>
                </div>    
    </div>
              
                    
            
        </div>

      </div>