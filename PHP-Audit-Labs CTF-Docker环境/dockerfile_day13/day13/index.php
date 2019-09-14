<?php
require 'db.inc.php';
  function dhtmlspecialchars($string) {
      if (is_array($string)) {
          foreach ($string as $key => $val) {
              $string[$key] = dhtmlspecialchars($val);
          }
      }
      else {
          $string = str_replace(array('&', '"', '<', '>', '(', ')'), array('&amp;', '&quot;', '&lt;', '&gt;', '（', '）'), $string);
          if (strpos($string, '&amp;#') !== false) {
              $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4}));)/', '&\\1', $string);
          }
      }
      return $string;
  }
  function dowith_sql($str) {
      $check = preg_match('/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/is', $str);
      if ($check) {
          echo "非法字符!";
          exit();
      }
      return $str;
  }
  // 经过第一个waf处理
  foreach ($_REQUEST as $key => $value) {
      $_REQUEST[$key] = dowith_sql($value);
  }
  // 经过第二个WAF处理
  $request_uri = explode("?", $_SERVER['REQUEST_URI']);
  if (isset($request_uri[1])) {
      $rewrite_url = explode("&", $request_uri[1]);
      foreach ($rewrite_url as $key => $value) {
          $_value = explode("=", $value);
          if (isset($_value[1])) {
              $_REQUEST[$_value[0]] = dhtmlspecialchars(addslashes($_value[1]));
          }
      }
  }
  // 业务处理
  if (isset($_REQUEST['submit'])) {
      $user_id = $_REQUEST['i_d'];
      $sql = "select * from day13.users where id=$user_id";
      $result=mysql_query($sql);
      while($row = mysql_fetch_array($result))
      {
          echo "<tr>";
          echo "<td>" . $row['name'] . "</td>";
          echo "</tr>";
      }
  }
?>
