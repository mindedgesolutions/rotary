<?php
include('include/config.php'); 
?>
<html>
<head>
<title>Registration Form</title>
<link rel="stylesheet" href="style155.css"/>
<script src="jquery-1.9.1.js"></script>
<script src="jquery-ui.js"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript">
        function MM_swapImgRestore() { //v3.0
            var i,x,a = document.MM_sr;
            for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
        }
        function MM_preloadImages() { //v3.0
            var d = document;
            if (d.images) {
                if (!d.MM_p) d.MM_p = new Array();
                var i,j = d.MM_p.length,a = MM_preloadImages.arguments;
                for (i = 0; i < a.length; i++)
                    if (a[i].indexOf("#") != 0) {
                        d.MM_p[j] = new Image;
                        d.MM_p[j++].src = a[i];
                    }
            }
        }

        function MM_findObj(n, d) { //v4.01
            var p,i,x;
            if (!d) d = document;
            if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
                d = parent.frames[n.substring(p + 1)].document;
                n = n.substring(0, p);
            }
            if (!(x = d[n]) && d.all) x = d.all[n];
            for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
            for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
            if (!x && d.getElementById) x = d.getElementById(n);
            return x;
        }

        function MM_swapImage() { //v3.0
            var i,j = 0,x,a = MM_swapImage.arguments;
            document.MM_sr = new Array;
            for (i = 0; i < (a.length - 2); i += 3)
                if ((x = MM_findObj(a[i])) != null) {
                    document.MM_sr[j++] = x;
                    if (!x.oSrc) x.oSrc = x.src;
                    x.src = a[i + 2];
                }
        }
    </script>
</head>

<body>
<div class="main-container">
<table cellpadding="0" cellspacing="0" width="890" align="center">
<tr>
  <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:30px">
      <tbody>
        <tr height="110">
          <td width="209"><img  border="0" src="RILM-LOGO1.png.jpg" height="139" width="200" style="box-shadow:0 0 3px #333333"></td>
          <td align="center"><img  border="0" src="Asha-Kiran-Lekha.png"></td>
        </tr>
      </tbody>
    </table></td>
</tr>
<tr>
  <td valign="top"><div id="RotarianDiv">
      <form action="merchant-2/submit.php" method="post" name="rotarian" id="rotarian">
        <table align="center" cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <td valign="top"><table width="100%" cellpadding="0" cellspacing="0"
               style="border:1px solid #d2d2d2;margin:20px 0 0 0 ;padding:10px" class="inn-cont">
                <tr>
                  <td valign="top" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="70%"
                                style="font-size:14px; color:#000; text-align:right; padding:10px 0 10px 0;"> 
                                This facility is available only for Indian Credit/Debit Card & Bank Account holders.
                          <p style="font-size:12px; color:#000; text-align:right; padding:0px 0 0 0px; margin:0px;"> <i>Foreign Cards are not accepted.</i></p></td>
                        <td width="30%" align="right" style="font-size:12px; padding:0 10px 0 0;"><font
                                    style="color:red; font-size:14px;">*</font> <i>Mandatory fields</i></td>
                      </tr>
                    </table></td>
                </tr>
                <input type="hidden" name="product" value="ASIA">
                <input type="hidden" name="TType" value="NBFundTransfer">    
                <input type="hidden" name="clientcode" value="18143">
                <input type="hidden" name="AccountNo" value="1234567890">    
                <input type="hidden" name="ru" value="http://rotaryteach.org/merchant/response.php">
                <input type="hidden" name="bookingid" value="100001"/>
                <tr>
                  <td width="34%" align="right">Category :</td>
                  <td><select name="rcategory" id="rcategory" onChange="hideShowDonorClubDistrict(this.value)">
                      <option>Select Category</option>
                      <option value="Rotary">Rotary</option>
                      <option value="Inner Wheel">Inner Wheel</option>
                      <option value="Rotaract">Rotaract</option>
                      <option value="Non Member">Non Member</option>
                    </select>
                    <sup><font style="color:red">*</font></sup></td>
                </tr>
                <tr>
                  <td width="34%" align="right">Donor Name :</td>
                  <td width="66%"><input type="text" name="rfirstname" id="rfirstname" class="box4" onClick="clean(this);" maxlength="50">
                    <sup><font
                        style="color:red">*</font></sup></td>
                </tr>
                <tr>
                  <td align="right">Donor Contact No :</td>
                  <td>+91
                    <input style="width:280px" class="box4" type="text" name="rphone" id="rphone" onKeyPress="return isNumberKey(event);" maxlength="10">
                    <sup><font
                        style="color:red">*</font></sup></td>
                </tr>
                <tr>
                  <td align="right">Donor Address :</td>
                  <td><textarea name="raddress1" id="raddress1" style="resize:none; float: left;" class="box1"></textarea>
                    <sup><font
                        style="color:red">*</font></sup></td>
                </tr>
                <tr>
                  <td align="right">Donor Email :</td>
                  <td><input type="text" class="box4" name="remail" maxlength="70">
                    <sup><font
                        style="color:red">*</font></sup></td>
                </tr>
                <tr>
                  <td align="right">Donor PAN Card No :</td>
                  <td><input type="text" class="box4" name="pancardno" maxlength="10">
                    <div style="font-size: 11px; float: right; width: 243px; text-align: left; padding: 15px 0px 0px;"> (Add PAN No. if you need 80G benefit) </div></td>
                </tr>
                <tr>
                  <td valign="top" style="padding:0 0 0 251px" colspan="2"><table width="100%" cellpadding="0" cellspacing="0">
                      <tr id="donorclub" style="display:block">
                        <td align="right" style="font-size:12px">Club :</td>
                        <td style="padding:0 0 0 12px"><input type="text" class="box4" name="rclubname" maxlength="50" id="rclubname" style="margin-right: 6px">
                          <sup><font style="color:red">*</font></sup></td>
                      </tr>
                      <tr id="donordistrict" style="display:block">
                        <td align="right" style="font-size:12px">District :</td>
                        <td colspan="2"><input class="box4" type="text" name="rdistrict" maxlength="4"
                                       style="float:left" onKeyPress="return isNumberKey(event);" id="rdistrict">
                          <sup
                        style="float:left"><font style="color:red">*</font> </sup>
                          <div style="font-size: 11px; float: right; width: 243px; text-align: left; padding: 15px 0px 0px;"> (Enter 3 or 4 Digit District Number as Appropriate) 
                          </div></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right">No. Of Children Sponsored :</td>
                  <td><select name="noofchildren" id='noofchildren' onChange="RotaryDonarAmount(this.value)">
                      <option value="">Choose Number </option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                      <option value="20">20</option>
                      <option value="25">25</option>
                    </select>
                    <sup><font style="color:red">*</font></sup></td>
                </tr>
                <tr>
                  <td align="right">Amount (in Rs.) :</td>
                  <td><input type="text" class="box4" name="ramount" id="ramount" readonly
                           style="background-color:gray;"></td>
                </tr>
                <tr>
                  <td align="right"></td>
                  <td style="padding:20px 0 0 10px;"><input
                        style="background:#B90000; color:#FFF; font-size:14px;border:none; border-radius:5px; height:32px; width:120px; cursor:pointer"
                        type="submit" value="SUBMIT">
                    &nbsp;&nbsp;
                    <input type="button" name="rreset" value="RESET" onClick="reset_button('rdonarreset');"
                           style="background:#B90000; color:#FFF; font-size:14px;width:120px;height:32px; border:none;border-radius:5px;cursor:pointer"></td>
                </tr>
              </table></td>
          </tr>
        </table>
      </form>
    </div>
