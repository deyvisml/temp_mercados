<?php 
/**
 *JGRILLA-PHP v0.2
 *
 * @Autor: Luis Catacora Murillo
 * @email: luiscatacora@live.com      
 *      
 */
?>
<?php  if( ! defined("\x42\x41\x53\x45\x50\x41\x54\x48")) exit("\x4e\x6f\x20\x73\x65\x20\x70\x65\x72\x6d\x69\x74\x65\x20\x61\x63\x63\x65\x73\x6f\x20\x64\x69\x72\x65\x63\x74\x6f\x20\x61\x6c\x20\x73\x63\x72\x69\x70\x74");
 class Jgrilla
{public $urlGrilla 		= "";public $barraFiltro 	= true;public $operacion 		= "";public $nuevoEnLinea 	= false;protected $opcionesGrilla = array(
"\x77i\x64t\x68" => "65\x30",
"\x68\x6fve\x72r\x6fws" => true, 
"\x76i\x65wr\x65\x63o\x72d\x73" => true,
"\x72o\x77\x6eum\x62e\x72\x73" => true,
"da\x74at\x79\x70\x65" => "\x6a\x73o\x6e",  
"r\x6f\x77N\x75m" => 10,
"a\x75to\x77id\x74h"	=> true,
"\x72o\x77\x4cis\x74" => array(10, 30, 60, 120, 240, 480, 960),
"s\x6fr\x74o\x72\x64\x65r" => "de\x73\x63",
"p\x6fst\x44at\x61" => array("\x6fp\x65r" => "g\x72i\x64"),
"pr\x6dNa\x6d\x65s" => array("p\x61\x67e" => "\x70a\x67\x65", "r\x6fws" => "\x72\x6fw\x73", "s\x6f\x72t" => "\x73i\x64\x78", "o\x72de\x72" => "\x73\x6fr\x64", "s\x65\x61\x72c\x68" => "\x5fse\x61rc\x68", "\x6ed" => "\x6ed", "id" => "\x69d", "\x66i\x6ct\x65r" => "f\x69l\x74\x65rs", "se\x61rc\x68Fi\x65\x6cd" => "s\x65\x61r\x63\x68Fi\x65l\x64", "s\x65\x61r\x63\x68O\x70e\x72" => "s\x65ar\x63hO\x70e\x72", "\x73e\x61rc\x68\x53\x74\x72\x69ng" => "s\x65\x61\x72\x63h\x53\x74ri\x6eg", "\x6fp\x65r" => "o\x70er", "\x71\x75\x65r\x79" => "g\x72i\x64", "\x61dd\x6fpe\x72" => "a\x64\x64", "\x65d\x69\x74o\x70er" => "e\x64it", "\x64el\x6fp\x65r" => "\x64\x65\x6c", "\x65x\x63el" => "ex\x63e\x6c", "\x73\x75\x62gr\x69d" => "s\x75\x62\x67ri\x64", "\x74ot\x61lr\x6f\x77\x73" => "\x74o\x74a\x6cro\x77\x73", "a\x75\x74\x6fc\x6f\x6d\x70l\x65\x74\x65" => "a\x75to\x63mp\x6c"),
"l\x6fad\x43o\x6d\x70\x6cet\x65"=>"\x6a\x73\x3af\x75n\x63ti\x6fn(\x29 \x7b						v\x61\x72 t\x61b\x6ce \x3d\x20th\x69s;
						se\x74\x54\x69\x6deo\x75t\x28\x66\x75n\x63\x74io\x6e()\x7b
							s\x74yl\x65Ch\x65c\x6bb\x6f\x78\x28ta\x62\x6ce)\x3b							
							\x75p\x64a\x74eA\x63\x74i\x6fnI\x63\x6fn\x73\x28\x74a\x62le\x29\x3b
							\x75p\x64\x61te\x50\x61\x67e\x72\x49\x63\x6fns\x28\x74\x61b\x6ce\x29;
							e\x6e\x61bl\x65To\x6f\x6c\x74\x69p\x73(t\x61bl\x65\x29;
						}\x2c \x30)\x3b
					}"
,			
);protected $columnaGrilla = array();protected $accionGrilla = array();protected $opcionBarra = array(
"c\x6co\x6eeT\x6fT\x6fp"=>true,
"ed\x69t" => true,
"e\x64\x69\x74te\x78t"=>"",
"\x65d\x69\x74\x69c\x6f\x6e"=>"\x61\x63\x65\x2d\x69\x63\x6f\x6e\x20\x66\x61\x20\x66\x61\x2d\x70\x65\x6e\x63\x69\x6c\x20\x62\x6c\x75\x65", 
"a\x64d" => true,
"\x61dd\x74e\x78t"=>"",
"a\x64\x64\x69co\x6e"=> "\x61\x63\x65\x2d\x69\x63\x6f\x6e\x20\x66\x61\x20\x66\x61\x2d\x70\x6c\x75\x73\x2d\x63\x69\x72\x63\x6c\x65\x20\x70\x75\x72\x70\x6c\x65",
"\x64e\x6c" => true,
"d\x65lt\x65x\x74"=>"",
"\x64\x65\x6ci\x63\x6fn"=> "\x61\x63\x65\x2d\x69\x63\x6f\x6e\x20\x66\x61\x20\x66\x61\x2d\x74\x72\x61\x73\x68\x2d\x6f\x20\x72\x65\x64",
"s\x65ar\x63h" => true,
"\x73ea\x72c\x68te\x78t"=>"",
"se\x61\x72\x63h\x69co\x6e"=> "\x61\x63\x65\x2d\x69\x63\x6f\x6e\x20\x66\x61\x20\x66\x61\x2d\x73\x65\x61\x72\x63\x68\x20\x6f\x72\x61\x6e\x67\x65",
"\x76\x69ew" => true,
"v\x69ew\x74e\x78\x74"=>"",
"\x76ie\x77i\x63on"=>"\x61\x63\x65\x2d\x69\x63\x6f\x6e\x20\x66\x61\x20\x66\x61\x2d\x73\x65\x61\x72\x63\x68\x2d\x70\x6c\x75\x73\x20\x67\x72\x65\x79",
"\x72\x65fr\x65\x73h" => true,
"r\x65f\x72es\x68\x74ex\x74"=>"",
"re\x66r\x65s\x68\x69\x63\x6f\x6e"=> "\x61\x63\x65\x2d\x69\x63\x6f\x6e\x20\x66\x61\x20\x66\x61\x2d\x72\x65\x66\x72\x65\x73\x68\x20\x67\x72\x65\x65\x6e");
protected $opcionEdit = array("w\x69\x64\x74h"=>450
);
protected $opcionAdd = array("w\x69dt\x68"=>450
); 
protected $opcionDel = array();
protected $opcionSearch = array("m\x75l\x74i\x70le\x53e\x61rc\x68"=>true
);protected $opcionView = array("wi\x64\x74\x68"=>450);protected $cagarGrilla = true;protected $grupoTitulo = array();protected $metodoGrilla = array();
protected $k = "";protected $nuevoEnLineaOpcion = array("a\x64\x64Pa\x72a\x6ds" => array(), "e\x64it\x50a\x72am\x73" => array());
protected $modeloNombre = "";protected $modeloCRUD 	= true;protected $modeloFuncion = array(
"i\x6ese\x72t" => "\x69\x6e\x73\x65rt",
"u\x70d\x61te" => "\x75pd\x61t\x65",
"d\x65le\x74\x65" => "\x64\x65le\x74e",
"s\x65l\x65c\x74" => "\x73el\x65\x63\x74",
"\x74ot\x61l"  => "\x74o\x74al");protected $filtro 		= "";protected $ci;protected $campos;protected $f; private $j	= "";function __construct() {
if(isset($_REQUEST["\x6f\x70\x65\x72"])) {$this->cagarGrilla = false;$this->operacion = $_REQUEST["\x6f\x70\x65\x72"];$this->ci =& get_instance();
} else {$o = $this->operacion;$this->cagarGrilla = true;}}function esOperacion(){if(isset($_REQUEST["\x6f\x70\x65\x72"]))
return true;return false;}function extenderArray($o, $e) {foreach($e as $p => $eo) {if(is_array($eo)) {if(!isset($o[$p])) {
$o[$p] = $eo;} else {$o[$p] = $this->extenderArray($o[$p], $eo);}} else {$o[$p] = $eo;}}return $o;}function convertirArray($o) {
$e = "";if(is_string($o)) {if(strpos($o, "\x6a\x73\x3a") === 0){$e = substr($o, 3);}else{$e = "\x22" . $o . "\x22";}} elseif(is_int($o) or is_float($o)) {
$e = $o;} elseif(is_bool($o)) {if($o) {$e = "\x74\x72\x75e";} else {$e = "\x66\x61\x6cs\x65";}} elseif(is_array($o)) {$p = array();
$eo = false;foreach($o as $ee => $ep) {if(is_int($ee)) {$p[] = $this->convertirArray($ep);$eo = true;} else {$p[] = $ee . "\x3a\x20" . $this->convertirArray($ep);
$eo = false;}}if($eo) {$e = "\x5b" . implode("\x2c\x20", $p) . "\x5d";} else {$e = "\x7b" . implode("\x2c\x20", $p) . "\x7d";
}}return $e;}public function convertirValue($o){$e=array();if(is_array($o) && count($o) > 0) {foreach($o as $p){$e[]=$p["\x69\x64"]."\x3a".$p["\x6e\x6f\x6d\x62\x72\x65"];
}$e = implode("\x3b",$e);}elseif(is_object($o)){return false;}return $e;}public function agregaColumna(array $o, $e = "\x6c\x61\x73\x74") {
if(!$this->cagarGrilla)return false;if(is_array($o) && count($o) > 0) {$p = count($this->columnaGrilla);if($p > 0) {if(strtolower($e) === "\x66\x69\x72\x73\x74") {
array_unshift($this->columnaGrilla, $o);} else if(strtolower($e) === "\x6c\x61\x73\x74") {array_push($this->columnaGrilla, $o);
} else if((int) $e >= 0 && (int) $e <= $p - 1) {$eo = array_slice($this->columnaGrilla, 0, $e + 1);$ee = array_slice($this->columnaGrilla, $e + 1);
array_push($eo, $o);$this->columnaGrilla = array();foreach($ee as $ep) {$eo[] = $ep;}$this->columnaGrilla = $eo;}$o = null;
return true;}}return false;}public function operacionLinea($o = "Op\x65r\x61ci\xc3�n", $e = "\x6c\x61\x73\x74", $p = 80){
$this->agregaColumna(array(
"\x6e\x61\x6de"			=> $o,
"\x66\x6f\x72m\x61\x74\x74e\x72"		=> "\x61\x63\x74i\x6f\x6e\x73",
"\x65\x64\x69t\x61\x62\x6ce"		=> false,
"\x73\x6f\x72t\x61\x62\x6ce"		=> false,
"\x72\x65\x73i\x7a\x61\x62l\x65"		=> false,
"\x66\x69\x78e\x64"			=> true,
"\x73\x65\x61r\x63\x68"		=> false,
"\x76\x69\x65w\x61\x62\x6ce" 		=> false,
"\x77\x69\x64t\x68"			=> $p,
"\x66\x6f\x72m\x61\x74\x6fp\x74\x69\x6f\x6es" => array("\x6b\x65\x79s" => true)), $e);}public function setOpcionGrilla($o) {
if($this->cagarGrilla) {if(is_array($o)) {$this->opcionesGrilla = $this->extenderArray($this->opcionesGrilla, $o);}} else {
return false;}}public function setColumnaGrilla($o, array $e) {$p = false;if($this->cagarGrilla) {if(!is_array($e))return $p;
if(count($this->columnaGrilla) > 0) {if(is_int($o)) {$this->columnaGrilla[$o] = $this->extenderArray($this->columnaGrilla[$o], $e);
$p = true;} else {foreach($this->columnaGrilla as $eo => $ee) {if($ee["\x6e\x61\x6d\x65"] == trim($o)) {$this->columnaGrilla[$eo] = $this->extenderArray($this->columnaGrilla[$eo], $e);
$p = true;break;}}}}}return $p;}public function cargarDatosGrilla($o = "", array $e) {$this->f	= $o;$this->campos	= $e;if($this->cagarGrilla) {
if($this->setColumna($e))return true;}return false;}public function setColumna($o){if(is_array($o)){foreach($o as $e => $p) {
$this->columnaGrilla[] = array("\x6e\x61\x6d\x65" => $p, "\x69\x6e\x64\x65\x78" => $p);}return true;}return false;}public function setAccionGrilla($o, $e, $p = null) {
$this->accionGrilla = array("\x61\x63\x63i\x6f\x6e" => $o, "\x73\x71\x6c" => $e, "\x70\x61\x72a\x6d" => $p);}public function setOpcionBarra($o, $e = "\x62\x61\x72") {
$this->opcionBarra = array_merge($this->opcionBarra, $o);switch($e) {
case "\x62\x61\x72":
$this->opcionBarra = array_merge($this->opcionBarra, $o);break;
case "\x65\x64\x69\x74":
$this->opcionEdit = array_merge($this->opcionEdit, $o);break;
case "\x61\x64\x64":
$this->opcionAdd = array_merge($this->opcionAdd, $o);break;
case "\x64\x65\x6c":
$this->opcionDel = array_merge($this->opcionDel, $o);break;
case "\x73\x65\x61\x72\x63\x68":
$this->opcionSearch = array_merge($this->opcionSearch, $o);break;
case "\x76\x69\x65\x77":
$this->opcionView = array_merge($this->opcionView, $o);}}public function setUrlGrilla($o) {if($this->cagarGrilla) {$this->urlGrilla = $o;
$this->setOpcionGrilla(array("\x75\x72\x6c" => $o, "\x65\x64\x69t\x75\x72\x6c" => $o, "\x63\x65\x6c\x6c\x75\x72\x6c" => $o));
return true;} else {return false;}}public function setSubGrilla($o = "", $e = false, $p = false, $eo = false, $ee = false) {
if($this->cagarGrilla){if($e && is_array($e)) {$ep = count($e);for($oo = 0; $oo < $ep; $oo++) {if(!isset($p[$oo]))$p[$oo] = 100;
if(!isset($eo[$oo]))$eo[$oo] = "\x63\x65\x6e\x74\x65\x72";}
$this->setOpcionGrilla(array("\x67\x72\x69d\x76\x69\x65w" => false, "\x73\x75\x62G\x72\x69\x64" => true, "\x73\x75\x62G\x72\x69\x64U\x72\x6c" => $o,
"\x73\x75\x62G\x72\x69\x64M\x6f\x64\x65\x6c" => array(array("\x6e\x61\x6de" => $e, "\x77\x69\x64t\x68" => $p, "\x61\x6c\x69g\x6e" => $eo, "\x70\x61\x72a\x6d\x73" => $ee))));
return true;}}return false;}public function setSubGrillaFull($o, $e=null) {if($this->cagarGrilla){$this->setOpcionGrilla(array("\x73\x75\x62G\x72\x69\x64" => true, "\x67\x72\x69d\x76\x69\x65w" => false));
$p = (is_array($e) && count($e) > 0 ) ? "\x74\x72\x75\x65" : "\x66\x61\x6c\x73\x65";if($p == "\x74\x72\x75\x65") {$eo = implode("\x2c", $e);
} else {$eo = "";}
$ee = "\x66\x75\x6e\x63\x74\x69\x6f\x6e\x28\x73\x75\x62\x67\x72\x69\x64\x69\x64\x2c\x69\x64\x29\x7b\x9\x9\x9\x9\x76\x61\x72\x20\x64\x61\x74\x61\x20\x3d\x20\x7b\x73\x75\x62\x67\x72\x69\x64\x3a\x73\x75\x62\x67\x72\x69\x64\x69\x64\x2c\x20\x72\x6f\x77\x69\x64\x3a\x69\x64\x7d\x3b\xd\xa\x9\x9\x9\x9\x69\x66\x28\x22"
.$p."\x22\x20\x3d\x3d\x20\x22\x74\x72\x75\x65\x22\x29\x20\x7b\x9\x9\x9\x9\x9\x76\x61\x72\x20\x61\x6e\x6d\x3d\x20\x22"
.$eo."\x22\x3b\x9\x9\x9\x9\x9\x61\x6e\x6d\x20\x3d\x20\x61\x6e\x6d\x2e\x73\x70\x6c\x69\x74\x28\x22\x2c\x22\x29\x3b\xd\xa\x9\x9\x9\x9\x9\x76\x61\x72\x20\x72\x64\x20\x3d\x20\x6a\x51\x75\x65\x72\x79\x28\x74\x68\x69\x73\x29\x2e\x6a\x71\x47\x72\x69\x64\x28\x22\x67\x65\x74\x52\x6f\x77\x44\x61\x74\x61\x22\x2c\x20\x69\x64\x29\x3b\xd\xa\x9\x9\x9\x9\x9\x69\x66\x28\x72\x64\x29\x20\x7b\xd\xa\x9\x9\x9\x9\x9\x9\x66\x6f\x72\x28\x76\x61\x72\x20\x69\x3d\x30\x3b\x20\x69\x3c\x61\x6e\x6d\x2e\x6c\x65\x6e\x67\x74\x68\x3b\x20\x69\x2b\x2b\x29\x20\x7b\xd\xa\x9\x9\x9\x9\x9\x9\x9\x69\x66\x28\x72\x64\x5b\x61\x6e\x6d\x5b\x69\x5d\x5d\x29\x20\x7b\xd\xa\x9\x9\x9\x9\x9\x9\x9\x9\x64\x61\x74\x61\x5b\x61\x6e\x6d\x5b\x69\x5d\x5d\x20\x3d\x20\x72\x64\x5b\x61\x6e\x6d\x5b\x69\x5d\x5d\x3b\xd\xa\x9\x9\x9\x9\x9\x9\x9\x7d\xd\xa\x9\x9\x9\x9\x9\x9\x7d\xd\xa\x9\x9\x9\x9\x9\x7d\xd\xa\x9\x9\x9\x9\x7d\xd\xa\x9\x9\x9\x9\x24\x28\x22\x23\x22\x2b\x6a\x51\x75\x65\x72\x79\x2e\x6a\x67\x72\x69\x64\x2e\x6a\x71\x49\x44\x28\x73\x75\x62\x67\x72\x69\x64\x69\x64\x29\x29\x2e\x6c\x6f\x61\x64\x28\x22"
.$o."\x22\x2c\x64\x61\x74\x61\x29\x3b\x9\x9\x9\x7d"
;$this->setEventoGrilla("\x73\x75\x62\x47\x72\x69\x64\x52\x6f\x77\x45\x78\x70\x61\x6e\x64\x65\x64", $ee);return true;}else{
return false;}}public function setEventoGrilla($o, $e) {if($this->cagarGrilla) {$this->opcionesGrilla[$o] = "\x6a\x73\x3a" . $e;
return true;}else{return false;}}public function setGrupoTitulo($o){if(is_array($o)) {array_push($this->grupoTitulo, $o);
}}public function getGrupoTitulo($o){$e = "";if(count($this->grupoTitulo) > 0){
$e = "\x6a\x51\x75e\x72\x79\x28'\x23".$o."\x27\x29\x2ej\x71\x47\x72i\x64\x28\x27\x73e\x74\x47\x72o\x75\x70\x48e\x61\x64e\x72\x73\x27\x2c\x20"."{				 "."\x20\x75\x73e\x43\x6f\x6cS\x70\x61\x6e\x53t\x79\x6c\x65:\x20\x74\x72u\x65\x2c 
				\x20 \x67r\x6fu\x70H\x65\x61d\x65r\x73:"
;$e .= $this->convertirArray($this->grupoTitulo)."\x7d\x29\x3b";}return $e;}public function setMetodoGrilla($o, $e, array $p = null) {
if($this->cagarGrilla) {$eo = "";if(is_array($p) && count($p) > 0) {$eo = $this->convertirArray($p);$eo = substr($eo, 1);
$eo = substr($eo, 0, -1);$eo = "\x2c" . $eo;} if(strpos($o, "\x23") === false || strpos($o, "\x23") > 0) {$o = "\x23" . $o;
}$this->metodoGrilla[] = "\x6a\x51\x75e\x72\x79\x28'" . $o . "\x27\x29\x2ej\x71\x47\x72i\x64\x28\x27" . $e . "\x27" . $eo . "\x29\x3b";
}}public function setJsCodigo($o){if($this->cagarGrilla) {$this->k = "\x6a\x73\x3a".$o;}}public function setNuevoEnLineaOpcion($o, $e) {
if(!$this->cagarGrilla)return false;switch($o) {
case "\x6e\x61\x76\x69\x67\x61\x74\x6f\x72":
$this->nuevoEnLineaOpcion = array_merge($this->nuevoEnLineaOpcion, $e);break;
case "\x61\x64\x64":
$this->nuevoEnLineaOpcion["\x61\x64\x64\x50\x61\x72\x61\x6d\x73"] = array_merge($this->nuevoEnLineaOpcion["\x61\x64\x64\x50\x61\x72\x61\x6d\x73"], $e);
break;
case "\x65\x64\x69\x74":
$this->nuevoEnLineaOpcion["\x65\x64\x69\x74\x50\x61\x72\x61\x6d\x73"] = array_merge($this->nuevoEnLineaOpcion["\x65\x64\x69\x74\x50\x61\x72\x61\x6d\x73"], $e);
break;}return true;}public function generaGrilla($o="", $e="") {if($this->cagarGrilla) {$p = "";$p .= "\x3c\x74\x61b\x6c\x65\x20i\x64\x3d\x27" . $o . "\x27>\x3c/\x74\x61\x62l\x65>";
$p .= "\x3c\x64\x69v\x20\x69\x64=\x27" . $e . "\x27>\x3c/\x64\x69\x76>";$this->opcionesGrilla["\x63\x6f\x6c\x4d\x6f\x64\x65\x6c"] = $this->columnaGrilla;
$this->opcionesGrilla["\x70\x61\x67\x65\x72"] = "\x23" . $e;$p .= "\x3c\x73\x63r\x69\x70\x74 \x74\x79\x70\x65=\x27\x74\x65x\x74\x2f\x6aa\x76\x61s\x63\x72\x69\x70\x74'>";
$p .= "\x6a\x51\x75e\x72\x79\x28d\x6f\x63\x75\x6de\x6e\x74\x29.\x72\x65\x61d\x79\x28f\x75\x6e\x63\x74\x69o\x6e(\x29 "."{";
$p .= "\x6a\x51\x75e\x72\x79\x28'\x23" . $o . "\x27\x29\x2ej\x71\x47\x72i\x64\x28" . $this->convertirArray($this->opcionesGrilla) . "\x29\x3b";
$p .= "\x6a\x51\x75e\x72\x79\x28'\x23" . $o . "\x27\x29\x2ej\x71\x47\x72i\x64\x28\x27\x6ea\x76\x47\x72i\x64\x27\x2c'\x23" . $e . "\x27\x2c";
$p .= $this->convertirArray($this->opcionBarra) . "\x2c";$p .= $this->convertirArray($this->opcionEdit) . "\x2c";$p .= $this->convertirArray($this->opcionAdd) . "\x2c";
$p .= $this->convertirArray($this->opcionDel) . "\x2c";$p .= $this->convertirArray($this->opcionSearch) . "\x2c";$p .= $this->convertirArray($this->opcionView)."\x29\x3b";
$p .= $this->getGrupoTitulo($o);if($this->nuevoEnLinea && strlen($e) > 0) {$this->setMetodoGrilla($o, "\x73\x65\x74\x46\x72\x6f\x7a\x65\x6e\x43\x6f\x6c\x75\x6d\x6e\x73");
$eo = "\x66\x75\x6e\x63\x74\x69\x6f\x6e\x20\x28\x69\x64\x2c\x20\x72\x65\x73\x29\x7b\x9\x9\x9\x9\x9\x72\x65\x73\x20\x3d\x20\x72\x65\x73\x2e\x72\x65\x73\x70\x6f\x6e\x73\x65\x54\x65\x78\x74\x2e\x73\x70\x6c\x69\x74\x28\x22\x23\x22\x29\x3b\xd\xa\x9\x9\x9\x9\x9\x74\x72\x79\x20\x7b\xd\xa\x9\x9\x9\x9\x9\x9\x24\x28\x74\x68\x69\x73\x29\x2e\x6a\x71\x47\x72\x69\x64\x28\x22\x73\x65\x74\x43\x65\x6c\x6c\x22\x2c\x20\x69\x64\x2c\x20\x72\x65\x73\x5b\x30\x5d\x2c\x20\x72\x65\x73\x5b\x31\x5d\x29\x3b\xd\xa\x9\x9\x9\x9\x9\x9\x24\x28\x22\x23\x22\x2b\x69\x64\x2c\x20\x22\x23\x22\x2b\x74\x68\x69\x73\x2e\x70\x2e\x69\x64\x29\x2e\x72\x65\x6d\x6f\x76\x65\x43\x6c\x61\x73\x73\x28\x22\x6a\x71\x67\x72\x69\x64\x2d\x6e\x65\x77\x2d\x72\x6f\x77\x22\x29\x2e\x61\x74\x74\x72\x28\x22\x69\x64\x22\x2c\x72\x65\x73\x5b\x31\x5d\x20\x29\x3b\xd\xa\x9\x9\x9\x9\x9\x9\x24\x28\x74\x68\x69\x73\x29\x5b\x30\x5d\x2e\x70\x2e\x73\x65\x6c\x72\x6f\x77\x20\x3d\x20\x72\x65\x73\x5b\x31\x5d\x3b\x9\x9\x9\x9\x9\x9\x9\x9\x9\x9\x9\xd\xa\x9\x9\x9\x9\x9\x7d\x20\x63\x61\x74\x63\x68\x20\x28\x61\x73\x72\x29\x20\x7b\x7d\xd\xa\x9\x9\x9\x9\x7d"
;$this->nuevoEnLineaOpcion["\x61\x64\x64\x50\x61\x72\x61\x6d\x73"] = $this->extenderArray($this->nuevoEnLineaOpcion["\x61\x64\x64\x50\x61\x72\x61\x6d\x73"], array("\x61\x66\x74e\x72\x73\x61v\x65\x66\x75\x6ec" => "\x6a\x73\x3a" . $eo));
$this->nuevoEnLineaOpcion["\x65\x64\x69\x74\x50\x61\x72\x61\x6d\x73"] = $this->extenderArray($this->nuevoEnLineaOpcion["\x65\x64\x69\x74\x50\x61\x72\x61\x6d\x73"], array("\x61\x66\x74e\x72\x73\x61v\x65\x66\x75\x6ec" => "\x6a\x73\x3a" . $eo));
$p .= "\x6a\x51\x75e\x72\x79\x28'\x23".$o."\x27\x29\x2ej\x71\x47\x72i\x64\x28\x27\x69n\x6c\x69\x6ee\x4e\x61\x76'\x2c\x27".$e."\x27\x2c".$this->convertirArray($this->nuevoEnLineaOpcion) ."\x29\x3b"."\n";
}if($this->barraFiltro)$p .= "\x6a\x51\x75e\x72\x79\x28'\x23".$o."\x27\x29\x2ej\x71\x47\x72i\x64\x28\x27\x66i\x6c\x74\x65r\x54\x6f\x6fl\x62\x61r\x27\x2c"."{stringResult: "."\x74\x72\x75e\x2c\x73\x65a\x72\x63\x68\x4fn\x45\x6e\x74e\x72\x3a\x20f\x61\x6cs\x65\x7d\x29\x3b";
if(count($this->metodoGrilla) > 0){foreach($this->metodoGrilla as $ee){$p .= $ee."\n";}}if(strlen($this->k) > 0)$p .= $this->convertirArray($this->k);
$p .= "			f\x75\x6e\x63t\x69\x6f\x6e\x20b\x65\x66\x6fr\x65\x44\x65l\x65\x74e\x43\x61\x6c\x6c\x62a\x63k\x28e\x29 "."{
				var "."\x66\x6f\x72m\x20\x3d\x20$\x28\x65\x5b\x30]\x29\x3b
				\x69\x66(\x66\x6f\x72\x6d\x2ed\x61t\x61(\x27s\x74y\x6c\x65d\x27)\x29 \x72\x65\x74\x75r\x6e \x66a\x6cs\x65\x3b
				f\x6f\x72\x6d\x2e\x63l\x6fs\x65\x73t\x28'\x2e\x75\x69-\x6a\x71d\x69a\x6c\x6fg\x27\x29.\x66i\x6ed\x28\x27.\x75i-j\x71d\x69a\x6c\x6fg-\x74i\x74l\x65\x62a\x72\x27)\x2ew\x72\x61\x70I\x6e\x6e\x65r\x28'\x3c\x64i\x76\x20\x63\x6ca\x73s\x3d"."\"widget-header\" "."\x2f>\x27)
				\x73\x74y\x6c\x65\x5fd\x65\x6c\x65t\x65\x5ff\x6f\x72\x6d\x28\x66o\x72m\x29;
				f\x6fr\x6d.\x64\x61\x74\x61(\x27s\x74y\x6ce\x64\x27\x2c\x20\x74\x72u\x65)\x3b
			\x7d
			f\x75\x6e\x63\x74\x69\x6fn\x20b\x65\x66o\x72\x65E\x64i\x74C\x61\x6cl\x62a\x63k\x28e\x29 "."{
					var "."\x66\x6f\x72m\x20\x3d\x20$\x28\x65\x5b\x30]\x29\x3b
					\x66o\x72\x6d\x2e\x63\x6co\x73e\x73t\x28'\x2eu\x69-j\x71d\x69a\x6c\x6f\x67\x27)\x2ef\x69n\x64(\x27\x2e\x75\x69-\x6aq\x64i\x61\x6c\x6f\x67-t\x69t\x6c\x65b\x61r\x27\x29\x2e\x77\x72\x61p\x49n\x6e\x65r\x28\x27<\x64i\x76 \x63\x6ca\x73s\x3d"."\"widget-header\" "."\x2f>\x27)
					\x73t\x79\x6c\x65_\x65\x64\x69t\x5f\x66o\x72\x6d\x28\x66\x6fr\x6d)\x3b
			\x7d
			f\x75\x6e\x63\x74i\x6fn\x20s\x74y\x6c\x65\x43\x68\x65\x63k\x62o\x78\x28\x74\x61\x62l\x65)\x20"."{
				/**
					$(table).find('input:checkbox').addClass('ace')
					.wrap('<label "."\x2f>\x27)
					\x2ea\x66\x74\x65r\x28\x27\x3cs\x70\x61n\x20\x63\x6c\x61\x73s\x3d"."\"lbl "."\x61\x6c\x69g\x6e-\x74o\x70"."\" "."\x2f>\x27)
					\x24(\x27\x2e\x75i-\x6a\x71g\x72\x69d-\x6c\x61\x62\x65l\x73 \x74h\x5bi\x64*\x3d"."\"_cb\"]:first-child')
					.find('input.cbox[type=checkbox]').addClass('ace')
					.wrap('<label "."\x2f>\x27)\x2e\x61\x66t\x65\x72\x28\x27<\x73\x70\x61n\x20\x63\x6ca\x73\x73="."\"lbl "."\x61\x6c\x69g\x6e-\x74o\x70"."\" "."\x2f>\x27)\x3b
				\x2a/
				\x7d
				\x66\x75\x6ec\x74i\x6fn\x20u\x70d\x61\x74e\x41c\x74i\x6f\x6e\x49\x63o\x6es\x28t\x61b\x6c\x65\x29\x20"."{
					/**
					var "."\x72\x65\x70l\x61\x63\x65m\x65\x6e\x74\x20=\x20
					"."{
						'ui-ace-icon "."\x66\x61\x20f\x61-\x70e\x6e\x63\x69\x6c'\x20\x3a\x20'\x61\x63\x65-\x69\x63o\x6e\x20\x66\x61\x20f\x61-\x70e\x6ec\x69l\x20\x62l\x75e\x27,
						'\x75i-\x61\x63\x65-\x69c\x6fn\x20\x66\x61\x20\x66a-t\x72\x61s\x68-\x6f\x27\x20\x3a\x20\x27a\x63e-\x69c\x6f\x6e \x66a\x20f\x61-t\x72a\x73h-o\x20r\x65\x64'\x2c
						\x27u\x69-\x69\x63\x6fn-\x64\x69s\x6b'\x20\x3a \x27\x61\x63\x65-\x69c\x6f\x6e\x20f\x61\x20\x66a-c\x68e\x63\x6b\x20g\x72e\x65\x6e\x27,
						\x27\x75i-i\x63o\x6e-\x63\x61n\x63\x65\x6c\x27\x20:\x20'\x61\x63\x65-\x69c\x6fn\x20f\x61 \x66a-\x74\x69\x6d\x65s\x20r\x65d\x27
					\x7d;
					\x24(\x74\x61\x62l\x65\x29.\x66\x69n\x64(\x27\x2eu\x69-\x70g-d\x69v\x20\x73\x70a\x6e\x2e\x75i-i\x63\x6fn\x27\x29\x2e\x65\x61c\x68\x28f\x75\x6ec\x74\x69o\x6e(\x29"."{
						var "."\x69\x63\x6fn\x20\x3d\x20$\x28\x74\x68\x69s\x29\x3b
						v\x61\x72\x20\x24"
."\x63\x6c\x61s\x73\x20\x3d \x24\x2e\x74\x72i\x6d\x28\x69c\x6f\x6e\x2ea\x74\x74r\x28\x27\x63\x6c\x61s\x73'\x29.\x72e\x70l\x61\x63e\x28'\x75i-\x69\x63\x6fn\x27,\x20'\x27)\x29\x3b						i\x66\x28\x24"
."\x63\x6c\x61s\x73\x20\x69n\x20\x72\x65\x70l\x61\x63\x65m\x65\x6e\x74)\x20\x69c\x6f\x6e\x2e\x61\x74t\x72(\x27c\x6ca\x73s\x27\x2c \x27u\x69-\x69\x63\x6f\x6e \x27+\x72e\x70l\x61\x63\x65\x6d\x65\x6et\x5b$"."\x63\x6c\x61s\x73\x5d\x29;					\x7d\x29
					\x2a/
				\x7d
				f\x75\x6ec\x74i\x6fn\x20\x75\x70\x64a\x74e\x50a\x67e\x72\x49\x63\x6f\x6e\x73(\x74a\x62\x6c\x65\x29\x20"."{
					var "."\x72\x65\x70l\x61\x63\x65m\x65\x6e\x74\x20=\x20
					"."{
						'ui-icon-seek-first' "."\x3a\x20\x27a\x63\x65-i\x63\x6f\x6e\x20f\x61\x20\x66a-\x61\x6eg\x6c\x65-\x64\x6f\x75\x62\x6ce-l\x65f\x74 \x62i\x67\x67e\x72-\x314\x30\x27\x2c
						\x27\x75\x69-\x69\x63o\x6e-\x73\x65\x65\x6b-p\x72e\x76\x27 \x3a \x27\x61\x63\x65-\x69c\x6fn\x20\x66a\x20\x66a-a\x6eg\x6c\x65-\x6ce\x66t\x20b\x69g\x67\x65r-\x314\x30'\x2c
						\x27\x75i-\x69\x63o\x6e-\x73\x65e\x6b-\x6e\x65x\x74'\x20\x3a\x20'\x61\x63\x65-\x69c\x6fn\x20\x66\x61 \x66a-\x61\x6eg\x6ce-r\x69\x67\x68t\x20\x62i\x67g\x65r-1\x34\x30'\x2c
						\x27\x75i-i\x63o\x6e-\x73e\x65k-\x65\x6e\x64\x27 \x3a \x27a\x63e-i\x63o\x6e \x66a\x20\x66\x61-\x61\x6eg\x6ce-\x64\x6fu\x62\x6ce-\x72i\x67h\x74\x20b\x69\x67\x67e\x72-\x314\x30\x27
					}\x3b
					$\x28\x27.\x75\x69-\x70\x67-\x74a\x62\x6ce\x3a\x6e\x6f\x74(\x2en\x61v\x74a\x62l\x65\x29\x20>\x20\x74\x62o\x64y\x20>\x20\x74r\x20>\x20.\x75i-p\x67-\x62\x75t\x74\x6fn\x20> \x2eu\x69-\x69c\x6f\x6e\x27\x29.\x65\x61\x63h\x28\x66u\x6e\x63t\x69o\x6e(\x29"."{
						var "."\x69\x63\x6fn\x20\x3d\x20$\x28\x74\x68\x69s\x29\x3b
						v\x61\x72\x20\x24"
."\x63\x6c\x61s\x73\x20\x3d \x24\x2e\x74\x72i\x6d\x28\x69c\x6f\x6e\x2ea\x74\x74r\x28\x27\x63\x6c\x61s\x73'\x29.\x72e\x70l\x61\x63e\x28'\x75i-\x69\x63\x6fn\x27,\x20'\x27)\x29\x3b						
						i\x66\x28$"
."\x63\x6c\x61s\x73\x20\x69n\x20\x72\x65\x70l\x61\x63\x65m\x65\x6e\x74)\x20\x69c\x6f\x6e\x2e\x61\x74t\x72(\x27c\x6ca\x73s\x27\x2c \x27u\x69-\x69\x63\x6f\x6e \x27+\x72e\x70l\x61\x63\x65\x6d\x65\x6et\x5b$"."\x63\x6c\x61s\x73\x5d\x29;					\x7d\x29
				\x7d
			
				f\x75n\x63t\x69\x6fn\x20e\x6ea\x62\x6c\x65\x54o\x6fl\x74i\x70s\x28\x74\x61\x62\x6c\x65)\x20"."{
					$('.navtable "."\x2e\x75\x69-\x70\x67-b\x75\x74\x74\x6fn\x27\x29\x2et\x6f\x6f\x6ct\x69\x70("."{container:'body'});
					$(table).find('.ui-pg-div').tooltip({container:'body'});
				}"
;$p .= "\x7d\x29\x3b \x3c\x2f\x73c\x72\x69\x70\x74>";return array("\x67\x72\x69l\x6c\x61" => $p);} else {$ep	= "";$oo	= $this->f;
$oe	= $this->campos;$op	= "";if(isset($_POST["\x6f\x70\x65\x72"])){$ep = $_POST;unset($ep["\x6f\x70\x65\x72"]);}$po = "";
switch($this->operacion){
case "\x65\x64\x69\x74":
$op	= array($this->campos["\x69\x64"] => $ep["\x69\x64"]);unset($ep["\x69\x64"]);$oe 	= $ep;if($this->modeloCRUD){}else{$po = "\x24\x74\x68\x69\x73\x2d\x3e\x63\x69\x2d\x3e".$this->modeloNombre."\x2d\x3e".$this->modeloFuncion["\x75\x70\x64\x61\x74\x65"]."\x28\x24\x74\x61\x62\x6c\x61\x2c\x24\x77\x68\x65\x72\x65\x2c\x24\x64\x61\x74\x61\x29\x3b";
}break;
case "\x61\x64\x64":
unset($ep["\x6f\x70\x65\x72"]);unset($ep["\x69\x64"]);$oe = $ep;if($this->modeloCRUD){}else{$po = "\x24\x74\x68\x69\x73\x2d\x3e\x63\x69\x2d\x3e".$this->modeloNombre."\x2d\x3e".$this->modeloFuncion["\x69\x6e\x73\x65\x72\x74"]."\x28\x24\x74\x61\x62\x6c\x61\x2c\x24\x64\x61\x74\x61\x29\x3b";
}break;
case "\x64\x65\x6c":
$op	= array($this->campos["\x69\x64"] => $ep["\x69\x64"]);if($this->modeloCRUD){}else{$po = "\x24\x74\x68\x69\x73\x2d\x3e\x63\x69\x2d\x3e".$this->modeloNombre."\x2d\x3e".$this->modeloFuncion["\x64\x65\x6c\x65\x74\x65"]."\x28\x24\x74\x61\x62\x6c\x61\x2c\x24\x77\x68\x65\x72\x65\x29\x3b";
}break;
default:
if($this->modeloCRUD){}else{$po = "\x24\x74\x6f\x74\x61\x6c\x3d\x24\x74\x68\x69\x73\x2d\x3e\x63\x69\x2d\x3e".$this->modeloNombre."\x2d\x3e".$this->modeloFuncion["\x74\x6f\x74\x61\x6c"]."\x28\x24\x74\x61\x62\x6c\x61\x2c\x20\x24\x74\x68\x69\x73\x2d\x3e\x67\x65\x74\x46\x69\x6c\x74\x72\x6f\x28\x29\x29\x3b";
$po .= "\x24\x74\x68\x69\x73\x2d\x3e\x67\x65\x74\x46\x69\x6c\x74\x72\x6f\x28\x24\x74\x6f\x74\x61\x6c\x29\x3b";$po .= "\x24\x74\x68\x69\x73\x2d\x3e\x63\x69\x2d\x3e".$this->modeloNombre."\x2d\x3e".$this->modeloFuncion["\x73\x65\x6c\x65\x63\x74"]."\x28\x24\x74\x61\x62\x6c\x61\x29\x3b";
}break;}if(!$this->modeloCRUD){$this->ci->load->model($this->modeloNombre,"",true); eval($po);}return $this->operacion;}}
public function setModeloCRUD($o = "", $e = array()){if($o != ""){$this->modeloNombre = $o;if(is_array($e))$this->modeloFuncion = array_merge($this->modeloFuncion, $e);
$this->modeloCRUD = false;}}public function setFiltro($o){$this->filtro = $o;}protected function getFiltro($o=0){$e = new stdClass();
$p	= $_GET["\x70\x61\x67\x65"];$eo 	= $_GET["\x72\x6f\x77\x73"];$ee 	= $_GET["\x73\x69\x64\x78"];$ep 	= $_GET["\x73\x6f\x72\x64"];
$oo 	= "";if(!$ee)$ee = 1;$oe = $o;if( $oe > 0 ) {$op = ceil($oe/$eo);} else {$op = 1;}if($p > $op)$p = $op;$po = ($eo*$p) - $eo;
if($_GET["\x5f\x73\x65\x61\x72\x63\x68"] == "\x74\x72\x75\x65"){$pe	= $_GET["\x66\x69\x6c\x74\x65\x72\x73"];$pe = json_decode($pe);
$pp	= $pe->rules;$eeo	= $pe->groupOp;$eee 	= "\x20";$eep 	= array("\x65\x71" => "\x3d", "\x6e\x65" => "\x3c>", "\x6c\x74" => "\x3c", "\x6c\x65" => "\x3c\x3d", "\x67\x74" => ">", "\x67\x65" => ">\x3d", "\x62\x77" => "\x20"."{$eee}"."\x4c\x49\x4bE\x20", "\x62\x6e" => "\x20\x4e\x4fT\x20"."{$eee}"."\x4c\x49\x4bE\x20", "\x69\x6e" => "\x20\x49\x4e\x20", "\x6e\x69" => "\x20\x4e\x4f\x54\x20\x49\x4e", "\x65\x77" => "\x20"."{$eee}"."\x4c\x49\x4bE\x20", "\x65\x6e" => "\x20\x4e\x4fT\x20"."{$eee}"."\x4c\x49\x4bE\x20", "\x63\x6e" => "\x20"."{$eee}"."\x4c\x49\x4bE\x20", "\x6e\x63" => "\x20\x4e\x4fT\x20"."{$eee}"."\x4c\x49\x4bE\x20", "\x6e\x75" => "\x49\x53\x20\x4e\x55\x4c\x4c", "\x6e\x6e" => "\x49\x53\x20\x4e\x4f\x54\x20\x4e\x55\x4c\x4c");
$oeo 	= array();foreach($pp as $oee=>$oep){$peo 	= $oep->field;$pee 	= $oep->op;$pep 	= $oep->data;if($oo != "")$oo 	.=  $eeo."\x20";
switch($pee) {
case "\x62\x77":
case "\x62\x6e":
$oo .= $peo . "\x20" . $eep[$pee] . "\x20\x27".$pep."\x25\x27\x20";break;
case "\x65\x77":
case "\x65\x6e":
$oo .= $peo . "\x20" . $eep[$pee] . "\x20\x27\x25".$pep."\x27\x20";break;
case "\x63\x6e":
case "\x6e\x63":
$oo .= $peo . "\x20" . $eep[$pee] . "\x20\x27\x25".$pep."\x25\x27\x20";break;
case "\x69\x6e":
case "\x6e\x69":
$oo .= $peo . "\x20" . $eep[$pee] . "\x20\x28\x20'".$pep."\x27\x29\x20";break;
case "\x6e\x75":
case "\x6e\x6e":
$oo .= $peo . "\x20" . $eep[$pee] . "\x20";break;
default :
$oo .= $peo . "\x20" . $eep[$pee] . "\x20\x27".$pep."\x27\x20";break;}}}if($oo != ""){if($this->filtro != "")$e->filtro = $this->filtro."\x20\x41\x4e\x44\x20\x28".$oo."\x29";
else
$e->filtro = $oo;}else{$e->filtro = $this->filtro;}$e->norden		= $ee;$e->torden		= $ep;$e->nlimite		= (int)$eo;$e->ilimite		= (int)$po;
$e->page 		= $p;$e->total 		= $op;$e->records 		= $oe;$this->j	= $e;return $e;}public function getData($o, $e = true){if($this->j->filtro != "" )
$o->where($this->j->filtro);$o->order_by($this->j->norden,$this->j->torden);$o->limit($this->j->nlimite,$this->j->ilimite);
if($e)$p = $o->get()->result();else{return $o->get();}$eo 			= new stdClass();$eo->page 	= $this->j->page;$eo->total 	= $this->j->total;
$eo->records 	= $this->j->records;$ee					= 0;$ep				= $this->campos["\x69\x64"];foreach($p as $oo=>$oe){$eo->rows[$ee]["\x69\x64"] 	= $oe->$ep;
$op							= 0;$po						= array();foreach($this->campos as $pe){$po[$op] = $oe->$pe;$op++;}$eo->rows[$ee]["\x63\x65\x6c\x6c"] = $po;
$ee++;}header("\x43\x6f\x6et\x65\x6e\x74-\x74\x79\x70\x65:\x20\x61\x70p\x6c\x69\x63a\x74\x69o\x6e\x2f\x6a\x73\x6fn");return json_encode($eo);
}}
?>
