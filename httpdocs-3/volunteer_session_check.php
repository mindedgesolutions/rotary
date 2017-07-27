<?php
include('include/config.php');

if (isset($_SESSION['volunteer_session']) && strlen($_SESSION['volunteer_session'])>2)
{
}
else
{
?>
<script>
window.location='http://rotaryteach.org/index.php';
</script>
<?php
}
?>