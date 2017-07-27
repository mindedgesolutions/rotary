<?php
$showSlider = mysql_query("Select * from `rihf_news_content`");
$num_of_info = mysql_num_rows($showSlider);
if($num_of_info > 0)
{
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="14" align="left" valign="top"><img src="images/spacer.gif" width="32" height="1"  alt=""/></td>
                <td height="220" align="left" valign="top" bgcolor="#FFFFFF" style="border:5px solid #cecece">
				<ul id="slider3">
				<?php
					while($sel_Slider_Content = mysql_fetch_object($showSlider))
					{
				?>
					<li>
					<table width="100%" border="0" align="right" cellpadding="0" cellspacing="7">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" valign="top" style="font-size:30px; color:#595959; padding:10px"><?php echo $sel_Slider_Content->text_heading; ?></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000; padding:0px 10px 0px 10px;"></td>
                      </tr>
                    </table></td>
                    <td width="387" align="right" valign="top"><img src="uploads/news/<?php echo $sel_Slider_Content->text_details;?>" width="200" height="100" alt=""/></td>
                  </tr>
                </table>
					</li>
					<?php }?>
				</ul>
				</td>
                <td width="14" align="right" valign="top"><img src="images/spacer.gif" width="32" height="1" alt="" /></td>
              </tr>
            </table>
		<?php } ?>