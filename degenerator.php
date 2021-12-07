<?php
function idGenerator ($a, $arr) {
  $temp = [];
    for ($i=0; $i<count($arr); $i++){
      $temp[$i] = $arr[$i][0];
    }
    return in_array($a, $temp) ? idGenerator($a + 1, $arr) : $a;
  }
  echo idGenerator(0,[[0],[1],[3],[4],[5]])
  
?>

