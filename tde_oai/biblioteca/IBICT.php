<?php
//
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2002 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.02 of the PHP license,      |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Gabriel Franklin Ara�jo Mathias <gabrielmathias@ibict.br>    |
// +----------------------------------------------------------------------+
//
// $Id: IBICT.php,v 1.1 2003/09/13 07:37:25 ssb Exp $

/**
 * IBICT's TEDE_MTDBR:: interface. Defines the interface for implementing
 *
 * @access public
 * @version $Revision: 0.99 $
 * @package IBICT
 */

// {{{ Func�es Auxiliares
global $versao_protocolo;
$versao_protocolo="1.1 Beta (2006-12-12)";


function toMysqlDate($date){

		$a = explode("/",$date);
		if (!is_array($a)){
			$a = explode("-",$date);
		}
		if (count($a)<2){
			return null;
		}
		if ($a[0] > 100){
			$d = $a[0]."-".$a[1]."-".$a[2];
		} else {
			$d = $a[0]."-".$a[1]."-".$a[2];
		}
		return $d;
}

function unescape($metadata){

	for($i=0;$i<strlen($metadata);$i++){
		$char = null;
		while ($metadata[$i] != '&' && $i <strlen($metadata)) {
			$saida.= $metadata[$i];
			$i++;
		}
		while ($metadata[$i+1] != ';' && $i <strlen($metadata)) {
			$i++;
			$char.= $metadata[$i];
		}
		$i++;
		if ($char){
			$antes = $char;
			$char = str_replace(";","",$char);
			//$char = substr($char,1);
			if (ereg('#',$char)){
				$char = str_replace("#","",$char);
				if (ereg('x',$char)){
					$char = hexdec('0'.$char);
				}
				if ($char > 0x80) {
					$c = u2utf8(chr($char));
				} else if ($char < 32){
					$c = "";
				}else{
					$c = "&#".$char.";";
				}
			}else{
				if ('apos' == $char){
					$c = "'";
				}else{
					$c = "$char;";
				}
			}
			if ($char > 253){
				//echo "$antes -> ($char) virando: $c \n";
			}
			$saida.=$c;
			$char=null;
		}
	}//For
	$saida.=$char;

	return $saida;

}

// $str =~ s/([\x80-\xFF])/chr(0xC0|ord($1)>>6).chr(0x80|ord($1)&0x3F)/goe;

function u2utf8($c) {
	$str='';
		if ($c < 0x20) {
		} else if ($c < 0x80) {
			$str.=$c;
		} else if ($c < 0x800) {
			$str.=(0xC0 | $c>>6);
			$str.=(0x80 | $c & 0x3F);
		} else if ($c < 0x10000) {
			$str.=(0xE0 | $c>>12);
			$str.=(0x80 | $c>>6 & 0x3F);
			$str.=(0x80 | $c & 0x3F);
		} else if ($c < 0x200000) {
			$str.=(0xF0 | $c>>18);
			$str.=(0x80 | $c>>12 & 0x3F);
			$str.=(0x80 | $c>>6 & 0x3F);
			$str.=(0x80 | $c & 0x3F);
		}
	for($i=0;$i<strlen($str);$i++){
		$out.="&#".ord($str[$i]).";";
	}
	return $out;
}

function utf82($c){
	if ($c < 0x20) {
		$str ='';
	} else if ($c < 0x80) {
		$str.=$c;
	} else if ($c < 0x800) {
		$str.=(0xC0 | $c>>6);
		$str.=utf82(0x80 | $c & 0x3F);
	}
	return $str;
}

function hex2utf8($num){
  $num = hexdec($num);
  if($num<128)return chr($num);
  if($num<1024)return chr(($num>>6)+192).chr(($num&63)+128);
  if($num<32768)return chr(($num>>12)+224).chr((($num>>6)&63)+128).chr(($num&63)+128);
  if($num<2097152)return chr($num>>18+240).chr((($num>>12)&63)+128).chr(($num>>6)&63+128). chr($num&63+128);
  return '';
}


// inativa
function fix_utf8($str){ 
        $trans=array();
        for ($i = 0x80;$i<=0x9F;$i++){  // Retirando faixa de caracteres inadmiss�is em UTF-8
                $trans [chr(194).chr($i)] = hex2utf8("002D");
        }
        $trans["&#x2013;"] = "-";

        return strtr($str, $trans);
}

function trata($metadata,$is_amiguinho = false){
        if ($is_amiguinho){
                $metadata=str_replace(' xmlns="http://www.ibict.br/schema/"',"",$metadata);
                $metadata=str_replace(' schemaLocation="http://www.ibict.br/schema/ http://www.ibict.br/schema/mtd-br(v1.0).
xsd"',"",$metadata);
        }

        $metadata=str_replace('&','&amp;',$metadata);           //
        $metadata=str_replace('<','&lt;',$metadata);           //
        $metadata=str_replace('>','&gt;',$metadata);           //
        $metadata=str_replace('&amp;amp;','&amp;',$metadata);           //

        return $metadata;
}

function trata2($metadata,$is_amiguinho = false){

	if ($is_amiguinho){
		$metadata=str_replace(' xmlns="http://www.ibict.br/schema/"',"",$metadata);
		$metadata=str_replace(' schemaLocation="http://www.ibict.br/schema/ http://www.ibict.br/schema/mtd-br(v1.0).xsd"',"",$metadata);
	}
	$metadata=str_replace("'","",$metadata);
	$metadata=str_replace("&atilde;","�",$metadata);
	$metadata=str_replace("&otilde;","�",$metadata);
	$metadata=str_replace("&ccedil;","�",$metadata);
	$metadata=str_replace("&Ccedil;","�",$metadata);
	$metadata=str_replace("&aacute;","�",$metadata);
	$metadata=str_replace("&eacute;","�",$metadata);
	$metadata=str_replace("&iacute;","�",$metadata);
	$metadata=str_replace("&oacute;","�",$metadata);
	$metadata=str_replace("&uacute;","�",$metadata);
	$metadata=str_replace("&Aacute;","�",$metadata);
	$metadata=str_replace("&Eacute;","�",$metadata);
	$metadata=str_replace("&Iacute;","�",$metadata);
	$metadata=str_replace("&Oacute;","�",$metadata);

	$metadata=str_replace("&igrave;","�",$metadata);
	$metadata=str_replace("&ograve;","�",$metadata);
	$metadata=str_replace("&ugrave;","�",$metadata);
	$metadata=str_replace("&Agrave;","�",$metadata);
	$metadata=str_replace("&Egrave;","�",$metadata);
	$metadata=str_replace("&Igrave;","�",$metadata);
	$metadata=str_replace("&Ograve;","�",$metadata);
	$metadata=str_replace("&Ugrave;","�",$metadata);
	$metadata=str_replace("&acirc;","�",$metadata);
	$metadata=str_replace("&ecirc;","�",$metadata);
	$metadata=str_replace("&ocirc;","�",$metadata);
	$metadata=str_replace("&uuml;","�",$metadata);
	$metadata=str_replace("&Acirc;","�",$metadata);
	$metadata=str_replace("&Ecirc;","�",$metadata);
	$metadata=str_replace("&Ocirc;","�",$metadata);
	$metadata=str_replace("&Uuml;","�",$metadata);
	$metadata=str_replace("�","",$metadata);
	$metadata=str_replace("�","",$metadata);
	$metadata=str_replace('&#130;','',$metadata);
	$metadata=str_replace('&#133;','',$metadata);
	$metadata=str_replace('&#136;','',$metadata);
	$metadata=str_replace('&#195;&#137;','�',$metadata);
	$metadata=str_replace('&#145;','',$metadata);
	$metadata=str_replace('&#146;',chr(0x27),$metadata);
	$metadata=str_replace('&#147;','"',$metadata);
	$metadata=str_replace('&#148;','"',$metadata);
	$metadata=str_replace('&#149;','"',$metadata);
	$metadata=str_replace('&#150;','',$metadata);
	$metadata=str_replace('&#151;','',$metadata);
	$metadata=str_replace('&#152;','',$metadata);
	$metadata=str_replace('&#153;','',$metadata);
	$metadata=str_replace('&#156;','',$metadata);
	$metadata=str_replace('&amp;apos;','&apos;',$metadata);
	$metadata=str_replace('&apos;','\'',$metadata);

	$metadata=str_replace(chr(0x92),'\'',$metadata);
	$metadata=str_replace(chr(0x93),'\'',$metadata);
	$metadata=str_replace(chr(0x94),'"',$metadata);
	$metadata=str_replace(chr(0x95),'"',$metadata);
	$metadata=str_replace(chr(0x96),'-',$metadata);
	return $metadata;
}

// }}}

// {{{ class TAG

class TAG 
{
	/**
	* Provides an interface for generating TEDE_MTDBR:: objects 
	*
	* @return object TEDE_MTDBR
 	*/

	function toDateTime($date){
		return str_replace(' ', 'T', $date).'Z';
	}

	function tag($tag,$value,$atributos=null,$unescaped = false){
		$tab='';
		for($k=1;$k<$this->tabs;$k++) $tab.="   ";
		$tab=null;
		if (is_array($atributos)){
			while(list($at,$val) = each($atributos)){
				if ($val!=null && $val!=""){
					$atts.= " $at=\"$val\" " ;
				}
			}
		}
		if ($unescaped){
			return "<$tag$atts>".$value."</$tag>\n";
		} else {
			return "<$tag$atts>".unescape($value)."</$tag>\n";
		}
	}

	function tag_facultativo($tag,$value,$att=null){
		if (strlen($value)>0){
			return $this->tag($tag,$value,$att);
		}
		return null;
	}

	function tag_obrigatorio($tag,$value,$att=null){
		if (!$value){
			$this->status = false;
			return null;
		}
		return $this->tag($tag,$value,$att);
	}

}
// }}}

// ---------------------------------------------------
//  iso2709_record : classe PHP pour la manipulation
//  d'enregistrements au format ISO2709
//	(c) Fran�ois Lemarchand 2002
//	public release 0.0.6
//  Cette biblioth�que est distribu�e sous la Licence 2 GNU GPL       
//
//  Cette biblioth�que est distribu�e car potentiellement utile mais  
//  SANS AUCUNE GARANTIE, ni explicite, ni implicite, y compris les   
//  garanties de commercialisation ou d'adaptation dans un but        
//  sp�cifique. Reportez vous � la Licence Publique G�n�rale GNU pour 
//  plus de d�tails.                                                  
// 
// 
// 
//  Tous les fichiers sont sous ce copyright sans exception.
//  Voir le fichier GPL.txt
// 
// ---------------------------------------------------

// on s'assure que la classe n'est pas d�finie afin
// d'�viter les inclusions multiples

if ( ! defined( 'ISO2709' ) ) {
  define( 'ISO2709', 1 );

define('AUTO_UPDATE', 1);
define('USER_UPDATE', 0);

class iso2709_record {
// ---------------------------------------------------
//		d�claration des propri�t�s
// ---------------------------------------------------
	// enregistrement UNIMARC complet

	var $full_record;

	// parties de l'enregistrement UNIMARC

	var $guide = '';
	var $directory = '';
	var $data = '';

	// propri�t�s 'publiques'

	var $errors;

	var $auto_update; // mode de mise � jour;

	// variables 'internes' de la classe
	var $inner_guide;
	var $inner_directory;
	var $inner_data;

	// caract�res sp�ciaux
	var $record_end;
	var $rgx_record_end;
	var $field_end;
	var $rgx_field_end;
	var $subfield_begin;
	var $rgx_subfield_begin;
	var $NSB_begin;
	var $rgx_NSB_begin;
	var $NSB_end;
	var $rgx_NSB_end;

// ---------------------------------------------------
//		d�claration des m�thodes
// ---------------------------------------------------


// ---------------------------------------------------
// constructeur : r�cup�ration de l'enregistrement
// ---------------------------------------------------
	function iso2709_record($string='', $update=AUTO_UPDATE) {

		// initialisation des caract�res sp�ciaux

		$this->record_end = chr(0x1d);		// fin de notice (IS3 de l'ISO 6630)
		$this->rgx_record_end = "\x1D";
		$this->field_end = chr(0x1e);	// fin de champ (IS2 de l'ISO 6630)
		$this->rgx_field_end ="\x1E";
		$this->subfield_begin = chr(0x1f);	// d�but de sous-champ (IS1 de l'ISO 6630)
		$this->rgx_subfield_begin = "\x1F";
		$this->NSB_begin = chr(0x88);		// d�but de NSB
		$this->rgx_NSB_begin = "\x88";
		$this->NSB_end = chr(0x89);			// fin de NSB (NSE)
		$this->rgx_NSB_end = "\x89";

		// initialisation du mode d'update
		$this->auto_update = $update;

		# TRUE : l'update est g�r� par la classe
		# FALSE : c'est au script appelant de g�rer l'update;

		// initialisation du tableau des erreurs

		$this->errors = array();

		// initialisation de la classe

		// r�cup�ration de l'enregistrement int�gral 

		$this->full_record = $string;

		// mise � jour des variables internes

		// guide de l'enregistrement

		$this->guide = substr($this->full_record, 0, 24);

		// guide interne : valeurs par d�faut si cr�ation

		$rl = intval(substr($this->guide, 0 , 5));	# p=4 record length : pos.1-4
		$rs = substr($this->guide, 5, 1);			# p=5 record status : pos.5
		$dt = substr($this->guide, 6, 1);			# p=6 document type : pos.6	
		$bl = substr($this->guide, 7, 1);			# p=7 bibliographic level : pos.7
		$hl = intval(substr($this->guide, 8, 1));	# p=8 hierarchical level : pos.8
		$pos9 = substr($this->guide, 9, 1);			# p=9 pos.9 undefined, contains a blank
		$il = intval(substr($this->guide, 10, 1));	# p=10 indicator length : pos.10 (2)
		$sl = intval(substr($this->guide, 11, 1));	# p=11 subfield identifier length : pos.11 (2)	
		$ba = intval(substr($this->guide, 12, 5));	# p=16 base adress : pos.12-16	
		$el = substr($this->guide, 17, 1);			# p=17 encoding level : pos.17
		$ru = substr($this->guide, 18, 1);			# p=18 record update : pos.18
		$pos19 = substr($this->guide, 19, 1);		# p=19 pos.19 : undefined, contains a blank
		$dm1 = intval(substr($this->guide, 20, 1));	# p=20 Length of 'Length of field' (pos.20, 4 in UNIMARC) 
		$dm2 = intval(substr($this->guide, 21, 1));	# p=21 Length of 'Starting character position' (pos.21, 5 in UNIMARC)
		$dm3 = intval(substr($this->guide, 22, 1));	# p=22 Length of implementationdefined portion (pos.22, 0 in UNIMARC)
		$pos23 = substr($this->guide, 23, 1);		# P=23 : undefined, contains a blank

		$this->inner_guide = array(
			'rl' =>  $rl ? $rl : 0,
			'rs' =>  $rs ? $rs : 'n',
			'dt' => $dt ? $dt : 'a',
			'bl' => $bl ? $bl : 'm',
			'hl' => $hl ? $hl : 0,
			'pos9' => $pos9 ? $pos9 : ' ',
			'il' => $il ? $il : 2,
			'sl' => $sl ? $sl : 2,
			'ba' => $ba ? $ba : 24, 
			'el' => $el ? $el : '1',
			'ru' => $ru ? $ru : 'i',
			'pos19' => $pos19 ? $pos19 : ' ',
			'dm1' => $dm1 ? $dm1 : 4,
			'dm2' => $dm2 ? $dm2 : 5,
			'dm3' =>  $dm3 ? $dm3 : 0,
			'pos23' => $pos23 ? $pos23 : ' '
		);

	// r�cup�ration du r�pertoire

	$m = 3 + $this->inner_guide[dm1] + $this->inner_guide[dm2];

	$this->directory = substr(	$this->full_record, 
								24, 
								$this->inner_guide[ba] - 25);

	$tmp_dir = explode('|', chunk_split($this->directory, $m, '|'));
	for($i = 0; $i < count($tmp_dir); $i++) {
		if($tmp_dir[$i]) {
			$this->inner_directory[$i] = array(
			'label' => substr($tmp_dir[$i], 0, 3),
			'length' => intval(	substr($tmp_dir[$i],
								3,
								$this->inner_guide[dm1])),
			'adress' => intval(	substr($tmp_dir[$i],
									3 + $this->inner_guide[dm1],
									$this->inner_guide[dm2]))
			);
		}
	}

	// r�cup�ration des champs

	$m = substr(	$this->full_record,
					$this->inner_guide[ba],
					strlen($this->full_record) - $this->inner_guide[ba]
				);
	if($m) {
		while(list($cle, $valeur)=each($this->inner_directory)) {
			$this->inner_data[$cle] = array(
										'label' => $this->inner_directory[$cle][label],
										'content' => substr(	$this->full_record, 
												$this->inner_guide[ba] + $valeur[adress], 
												$valeur[length]
											)
										);
		}
	} else {
		$this->inner_data = array();
		$this->inner_directory = array();
	}

	}

// ---------------------------------------------------
// 		r�cup�ration d'un ou plusieurs sous-champ(s)
// ---------------------------------------------------

// ## cette fonction retourne un array ##

// ---------------------------------------------------
// 		r�cup�ration d'un ou plusieurs sous-champ(s)
// ---------------------------------------------------

// ## cette fonction retourne un array ##

	function get_subfield() {

		$result = array();

		// v�rification des param�tres
		if(!func_num_args()) {
			return $result;
		}

		for($i = 0; $i < sizeof($this->inner_data); $i++) {
			if(preg_match('/'.func_get_arg(0).'/', $this->inner_data[$i][label])) {
				switch(func_num_args()) {
					case 1:		// pas d'indication de sous-champ : on retourne le contenu entier
						$result[] = preg_replace("/$this->rgx_field_end/",
													'',
													$this->inner_data[$i][content]);
						break;
					case 2 :	// un seul sous-champ demand�
						// r�cup�ration de la valeur du champ
						$field = $this->inner_data[$i][content];

						// le masque de recherche : subfield_begin cars. subfield_begin ou field_end

						$mask = $this->rgx_subfield_begin.func_get_arg(1);
						$mask .= '(.*)['.$this->rgx_subfield_begin.'|'.$this->rgx_field_end.']';

						while (preg_match("/$mask/sU", $field)) {
							preg_match("/$mask/sU", $field, $regs);
							$result[] = $this->ISO_decode($regs[1]);
							$field = preg_replace("/$mask/sU", '', $field);
						}
						break;
					default:	// un ou plusieurs sous-champs
						// r�cup�ration de la valeur du champ
						$field = $this->inner_data[$i][content];
				
						for($j = 1; $j < func_num_args(); $j++) {
							$subfield = func_get_arg($j);
							$mask = $this->rgx_subfield_begin.$subfield;
							$mask .= '(.*)['.$this->rgx_subfield_begin.'|'.$this->rgx_field_end.']';

							preg_match("/$mask/sU", $field, $regs);
							$tmp[$subfield] = $this->ISO_decode($regs[1]); 
						}
						$result[] = $tmp;
						break;
				}
			}
		}
		return $result;
	}

// ---------------------------------------------------
// 		ajout d'un champ
// ---------------------------------------------------

	function add_field($label='000', $ind='') {

		// v�rification des param�tres : au moins 2

		if(func_num_args() < 3) {
			$this->errors[] = '[add_field] impossible d\'ajouter un champ vide';
			return FALSE;
		}

		if($label < 1) {
			$this->errors[] = '[add_field] le label \''.$label. '\' n\'est pas valide';
			return FALSE;
		}

		// test des indicateurs
		if(strlen($ind) != 0 && strlen($ind) != $this->inner_guide[il]) {
			$this->errors[] = '[add_field] l\'indicateur \''.$ind. '\' n\'est pas valide';
			return FALSE;
		}

		// mise en form du label
		if(strlen($label) < 3 && $label < 100)
			$label = sprintf('%03d', $label);

		// notre champ doit commencer par un label

		if (!preg_match('/^[0-9]{3}$/', $label)) {
			$this->last_error = '[add_field] le label \''.$label. '\' n\'est pas valide';
			return FALSE;
		}

		$nb_args = func_num_args();

		// suivant le cas, ajout des infos
		switch($nb_args) {
			case 3: // il n'y a qu'un seul param en plus du label et des indicateurs
				if(!is_array(func_get_arg(2))) {
					$content = @func_get_arg(2);
				} else {
					// le param est un tableau
					$field = func_get_arg(2);
					while(list($k,$v) = each($field)){
						list($k,$v) = each($v);
						if(preg_match('/^[a-z0-9]$/', $k) && $v) {
							$content .= $this->subfield_begin.$k.$v;
						}
					}
				}
				break;
			default: // plus d'un champ
				// on s'assure que le nombre de param est pair
				if(floor($nb_args/2) < $nb_args/2)
					$nb_args = $nb_args - 1;
				// r�cup�rer les paires champ/valeur
				$i = 2;
				while( $i < $nb_args - 1) {
					$field = func_get_arg($i);
					$fieldbis = func_get_arg($i + 1);
					if(preg_match('/^[a-z0-9]$/', $field))
						$content .= $this->subfield_begin.$field.$fieldbis;
					else
						$this->errors[] = '[add_field] �tiquette de sous-champ non valide';
					$i = $i + 2;
				}
				break;
		}



		if(sizeof($content)) {
			$content = $this->ISO_encode($content).$this->field_end; 

			// ajout des �ventuels indicateurs

			if(strlen($ind) == $this->inner_guide[il])
				$content = $ind.$content;

			// mise � jour des inner_data
			$index = sizeof($this->inner_data);
			$this->inner_data[$index][label] = $label;
			$this->inner_data[$index][content] = $content;		

			// tri des inner_data

			sort($this->inner_data);
		}

		if($this->auto_update) $this->update();

		return TRUE;
	}

// ---------------------------------------------------
// 		suppression d'un champ
// ---------------------------------------------------

	function delete_field($label, $index=-1) {

		if(!func_num_args()) {
			$this->errors[] = '[delete_field] pas de label pour le champ';
			return FALSE;
		}

		if(!$label) {
			$this->errors[] = '[delete_field] le label \''.$label. '\' n\'est pas valide';
			return FALSE;
		}

		// mise en form du label
		if(strlen($label) < 3 && $label < 100)
			$label = sprintf('%03d', $label);

		// v�rification du format du label

		if (!preg_match('/^[0-9\.]{3}$/', $label)) {
			$this->last_error = '[delete_field] le label \''.$label. '\' n\'est pas valide';
			return FALSE;
		}

		for($i=0; $i < sizeof($this->inner_data); $i++) {
			if(preg_match('/'.$label.'/', $this->inner_data[$i][label])) {
				$this->inner_data[$i][label] ='';		
				$this->inner_data[$i][content] ='';
			}	
		}		


		if($this->auto_update) $this->update();		
			return TRUE;
	}

// ---------------------------------------------------
// 		update de l'enregistrement
// ---------------------------------------------------

	function update() {

		// supprime les lignes vides d'inner_data

		for($i=0; $i < sizeof($this->inner_data); $i++) 
			if(empty($this->inner_data[$i][label]) || empty($this->inner_data[$i][content])) {
				array_splice($this->inner_data, $i, 1);
				$i--; 
			}

		// reconstitution inner_directory

		$this->inner_directory = array();
		for($i = 0; $i < sizeof($this->inner_data); $i++){
			$this->inner_directory[$i] = array(
				'label' => $this->inner_data[$i][label],
				'length' => strlen($this->inner_data[$i][content]),
				'adress' => 0
			);
		} 

		// mise � jour des offset et du r�pertoire 'r�el'

		for($i = 1; $i < sizeof($this->inner_data); $i++){
			$this->inner_directory[$i][adress] = 
				$this->inner_directory[$i - 1][length]
				+ $this->inner_directory[$i - 1][adress];
		}

		// mise � jour du r�pertoire

		$this->directory = ''; 
		for($i=0; $i < sizeof($this->inner_directory) ; $i++) {
			$this->directory .= sprintf('%03d', $this->inner_directory[$i][label]);
			$this->directory .= sprintf('%0'.$this->inner_guide[dm1].'d', $this->inner_directory[$i][length]);
			$this->directory .= sprintf('%0'.$this->inner_guide[dm2].'d', $this->inner_directory[$i][adress]);
		} 

		// mise � jour du contenu

		$this->data = '';
		for($i=0; $i < sizeof($this->inner_data) ; $i++) {
			$this->data .= $this->inner_data[$i][content];
		}
		$this->data .= $this->record_end;

		// mise � jour du guide
		## adresse de base.
		$this->inner_guide[ba] = 24 + strlen($this->directory) + 1;
		## longueur de l'enregistrement iso2709
		$this->inner_guide[rl] = 24 + strlen($this->directory) + strlen($this->data);


		$this->guide = sprintf('%05d', $this->inner_guide[rl]);
		$this->guide .= $this->inner_guide[rs];
		$this->guide .= $this->inner_guide[dt];
		$this->guide .= $this->inner_guide[bl];
		//$this->guide .= $this->inner_guide[hl];
		$this->guide .= $this->inner_guide[pos23]; //
		$this->guide .= $this->inner_guide[pos9];
		$this->guide .= $this->inner_guide[il];
		$this->guide .= $this->inner_guide[sl];
		$this->guide .= sprintf('%05d', $this->inner_guide[ba]);
		$this->guide .= $this->inner_guide[el];
		$this->guide .= $this->inner_guide[ru];
		$this->guide .= $this->inner_guide[pos19];
		$this->guide .= $this->inner_guide[dm1];
		$this->guide .= $this->inner_guide[dm2];
		$this->guide .= $this->inner_guide[dm3];
		//$this->guide .= $this->inner_guide[pos23];
		$this->guide .= $this->inner_guide[hl]; //

		// constitution du nouvel enregistrement

		$this->data = $this->field_end.$this->data; // AQUI
		$this->full_record = $this->guide.$this->directory.$this->data;

	}

	function get_fullrecord(){
		return $this->full_record;
	}

// ---------------------------------------------------
// 		affichage d'un rapport des erreurs
// ---------------------------------------------------

	function show_errors() {
		if(sizeof($this->errors)) {
			print '<table border=\'1\'>';
			print '<tr><th colspan=\'2\'>iso2709_record : erreurs</th></tr>';
			for($i=0; $i < sizeof($this->errors); $i++) {
				print '<tr><td>';
				print $i+1;
				print '</td><td>'.$this->errors[$i].'</td></tr>';
			}
			print '</table>';
		} else {
			print 'aucune erreur<br>';
		}
	}

// ---------------------------------------------------
// 		fonction de validation d'un enregistrement
// ---------------------------------------------------

	function valid() {

		// $this->errors = array(); // init du tableau des erreurs

		// test de la longueur de l'enregistrement

		if ( 	strlen($this->full_record) != $this->inner_guide['rl']
			|| 	substr($this->full_record, -1, 1) != $this->record_end)
			$this->errors[] = '[format] la longueur de l\'enregistrement ne correspond pas au guide';

		// test des fin de champs
		// on retourne false si un champ ne finit pas par l'IS3

		while(list($cle, $valeur) = each($this->inner_data)) {
			if(!preg_match("/$this->rgx_field_end$/", $valeur[content]))
				$this->errors[] = '[format] le champ '.$cle.' ne finit pas par le caract�re de fin de champ';
		}

		// les tableaux internes sont vides
		if(!sizeof($this->inner_data) || !sizeof($this->inner_data))
			$this->errors[] = '[internal] cet enregistrement est vide';

		// les inner_data et le inner_directory ne sont pas synchronis�s

		if(sizeof($this->inner_data) != sizeof($this->inner_directory))
			$this->errors[] = '[internal] les tableaux internes ne sont pas synchronis�s';

		if(sizeof($this->errors))
			return FALSE;

		return TRUE;

	}

// ---------------------------------------------------
//		fonctions de mise � jour du guide
// ---------------------------------------------------

	function set_rs($status) {
		if($status) {
			$this->inner_guide[rs] = $status[0];
			if($this->auto_update) $this->update();
		}			
	}

	function set_dt($dtype) {
		if($dtype){
			$this->inner_guide[dt] = $dtype[0];
			if($this->auto_update) $this->update();
		}			
	}

	function set_bl($bltype) {
		if($bltype){
			$this->inner_guide[bl] = $dtype[0];
			if($this->auto_update) $this->update();
		}			
	}

	function set_hl($hltype) {
		if($hltype){
			$this->inner_guide[hl] = $hltype[0];
			if($this->auto_update) $this->update();
		}			
	}

	function set_el($eltype) {
		if($eltype){
			$this->inner_guide[el] = $eltype[0];
			if($this->auto_update) $this->update();
		}			
	}

	function set_ru($rutype) {
		if($rutype){
			$this->inner_guide[ru] = $rutype[0];
			if($this->auto_update) $this->update();
		}			
	}


// ---------------------------------------------------
//		fonctions de conversion ISO (caract�res)
// ---------------------------------------------------

# ISO_decode converti de l'ISO 5426

	function ISO_decode($chaine)
	{

		if(!preg_match("/[\xC1-\xFF]./misU", $chaine))
			return $chaine;
		else {
			for($i = 0 ; $i < strlen($chaine) ; $i++) {
				if(ord($chaine[$i]) >= 0xC1) {
					$result .=  $this->isodecode(ord($chaine[$i]), ord($chaine[$i+1]));
					$i++;
				}
				else
					$result .= $chaine[$i];
			}
		}
	return $result;
	}

	function ISO_encode($chaine) {
		if(!$chaine)
			return $chaine;

		$char_table['�'] = chr(0xc1).chr(0x41);
		$char_table['�'] = chr(0xc2).chr(0x41);
		$char_table['�'] = chr(0xc3).chr(0x41);
		$char_table['�'] = chr(0xc4).chr(0x41);
		$char_table['�'] = chr(0xc9).chr(0x41);
		$char_table['�'] = chr(0xca).chr(0x41);
		$char_table['�'] = chr(0xca).chr(0x41);
		$char_table['�'] = chr(0xd0).chr(0x43); 

		$char_table['�'] = chr(0xc1).chr(0x45);
		$char_table['�'] = chr(0xc2).chr(0x45);
		$char_table['�'] = chr(0xc3).chr(0x45);
		$char_table['�'] = chr(0xc8).chr(0x45);
		$char_table['�'] = chr(0xc1).chr(0x49);
		$char_table['�'] = chr(0xc2).chr(0x49);
		$char_table['�'] = chr(0xc3).chr(0x49);
		$char_table['�'] = chr(0xc8).chr(0x49);
		$char_table['�'] = chr(0xc4).chr(0x4e);
		$char_table['�'] = chr(0xc1).chr(0x4f);
		$char_table['�'] = chr(0xc2).chr(0x4f);
		$char_table['�'] = chr(0xc3).chr(0x4f);
		$char_table['�'] = chr(0xc4).chr(0x4f);
		$char_table['�'] = chr(0xc9).chr(0x4f);
		$char_table['�'] = chr(0xc1).chr(0x55);
		$char_table['�'] = chr(0xc2).chr(0x55);
		$char_table['�'] = chr(0xc3).chr(0x55);
		$char_table['�'] = chr(0xc2).chr(0x59);
		$char_table['�'] = chr(0xc1).chr(0x61);
		$char_table['�'] = chr(0xc2).chr(0x61);
		$char_table['�'] = chr(0xc3).chr(0x61);
		$char_table['�'] = chr(0xc4).chr(0x61);
		$char_table['�'] = chr(0xc9).chr(0x61);
		$char_table['�'] = chr(0xca).chr(0x61);
		$char_table['�'] = chr(0xd0).chr(0x63);
		$char_table['�'] = chr(0xc1).chr(0x65);
		$char_table['�'] = chr(0xc2).chr(0x65);
		$char_table['�'] = chr(0xc3).chr(0x65);
		$char_table['�'] = chr(0xc8).chr(0x65);
		$char_table['�'] = chr(0xc4).chr(0x6e);
		$char_table['�'] = chr(0xc1).chr(0x69);
		$char_table['�'] = chr(0xc2).chr(0x69);
		$char_table['�'] = chr(0xc3).chr(0x69);
		$char_table['�'] = chr(0xc8).chr(0x69);
		$char_table['�'] = chr(0xc1).chr(0x6f);
		$char_table['�'] = chr(0xc2).chr(0x6f);
		$char_table['�'] = chr(0xc3).chr(0x6f);
		$char_table['�'] = chr(0xc4).chr(0x6f);
		$char_table['�'] = chr(0xc9).chr(0x6f);
		$char_table['�'] = chr(0xc1).chr(0x75);
		$char_table['�'] = chr(0xc2).chr(0x75);
		$char_table['�'] = chr(0xc3).chr(0x75);
		$char_table['�'] = chr(0xc9).chr(0x75);
		$char_table['�'] = chr(0xc2).chr(0x79);
		$char_table['�'] = chr(0xc8).chr(0x79);
		$char_table['�'] = chr(0xe1);
//		$char_table['�'] = chr(0xe2); # me demandez pas pourquoi j'ai comment� �a. c'est comme �a, c'est tout.
		$char_table['�'] = chr(0xe9);
		$char_table['�'] = chr(0xec);
		$char_table['�'] = chr(0xf1);
		$char_table['�'] = chr(0xf3);
		$char_table['�'] = chr(0xf9);
		$char_table['�'] = chr(0xfb);

 		while(list($char, $value) = each($char_table))
			$chaine = preg_replace("/$char/", $value, $chaine);

		return $chaine;

	}

	function isodecode($char1, $char2)
	{

		switch($char1) {
			case 0xc1:
				switch($char2) {
					case 0x41: $result = '�'; break ;
					case 0x45: $result = '�'; break ;
					case 0x49: $result = '�'; break ;
					case 0x4f: $result = '�'; break ;
					case 0x55: $result = '�'; break ;
					case 0x61: $result = '�'; break ;
					case 0x65: $result = '�'; break ;
					case 0x69: $result = '�'; break ;
					case 0x6f: $result = '�'; break ;
					case 0x75: $result = '�'; break ;
					default: $result = '?'; break;
				}
			break;
			case 0xc2:
				switch($char2) {
					case 0x41: $result = '�'; break ;
					case 0x45: $result = '�'; break ;
					case 0x49: $result = '�'; break ;
					case 0x4f: $result = '�'; break ;
					case 0x55: $result = '�'; break ;
					case 0x59: $result = '�'; break ;
					case 0x61: $result = '�'; break ;
					case 0x65: $result = '�'; break ;
					case 0x69: $result = '�'; break ;
					case 0x6f: $result = '�'; break ;
					case 0x75: $result = '�'; break ;
					case 0x79: $result = '�'; break ;
					default: $result = '?'; break;
				}
			break;
			case 0xc3:
				switch($char2) {
					case 0x41: $result = '�'; break ;
					case 0x45: $result = '�'; break ;
					case 0x49: $result = '�'; break ;
					case 0x4f: $result = '�'; break ;
					case 0x55: $result = '�'; break ;
					case 0x61: $result = '�'; break ;
					case 0x65: $result = '�'; break ;
					case 0x69: $result = '�'; break ;
					case 0x6f: $result = '�'; break ;
					case 0x75: $result = '�'; break ;
					default: $result = '?'; break;
				}
			break;
			case 0xc4:
				switch($char2) {
					case 0x41: $result = '�'; break ;
					case 0x4e: $result = '�'; break ;
					case 0x4f: $result = '�'; break ;
					case 0x61: $result = '�'; break ;
					case 0x6e: $result = '�'; break ;
					case 0x6f: $result = '�'; break ;
					default: $result = '?'; break;
				}
			break;
			case 0xc8:
				switch($char2) {
					case 0x45: $result = '�'; break ;
					case 0x49: $result = '�'; break ;
					case 0x65: $result = '�'; break ;
					case 0x69: $result = '�'; break ;
					case 0x79: $result = '�'; break ;
					default: $result = '?'; break;
				}
			break;
			case 0xc9:
				switch($char2) {
					case 0x41: $result = '�'; break ;
					case 0x4f: $result = '�'; break ;
					case 0x55: $result = '�'; break ;
					case 0x61: $result = '�'; break ;
					case 0x6f: $result = '�'; break ;
					case 0x75: $result = '�'; break ;
					default: $result = '?'; break;
				}
			break;
			case 0xca:
				switch($char2) {
					case 0x41: $result = '�'; break ;
					case 0x61: $result = '�'; break ;
					default: $result = '?'; break;
				}
			break;
			case 0xd0:
				switch($char2) {
					case 0x43: $result = '�'; break ;
					case 0x63: $result = '�'; break ;
					default: $result = '?'; break;
				}
			break;

		// char sur un caract�re

		case 0xe1: $result = '�'; break ;
		case 0xe2: $result = '�'; break ;
		case 0xe9: $result = '�'; break ;
		case 0xec: $result = '�'; break ;
		case 0xf1: $result = '�'; break ;
		case 0xf3: $result = '�'; break ;
		case 0xf9: $result = '�'; break ;
		case 0xfb: $result = '�'; break ;
		default: $result = chr($char1).chr($char2); break;

		}

		return $result;
	}
}


} # fin d�claration

function defcon($i,$b,$c){
	echo ("<pre>DEFCON $i \n");
	echo ($b." ".$c." \n");
	die();
}


/**
 * IBICT's TEDE_MTDBR:: interface. Defines the interface for implementing
 *
 * @access public
 * @version $Revision: 1.0 $
 * @package IBICT
 */

// {{{ Class TEDE_MTDBR extends TAG

class TEDE_MTDBR extends TAG
{
	/**
	* Provides an interface for generating TEDE_MTDBR:: objects 
	*
	* @return object TEDE_MTDBR
 	*/
	var $_version = null ;
	var $_reg		= null ;
	var $_id		= null;
	var $_erro	= array();
	var $status = true;
	var $_DB	= null;
	var $bbURL	= null;


	function TEDE_MTDBR()
	{
		$this->_reg = null;
		$this->_version = null;
	}

	function setversion($version = "1.0")
	{
		$this->_version = $version;
	}

	function tag_PessoaJuridica($row)
	{
		$cnpj = str_replace("-","",$row['CNPJ']);
		$cnpj = str_replace("_","",$cnpj);
		$cnpj = str_replace(".","",$cnpj);
		$cnpj = str_replace('/',"",$cnpj);
		$cnpj = str_replace('\\',"",$cnpj);
		if ($this->_version != '1.0'){
			if (strlen($cnpf) != 14){
//				$this->erro("CNPF com tamanho diferente de 14!");
				$cnpj = "12345678901234";
			}
		}
		$r.=$this->tag_obrigatorio('Nome',trata($row['Nome']));
		$r.=$this->tag_facultativo('Sigla',trata($row['Sigla']));
		$r.=$this->tag_facultativo('Pais',$row['Pais']);
		$r.=$this->tag_facultativo('UF',$row['UF']);
		$r.=$this->tag_facultativo('CNPJ',$cnpj);
		$r.=$this->tag_facultativo('URL',$row['URL']);
		return $r;
	}
	

	function erro($msg = null)
	{
		if ($msg){
			array_push($this->_erro,$msg.'');
		}
		return $this->_erro;
	}

	function checkIdioma($id)
	{
		if (($this->_version == '1.0') &&  (strlen($id)!=3)){
//				$this->erro('Idioma utilizado fora do padr�o de 3 letras '.$id);
		} else if (strlen($id)!=2){
				$this->erro('Idioma utilizado fora do padr�o de 2 letras '.$id );
		}
		return $id;
	}

	function getControle($row)
	{
		$r='';
		if (is_array($row)){
			$r.=$this->tag_obrigatorio('Sigla',$this->_sigla);
			$r.=$this->tag_obrigatorio('DataAtualizacao',$this->toDateTime($row['datestamp']));
			$r.=$this->tag_obrigatorio('IdentificacaoDocumento',$row['tsIdentificador']);
			$r.=$this->getControleTipo($row['tsIdentificador']);
			$r =  $this->tag_obrigatorio('Controle',$r);
			return $r;
		}
		$this->erro("Controle obrigat�rio faltando");
		return null;
	}
	
	function getControleTipo($id)
	{
		return $this->tag_obrigatorio('Tipo',"Tese ou Disserta".chr(231).chr(227)."o Eletr".chr(244)."nica");
	}

	function getBibliotecaDigital($id)
	{
		$query = @mysql_query("
			SELECT 	bbNome,bbSigla,bbURL, inCod
			FROM BibliotecaDigital 
			LIMIT 0,1");
		$r=null;
		if ($row = @mysql_fetch_array($query)){
			$r.=$this->tag_obrigatorio('Nome',$row['bbNome']);
			$r.=$this->tag_obrigatorio('Sigla',$row['bbSigla']);
			$r.=$this->tag_obrigatorio('URL',$row['bbURL']);
			$this->bbURL = $row['bbURL'];
			if ($this->_version == "1.1"){
				$r.=$this->getBibliotecaDigitalArquivo($id);
			} else {
				$r.=$this->getBibliotecaDigitalURLDocumento($id);
			}
			$r.=$this->getBibliotecaDigitalProvedorServico($row['inCod']);
			return $this->tag_facultativo('BibliotecaDigital',$r);
		} else {
			return null;
		}
	}

	function getBibliotecaDigitalURLDocumento($id)
	{
    $r=null;
    $query = @mysql_query("SELECT * FROM Arquivos WHERE tsIdentificador=\"$id\" ");
    while($row = @mysql_fetch_array($query)){
	$a['Formato'] = $row['arFormato'];
	// Patch de seguran�a de acesso
	// trocar o formato da URLDocumento.
	// ANTES: $r.=$this->tag_obrigatorio('URLDocumento', str_replace("http://http://","http://",trata("http://".$this->bbURL.str_replace("..","",$row['arURL']))),$a);
	$r.=$this->tag_obrigatorio('URLDocumento', str_replace("http://http://","http://",trata("http://".$this->bbURL."/tde_busca/arquivo.php?codArquivo=".$row['arCod'])),$a);
    }
    return $r;

	}

	function getBibliotecaDigitalArquivo($id)
	{
		$x=null;
		$query = @mysql_query("SELECT * FROM Arquivos WHERE tsIdentificador=\"$id\" ");
		while($row = @mysql_fetch_array($query)){
			$r=null;
			$a['Formato'] = $row['arFormato'];
			$r.=$this->tag_obrigatorio('URL',$row['arURL'],$a);
			$a=null;
			$query2 = @mysql_query("SELECT * FROM LegendaArquivo WHERE arCod=\"".$row['arCod']."\" ");
			$l=null;
			while($row2=@mysql_fetch_array($query2)){
				$a['Idioma']=$this->checkIdioma($row2['laIdioma']);
				$l.=$this->tag_facultativo('Legenda',$row2['laLegenda'],$a);
				$a=null;
			}
			$r.=$l;
			if (ereg('Publ',$row['arDireitos'])){
				$nivel = 'Publico';
			} else {
				$nivel = 'Restrito';
			}
			$r.=$this->tag_obrigatorio('NiveldeAcesso',$nivel);
			$x.=$this->tag_facultativo('Arquivo',$r);
		}
		return $x;
	}

	function getBibliotecaDigitalProvedorServico($id)
	{
    $sql = "SELECT  inNome as Nome,
                    inSigla as Sigla,
                    inURL as URL,
                    inPais as Pais,
                    inUF as UF,
                    inCNPJ as CNPJ
            FROM Instituicao
            LIMIT 1
          ";
    $query=@mysql_query($sql);
    if( $row = @mysql_fetch_array($query) ){
    	return $this->tag_facultativo('ProvedorServico',$this->tag_PessoaJuridica($row));
		}
		return null;
  }

	function getBibliotecaDepositaria($tese)
	{
		if (is_array($tese)){
			$sql = "
				SELECT  bdNome,
					bdSigla,
					bdURL
				FROM BibliotecaDepositaria, TSPF, Programa
				WHERE 
				TSPF.tsIdentificador = '".$tese['tsIdentificador']."'
				AND TSPF.tspfTipo = 'Autor'
				AND Programa.prCod = TSPF.prCod
				AND BibliotecaDepositaria.bdCod = Programa.bdCod
				LIMIT 0,1";
			$query = mysql_query($sql);
			$r=null;
			if ($row = @mysql_fetch_array($query)){
				$r.=$this->tag_facultativo('Nome',$row['bdNome']);
				$r.=$this->tag_facultativo('Sigla',$row['bdSigla']);
				$r.=$this->tag_facultativo('URL',$row['bdURL']);
				$r.=$this->tag_facultativo('NumeroChamada',$tese['tsNumeroChamada']);
				return $this->tag_facultativo('BibliotecaDepositaria',$r);
			}
		}
		return null;
	}
	
	function getTitulo($id)
	{
		$query=@mysql_query("SELECT * FROM Titulo WHERE tsIdentificador =\"$id\" ");
		while($row = @mysql_fetch_array($query)){
			$a['Idioma'] = $this->checkIdioma($row['ttIdioma']);
			$r.=$this->tag_obrigatorio('Titulo',htmlspecialchars($row['ttTitulo']),$a);
			$a=null;
		}
		return $r;
	}
	
	function getGrau()
	{
	}
	
	function getResumo($id)	
	{
		$query=@mysql_query("SELECT rsIdioma, rsResumo FROM Resumo WHERE tsIdentificador = '$id'");
		$row = @mysql_fetch_array($query);
		$att['Idioma'] = $this->checkIdioma($row['rsIdioma']);
		$r.=$this->tag_obrigatorio('Resumo',trata($row['rsResumo']),$att);
		while ($row = @mysql_fetch_array($query)){
			$att['Idioma'] = $this->checkIdioma($row['rsIdioma']);
			$r.=$this->tag_facultativo('Resumo',trata($row['rsResumo']),$att);
		}
		return $r;
	}
	
	function getCobertura($id)
	{
		$query=@mysql_query("SELECT * FROM Cobertura WHERE tsIdentificador ='$id' ");
		$r=null;
		while ($row = @mysql_fetch_array($query)){
			$att['Idioma'] = $this->checkIdioma($row['cbIdioma']);
			$r.=$this->tag_facultativo('Cobertura',$row['cbCobertura'],$att);
		}
		return $r;
	}

	function getAssunto($id)
	{
		$query=@mysql_query("SELECT * FROM Assunto WHERE tsIdentificador ='$id' ");
		$r=null;
		while ($row = @mysql_fetch_array($query)){
			$att['Idioma'] = $this->checkIdioma($row['asIdioma']);
			$att['Esquema'] = $row['asEsquema'];
			$r.=$this->tag_facultativo('Assunto',$row['asAssunto'],$att);
		}
		return $r;
	}
	
	function getLocalDefesa($row)
	{
		if (is_array($row)){
			$r.=$this->tag_obrigatorio('Cidade',$row['tsCidadeLocalDefesa']);
			$r.=$this->tag_facultativo('UF',$row['tsUFLocalDefesa']);
			$r.=$this->tag_obrigatorio('Pais',$row['tsPaisLocalDefesa']);
			return $this->tag_facultativo('LocalDefesa',$r);
		}
		return null;
	}
	
	function getAfiliacao($id,$facultativo)
	{
		$r=null;
		$query = @mysql_query("
					SELECT PessoaJuridica.pjNome as Nome
								, PessoaJuridica.pjSigla as Sigla
								, PessoaJuridica.pjPais as Pais 
								, PessoaJuridica.pjUF as UF 
								, PessoaJuridica.pjCNPJ as CNPJ
								, PessoaJuridica.pjURL as URL
					FROM PessoaJuridica, PFPJ 
					WHERE PessoaJuridica.pjCod = PFPJ.pjCod
					AND PFPJ.pfCod = '$id'
					AND PFPJ.pfpjTipo = 'Afiliacao'

		");
		if ($row = @mysql_fetch_array($query)){
			if ($facultativo) {
				return $this->tag_facultativo('Afiliacao',$this->tag_PessoaJuridica($row));
			} else {
				return $this->tag_obrigatorio('Afiliacao',$this->tag_PessoaJuridica($row));
			}
		}
		if (!$facultativo){	
			$this->erro("Afilia��o esperada inexistente !");
		}
		return null;
	}
	
	function getPessoaFisica($tag,$id)	
	{

		$opcao = true;
		if ($tag == "Autor"){	
			$filter = " TSPF.tspfTipo=\"Autor\" "; 
		} else {
			$filter = " TSPF.tspfTipo!=\"Autor\" "; 
		}
		if ($this->_version != '1.0'){
			$sql_abnt = " PessoaFisica.pfCitacaoABNT, ";	
		}
		$sql = "SELECT 	PessoaFisica.pfNome, 
			PessoaFisica.pfCitacao, $sql_abnt
			PessoaFisica.pfLattes, 
			PessoaFisica.pfCPF, 
			PessoaFisica.pfCod,
			TSPF.tspfTipo 
			FROM PessoaFisica, TSPF
			WHERE PessoaFisica.pfCod = TSPF.pfCod
			AND TSPF.tsIdentificador = '$id'
			AND $filter
		";
		$query = @mysql_query($sql);
		while($row = @mysql_fetch_array($query)){
			$r=null;
			$a=null;
			$r.=$this->tag_obrigatorio('Nome',$row['pfNome']);
			$r.=$this->tag_facultativo('Citacao',$row['pfCitacao']);
			if ($this->_version != '1.0'){
				$abnt['Norma'] = 'ABNT';
					$r.=$this->tag_facultativo('Citacao',$row['pfCitacaoABNT'],$abnt);
			}
			$r.=$this->tag_facultativo('Lattes',trata($row['pfLattes']));
			$r.=$this->tag_facultativo('CPF',$row['pfCPF']);
			if ($row['tspfTipo'] != "Autor"){
				$a['Papel']=$row['tspfTipo'];
			}
			$r.=$this->getAfiliacao($row['pfCod'],$opcao);
			$resp.=$this->tag_obrigatorio($tag,$r,$a);
		}
		return $resp;
	}
	
	function getPrograma($id,$inCod)
	{
		$sql = "
			SELECT * 
			FROM Programa 
			INNER JOIN TSPF 
				ON (Programa.prCod = TSPF.prCod)
			WHERE TSPF.tsIdentificador = \"$id\"
				AND TSPF.tspfTipo = 'Autor'
		";
		$query=@mysql_query($sql);
		$r=null;
		if($row = @mysql_fetch_array($query)){
			$r.=$this->tag_facultativo('Nome',$row['prNome']);
			$r.=$this->tag_obrigatorio('Area',$row['prArea']);
			$i=$this->getProgramaInstituicao($inCod); //Recupera a institui��o de defesa

			if ($i){
				return $this->tag_facultativo('Programa',$r.$i);
			}
		}
		return null;
	}

	function getProgramaInstituicao($id)
	{
		$sql = "SELECT 	inNome as Nome, 
										inSigla as Sigla, 
										inURL as URL, 
										inPais as Pais, 
										inUF as UF, 	
										inCNPJ as CNPJ
					 	FROM Instituicao 
						WHERE inCod=\"$id\"
						LIMIT 1
					";
		$query=@mysql_query($sql);
		if ($row = @mysql_fetch_array($query)){
			return $this->tag_facultativo('Instituicao',$this->tag_PessoaJuridica($row));
		}
		return null;
	}
	
	function getAgenciaFomento($id)
	{

		$sql = "SELECT 	pjNome as Nome, 
					pjSigla as Sigla, 
					pjURL as URL, 
					pjPais as Pais, 
					pjUF as UF, 	
					pjCNPJ as CNPJ
			FROM PessoaJuridica
				INNER JOIN PFPJ 
					ON (PFPJ.pjCod = PessoaJuridica.pjCod)
					INNER JOIN TSPF
					ON (TSPF.pfCod = PFPJ.pfCod)
					WHERE TSPF.tspfTipo = 'Autor'
					AND PFPJ.pfpjTipo = 'AgenciaFomento'
					AND TSPF.tsIdentificador = '$id'
		";
		$query = @mysql_query($sql);
		$resp='';
		while($row = @mysql_fetch_array($query)){
			$resp.= $this->tag_facultativo('AgenciaFomento',$this->tag_PessoaJuridica($row));
		}
		return $resp;

	}
	
	function getDireitos($id)
	{
		$sql = "SELECT drIdioma, 
						drDireito
						FROM Direitos
						WHERE tsIdentificador ='$id'
						";
		$query = @mysql_query($sql);
		while ($row = @mysql_fetch_array($query)){
			$a['Idioma'] = $this->checkIdioma($row['drIdioma']);
			$resp.=$this->tag_obrigatorio('Direitos',$row['drDireito'],$a);
		}
		return $resp;
	}

	// Fim mtdbr	

	function getid()
	{
		return $this->_id;
	}


	function load($id)
	{
		
		$this->_id = $id;
		$this->_reg = null;
		$this->_erro = array();
		
		$sql = " SELECT count(*) as c  "; 
		$sql.= " FROM OAIControle WHERE tsIdentificador = \"$id\" LIMIT 1";
		$row = @mysql_fetch_array(@mysql_query($sql));
		if($row['c'] == 1){
			return -1;
		}

		$sql = " SELECT *,"; 
		$sql.= ' FROM_UNIXTIME(UNIX_TIMESTAMP(tsDataAtualizacao)+3*3600) as datestamp ';
		$sql.= " FROM Teses WHERE tsIdentificador = \"$id\" LIMIT 1";
		if($row=mysql_fetch_array(@mysql_query($sql))){
			$reg=$this->getControle($row);
			$reg.=$this->getBibliotecaDigital($row['tsIdentificador']);
			$reg.=$this->getBibliotecaDepositaria($row);
			$reg.=$this->getTitulo($row['tsIdentificador']);
			$reg.=$this->tag_obrigatorio('Idioma',$this->checkIdioma($row['tsIdioma']));
			$reg.=$this->tag_facultativo('Grau',$row['tsGrau']);
			$reg.=$this->tag_facultativo('Titulacao',trata($row['tsTitulacao']));
			$reg.=$this->getResumo($row['tsIdentificador']);
			$reg.=$this->getCobertura($row['tsIdentificador']);
			$reg.=$this->getAssunto($row['tsIdentificador']);
			$reg.=$this->getLocalDefesa($row);
			$reg.=$this->tag_facultativo('DataDefesa',$row['tsDataDefesa']);
			$reg.=$this->getPessoaFisica('Autor',$row['tsIdentificador']);
			$reg.=$this->getPessoaFisica('Contribuidor',$row['tsIdentificador']);
			$reg.=$this->getPrograma($row['tsIdentificador'],$row['inCod']);
			$reg.=$this->getAgenciaFomento($row['tsIdentificador']);
			$reg.=$this->getDireitos($row['tsIdentificador']);
			if (!$this->erro()){
				$this->_reg = $reg;
				return true;
			}
		}
		return false;
	}
	
	function show()
	{
		if ($this->_version == "1.0"){
			$a['xmlns']="http://www.ibict.br/schema/";
			$a['xmlns:xsi']="http://www.w3.org/2001/XMLSchema-instance";
			$a['xsi:schemaLocation']="http://www.ibict.br/schema/
															http://www.ibict.br/schema/mtd-br(v1.0).xsd";
		}else{
			$a['xmlns']="http://www.ibict.br/schema/";
			$a['xmlns:xsi']="http://www.w3.org/2001/XMLSchema-instance";
			$a['xsi:schemaLocation']="http://www.ibict.br/schema/
															http://www.ibict.br/schema/mtd-br(v1.1).xsd";
		}
		if ($this->_reg){
			return $this->tag('mtdbr',$this->_reg,$a);
		}
		return null;
	}

	function envelope($verb,$err)
	{
		$a['xmlns']="http://www.openarchives.org/OAI/2.0/";
		$a['xmlns:xsi']="http://www.w3.org/2001/XMLSchema-instance";
		$a['xsi:schemaLocation']="http://www.openarchives.org/OAI/2.0/
         http://www.openarchives.org/OAI/2.0/OAI-PMH.xsd";
		return $this->tag('OAI-PMH',$verb,$a,true);
	}

}

// }}}

// {{{ Class OAI_MTDBR extends TEDE_MTDBR

class OAI_MTDBR extends TEDE_MTDBR{
	var $_identifier_prefix = null ;
	var $_sigla;
	
	function OAI_MTDBR($sigla,$identifier_prefix, $oai_version = "1.1")
	{
		$this->TEDE_MTDBR();
		$this->setversion($oai_version); 
		$this->_identifier_prefix = $identifier_prefix;
		$this->_sigla = $sigla;
	}

	function identifier($id = null)
	{
		if ($id){
			return $this->_identifier_prefix.$id;
		}else{
			return $this->_identifier_prefix.$this->getid();
		}
	}

	function tag_header($row)
	{
		$resp=$this->tag_obrigatorio('identifier',$this->identifier($row['identifier']));
		$resp.=$this->tag_obrigatorio('datestamp',str_replace(" ","T",$row['datestamp']).'Z');

		$sql = " SELECT count(*) as c  "; 
		$sql.= " FROM OAIControle WHERE tsIdentificador = \"".$row['identifier']."\" LIMIT 1";
		$row = @mysql_fetch_array(@mysql_query($sql));
		if($row['c'] == 1){
			// O registro est� DELETADO
			// deve ser retornado SEM o METADADO
			//
			return $this->tag_obrigatorio('header',$resp,array('status'=>'deleted'));
		}else
			return $this->tag_obrigatorio('header',$resp);
	}

	function tag_record($row)
	{
		$resp = null;
		if ($this->load($row['identifier'])){
			$r=$this->tag_header($row);
			$r.=$this->tag_facultativo('metadata',$this->show());
			$resp= $this->tag_obrigatorio('record',$r);
		}
		return $resp;
	}

	function dateQuery($d)
	{
	// converting data format in YYYY-MM-DDTHH:mm:ssZ
		return ' FROM_UNIXTIME(UNIX_TIMESTAMP(\''.str_replace("Z","",str_replace("T"," ",$d)).'\')-3600*3) ';
	}

	// filter for until
	function untilQuery($until)
	{
  	return ' AND tsDataAtualizacao <= '.$this->dateQuery($until).' ';
	}

	// filter for from
	function fromQuery($from)
	{
  	return ' AND tsDataAtualizacao >= '.$this->dateQuery($from).' ';
	}

	// filter for sets
	function setQuery($set)
	{
	  return ' AND oaiset LIKE "%'.$set.'%" ';
	}


	function listIdentifiers($maxidentifiers, $from = null, $until = null, $oaiset = null, $offset = 0)
	{
		global $repositoryFilter;

		$sql = ' SELECT tsIdentificador as identifier, ';
		$sql.= ' FROM_UNIXTIME(UNIX_TIMESTAMP(tsDataAtualizacao)+3*3600) as datestamp ';
		$sql.= ' FROM Teses ';
		if ($repositoryFilter != "TODOS"){
                        $sql.= ' WHERE inCod = "1" '; // selecionar somente Teses defendidas pela Institui��o do Tede
                } else {
                        $sql.= ' WHERE inCod = inCod '; // a menos que seja o IBICT!
                }
		if ($from)	$sql.= $this->fromQuery($until);
		if ($until)	$sql.= $this->untilQuery($until);
		if ($oaiset)	$sql.= $this->setQuery($until);
		$sql.= " AND tsGrau in('Mestre','Doutor') ";
		if ($offset > 0)	$sql.= " LIMIT $offset,9999999 ";

		$query = mysql_query($sql);
		$t['count'] = mysql_num_rows($query)+$offset;
		$i=0;
		if ($query = mysql_query($sql)){
			while($i <= $maxidentifiers && ($row = mysql_fetch_array($query))){
				if ($i < $maxidentifiers){
					$t['verb'].=$this->tag_header($row);
				}else{
					$t['continue']=true;
				}
				$i++;
			}
			mysql_free_result($query);
		}else{
			defcon(4,$sql,$query);
		}
		if ($i==0){
			$this->erro("Resultset vazio");
		}
		return $t;
	}

	function listRecords($maxrecords, $from = null, $until = null, $oaiset = null, $offset = 0)
	{
		global $repositoryFilter;
		$resp=null;

		$sql = ' SELECT tsIdentificador as identifier, ';
		$sql.= ' FROM_UNIXTIME(UNIX_TIMESTAMP(tsDataAtualizacao)+3*3600) as datestamp ';
		$sql.= ' FROM Teses ';
		if ($repositoryFilter != "TODOS"){
                        $sql.= ' WHERE inCod = "1" '; // selecionar somente Teses defendidas pela Institui��o do Tede
                } else {
                        $sql.= ' WHERE inCod = inCod '; // a menos que seja o IBICT!
                }
		if ($from)		$sql.= $this->fromQuery($from);
		if ($until)		$sql.= $this->untilQuery($until);
		if ($oaiset)		$sql.= $this->setQuery($oaiset);
		$sql.= " AND tsGrau in('Mestre','Doutor') ";
		if ($offset > 0) 	$sql.= " LIMIT $offset,9999999 ";
		if ($query = mysql_query($sql)){
			$t['count'] = mysql_num_rows($query)+$offset;
			$i=0;
			while($i <= $maxrecords & ($row = mysql_fetch_array($query))){
				if ($i < $maxrecords){
					$t['verb'].=$this->tag_record($row);
				}else{
					$t['continue']=true;
				}
				$i++;
			}
			mysql_free_result($query);
		}else{
			defcon(4,$sql,$query);
		}
		if ($i==0){
			$this->erro("Resultset vazio");
		}

		$t['err'] = $this->erro();
		return $t;
	}

	function getRecord($id)
	{
		if(ereg($this->_identifier_prefix,$id)){
			$resp = null;
			$i = explode(":",$id,3);
			$sql = ' SELECT tsIdentificador as identifier, ';
			$sql.= ' FROM_UNIXTIME(UNIX_TIMESTAMP(tsDataAtualizacao)+3*3600) as datestamp ';
			$sql.= ' FROM Teses ';
			$sql.= ' WHERE tsIdentificador ="'.$i[2].'" ';
			$query = mysql_query($sql);
			if($row = mysql_fetch_array($query)){
				$t['verb'].=$this->tag_record($row);
			}else{
				$this->erro("Identificador n�o encontrado neste repositorio");
			}
		}else{
			$this->erro("Identificador n�o pertence a este repositorio");
		}
		$t['continue'] = false;
		$t['err'] = $this->erro();
		return $t;
	}

}

// }}}

//{{{ Class TEDE_ISO2709
//
// Recebe um REGISTRO MTDBR em XML e converte em MARC21 ISO-2907

class MTDBR_ISO2709 extends iso2709_record{
	var $mtdbr_tree;
	var $_prefix;


	function MTDBR_ISO2709($pr = null)
	{
		if ($pr) $this->_prefix = $pr;

	}

	function linkXML($mtdbr_tree)
	{
		$this->iso2709_record('',AUTO_UPDATE);
		$this->mtdbr_tree =& $mtdbr_tree;
	}

	function setIdPrefix($pr)
	{
		$this->_prefix = $pr;
	}

	function findTag2($node,$tag,$path = null) 
	{

		list($tag1,$tag2) = explode('/',$tag,2);

		if (is_object($node)){
			if ($node != $this->mtdbr_tree && $tag1 == $node->tagname()){
				//echo "Looking for $tag in $path".$node->tagname()."\n";
				if ($tag2){
			  	if($node -> has_child_nodes()) {
			    	foreach($children as $child) {
							$this->findTag($child,$tag2,$path."\\".$tag1);
						}
					}
				} else {
					array_push($this->_tags,$node);	
				}
			} else {
		  	if($node -> has_child_nodes()) {
		    	foreach($children as $child) {
						//echo "Looking for $tag in $path".$child->tagname()."\n";
						$this->findTag($child,$tag);
					}
				}
			}
		}
		return $this->_tags;

	}

	function findTag($node,$tag,$path = null) {

		if ($this->mtdbr_tree != $node) {
			$path.="/".$node->tagname();
		}else{
			$this->_tags = array();
		}
	
	  if($node->has_child_nodes()) {
			list($tag1,$tag2) = explode('/',$tag,2);
			if ($this->mtdbr_tree != $node && $node->tagname() == $tag1){
				$tag = $tag2;
			}
	    # continue as there are children to this node
	    $children = $node -> child_nodes();
	    foreach($children as $child) {
	      # first, check to see if a child is an actual node, and not just #text
	      if($child -> type == XML_ELEMENT_NODE) {
					//echo ("Lookin in node $path in ".$child->tagname()." for $tag \n");
	        # we have a real node, now check against the one were looking for
					if($child -> tagname() == $tag) {
	          # found it
						array_push($this->_tags,$child);	
					}else{
	          $a = $this->findTag($child, $tag, $path);
					}
	      }
			}
		}
	  return $this->_tags;
	}

	function dump()
	{
		// ====================================
		// '/record/metadata/mtdbr/Autor/Nome';
		// ====================================

		$this->set_rs('n');
		$this->set_dt('a');

		$ok = false;

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Controle/IdentificacaoDocumento");
		foreach ($nodes as $node){	
			$this->add_field('001','  ',$this->_prefix.$node->get_content());
			$ok = true;
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Controle/Sigla");
		foreach ($nodes as $node){	
			$this->add_field('003','  ',$node->get_content());
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Controle/DataAtualizacao");
		foreach ($nodes as $node){	
			$this->add_field('005','  ',str_replace('-','/',substr($node->get_content(),0,10)));
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Controle/IdentificacaoDocumento");
		foreach ($nodes as $node){	
			$this->add_field('008','  ',$node->get_content());
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/BibliotecaDigital/URLDocumento");
		foreach ($nodes as $node){	
			$this->add_field('856','  ','u',$node->get_content());
		}


		$c_245=0;
		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Titulo");
		foreach ($nodes as $node){	
			$idioma = $node->get_attribute('Idioma');
			switch ($idioma){
				case ('pt'):
						$f = 'a';
					break;
				case ('en'):
						$f = 'b';
					break;
				default:
						$f = 'c';
					break;
			}
			$subfield_245[$c_245++]= array($f=>$node->get_content());
		}

		if ($subfield_245){
			$this->add_field('245','  ',$subfield_245);
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Idioma");
		foreach ($nodes as $node){	
			$idioma = $node->get_content();
			switch($idioma){
				case ('pt'): $idioma = 'por'; break;
				case ('en'): $idioma = 'eng'; break;
				case ('es'): $idioma = 'spa'; break;
				case ('fr'): $idioma = 'fre'; break;
				default:
						$idioma = '---';
					break;
			}
			$this->add_field('051','  ',a,$idioma);
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Grau");
		foreach ($nodes as $node){	
			$this->add_field('502','  ',a,$node->get_content());
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Resumo");
		foreach ($nodes as $node){	
			$idioma = $node->get_attribute('Idioma');
			switch ($idioma){
				case ('en'):
						$this->add_field('940','  ',a,$node->get_content());
					break;
				default:
						$this->add_field('520','  ',a,$node->get_content());
					break;
			}
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Assunto");
		foreach ($nodes as $node){	
			$idioma = $node->get_attribute('Idioma');
			switch ($idioma){
				case ('en'):
						$this->add_field('651','  ',a,$node->get_content());
					break;
				default:
						$this->add_field('650','  ',a,$node->get_content());
					break;
			}
		}

		$c_260=0;
		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/DataDefesa");
		foreach ($nodes as $node){	
			$subfield_260[$c_260++]= array('c'=>$node->get_content());
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/LocalDefesa/Cidade");
		foreach ($nodes as $node){	
			$subfield_260[$c_260++]= array('a'=>$node->get_content());
		}


		if ($c_260>0){
			$this->add_field('260','  ',$subfield_260);
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Autor/Nome");
		foreach ($nodes as $node){	
			$this->add_field('100','  ',a,$node->get_content());
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Contribuidor/Nome");
		foreach ($nodes as $node){	
			$papel = $node->get_attribute('Papel');
			if ($papel){
				$this->add_field('700','  ',a,$node->get_content(), e,$papel);
			} else { 
				$this->add_field('700','  ',a,$node->get_content());
			}
		}

		$nodes=$this->findTag($this->mtdbr_tree,"metadata/mtdbr/Programa/Instituicao/Nome");
		foreach ($nodes as $node){	
			$this->add_field('710','  ',a,$node->get_content());
		}

		return $ok;

	}

	function iso2709()
	{	
		if ($this->dump()){
			return $this->get_fullrecord();
		}
	}

	function _MTDBR_ISO2709()
	{
	}

	
}

//}}}

?>
