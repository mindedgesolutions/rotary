<?php
$atom = date("c");
$human1 = date('d/m/Y', strtotime($atom));   
$human2 = date('d/m/Y', strtotime('+5 day', strtotime($atom)));

echo $human1 ."<br/>". $human2;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
   
   
   
<table cellspacing="0" cellpadding="0" border="0" width="325">
  <tr>
    <td>
       <table cellspacing="0" cellpadding="1" border="1" width="300" >
         <tr>
      	<td width="8%" align="center"><p>Select</p></td>
        <td width="13%"><p>Image</p></td>
        <td width="13%"><p>Name</p></td>
        <td width="9%"><p>City</p></td>
        <td width="13%"><p>Parent</p></td>
        <td width="12%"><p>Sex</p></td>
        <td width="9%"><p>NGO Partner</p></td>
        <td width="23%"><p>Action</p></td> 
         </tr>
       </table>
    </td>
  </tr>
  <tr>
    <td>
       <div style="width:325px; height:325px; overflow:auto;">
         <table cellspacing="0" cellpadding="1" border="1" width="300" >
           <tr>
        <td align="center"><input name="checkbox[]" type="checkbox" value="<?php echo $row['child_id']; ?>"></td>
      	<td><p><img src="../upload/<?php echo $child_photo; ?>" height="50" width="50" alt="no image"/></p></td>
        <td><p><?php echo $child_name; ?></p></td>
        <td><p><?php echo $city; ?></p></td>
        <td><p><?php echo $child_father_name; ?></p></td>
        <td><p><?php echo $child_gender; ?></p></td>
        <td><p><?php echo $name_partner_ngo; ?></p></td>
        <td>
        <p>
        <a href="view_tagging.php?ptag_id=<?php echo $tag_id; ?>"><button class="btn btn-success btn-sm">View</button></a>
        &nbsp;
        <a href="edit_song.php?pid=<?php echo $tag_id; ?>"><button class="btn btn-success btn-sm">Edit</button></a>
        &nbsp;
        <a href="song_list.php?del=<?php echo $tag_id; ?>" class="ask"><button class="btn btn-danger btn-sm">Delete</button></a>
        </p>
        </td>
      </tr>
      <?php
	   }// row_country end
	   ?>
       </div>
         </table>  
       </div>
    </td>
  </tr>
</table>

</body>
</html>