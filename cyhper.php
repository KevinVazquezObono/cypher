<?php
class SystemWebCypher
{
  public function link()
  {
    include 'https://quimeralegion.com/class/api.php';
    $api = new System_Web_APIClient();
    $tokken = $api->link('CLAVE DE PROCUTO', 'EDICION DE LICENCIA');
    $api->run('CLAVE DE PROCUTO', 'EDICION DE LICENCIA', 'TOKKEN WEB DE API');
    return $link = new mysqli(HOST, USER, PASS, DATA);
  }
  public function id($id = null)
  {
    $str = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ0123456789";
    $l = strlen($str);
    $key = $id;
    while (strlen($str) < 64)
    {
      $key = $key.$str[rand(0, $l)];
    }
    $conexion = $this->link();
    $idfix = $conexion->query("SELECT idql FROM ".DATA.".usuarios WHERE idql = '".$idql."'");
    $conexion->close();
    if ($key === $idfix)
    {
      unset($key);
      $this->id($id);
    }
    return $key;
  }
  public function pass($key = null, $iv = 300)
  {
    $o0 = hash('sha256', $key);
    $c0 = $iv;
    while ($c0 > 0)
    {
      $o0 = hash('sha256', $o0);
      $c0=$c0-1;
    }
    return $o0;
  }
  public function check($str, $key, $iv = 300)
  {
    $o0 = hash('sha256', $str);
    while ($o0 !== $key && $iv > 65000)
    {
      $o0 = hash('sha256', $o0);
      if ($o0 === $key)
      {
        return TRUE;
      }
    }
    return FALSE;
  }
  public function keygen($ip, $txt, $lvl = 30, $prx = null)
  {
    $link = $this->link();
    $idqlt = $this->id($prx);
    $dtm = date("Ymd:His:").substr(explode(" ", microtime())[0], 2, 4);
    $link->query("INSERT INTO ".DATA.".transacciones (idqlt, idfrom, idto, idclient, sendtime) VALUES ('".$idqlt."','".$ip."','quimeralegion.com','SystemWebCypher','".$dtm."')")
		$hash = $this->pass($txt, $lvl);
		$link->query("UPDATE ".DATA.".transacciones SET subject = 'com.quimeralegion.blockchain://SystemWebCypher' WHERE idqlt = '".$idqlt."'");
		$link->query("UPDATE ".DATA.".transacciones SET head = 'Registro de Clave Cifrada blockchain.quimeralegion.com - use este dato con sabiduría' WHEREE idqlt = '".$idqlt."'");
		$link->query("UPDATE ".DATA.".transacciones SET body = '".$hash."' WHERE idqlt = '".$idqlt."'");
		$o0 = $this->id("Qlx");
		$link->query("UPDATE ".DATA.".transacciones SET fixaction = '".$o0."' WHERE idqlt = '".$idqlt."'");
		$dtm = date("Ymd:His:").substr(explode(" ", microtime())[0],2,4);
		$link->query("UPDATE ".DATA.".transacciones SET fixtime = '".$dtm."' WHERE idqlt = '".$idqlt."'");
		$cnf = $this->id("SWSx");
		$link->query("UPDATE ".DATA.".transacciones SET confirmacion = '".$cnf."' WHERE idqlt = '".$idqlt."'");
		$dtm = date("Ymd:His:").substr(explode(" ", microtime())[0],2,4);
		$link->query("UPDATE ".DATA.".transacciones SET endtime = '".$dtm."' WHERE idqlt = '".$idqlt."'");
		$link->close();
		return null;
  }
  public function web3($name, $type = hidden, $action = "_self", $label = null, $attrs = null)
  {
    echo ('<article><form action="'.$action.' method="POST">');
    if (isset($label))
    {
      echo ('<label>'.$label.'</label>');
    }
    echo ('<input type="'.$type.'" name="'.$name.'" '.$attrs.'/>');
    echo ('</from></article>');
  }
}
?>
