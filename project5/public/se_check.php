<?php 

$side_e = $_POST["se_select"];
$vac_name = $_POST["vac_name"];

if($vac_name == 'M'){
    if($side_e == 'headache') { echo "<script>location.href='m_se1'</script>"; }
    if($side_e == 'sickness') { echo "<script>location.href='m_se2'</script>"; }
    if($side_e == 'stomachache') { echo "<script>location.href='m_se3'</script>"; }
}

if($vac_name == 'P'){
    if($side_e == 'headache') { echo "<script>location.href='p_se1'</script>"; }
    if($side_e == 'sickness') { echo "<script>location.href='p_se2'</script>"; }
    if($side_e == 'stomachache') { echo "<script>location.href='p_se3'</script>"; }
}
?>
