<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: ../tde_biblioteca/login.php");
}else{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><!-- InstanceBegin template="/Templates/tde_biblioteca_menu.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?> 
<head>
<!-- InstanceBeginEditable name="doctitle" --> 
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Visualiza&ccedil;&atilde;o de Contas</title>
<!-- InstanceEndEditable --> 
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_cat.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="<? echo $diretorio_layout; ?>scripts/menu.js"></script>
<?
$script='<script language="JavaScript" src="../tde_i18n/mensagens_js_'.$idioma_sistema.'.js"></script>';
echo $script;
?>
<!-- InstanceBeginEditable name="head" --> <!-- InstanceEndEditable -->
<meta name="Pragma" content="no-cache">
<meta name="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="Expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="100%" height="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="80" align="left" valign="top"><table width="100%" height="80"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="80" align="center" valign="top" class="subMenuBib">
<table width="100%" height="80"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="60" align="center" valign="middle" bgcolor="#FFFFFF"><a href="<? echo $link; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_inst.jpg" alt="<? echo $texto; ?>" name="logoInst" width="139" height="60" hspace="0" vspace="0" border="0" id="logoInst"></a></td>
              </tr>
              <tr> 
                <td width="139" height="20" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/subMenuarr.gif" width="139" height="20" hspace="0" vspace="0" border="0"></td>
              </tr>
          </table></td>
          <td width="62" height="80" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="menuBiblio"><img src="<? echo $diretorio_layout; ?>imagens/menuSep_biblio.gif" name="menuSep" width="62" height="68" hspace="0" vspace="0" border="0" id="menuSep"></td>
            </tr>
            <tr>
              <td class="tdConteudo">&nbsp;</td>
            </tr>
          </table></td>
          <td width="100%" height="80" align="left" valign="top"><table width="100%" height="78"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="44" align="left" valign="top"><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="tituloSistemaInterno">
                    <tr> 
                      <td align="center" valign="middle"> 
                        <? echo $txSPETD_T; ?>
                        <span class="tituloBib"> | 
                        <? echo $txBiblioteca_T; ?>
                        |</span></td>
                      <td width="25" height="44" align="left" valign="top" class="menuBiblio"><img src="<? echo $diretorio_layout; ?>imagens/titleSep.gif" width="25" height="44" hspace="0" vspace="0" border="0"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="34" align="center" valign="top"><table width="100%" height="24" border="0" align="left" cellpadding="0" cellspacing="0" class="menuBiblio">
                    <tr> 
                      <td height="15" align="center" valign="middle">| <a href="javascript:changeMenu(0,'../');" target="_self" class="menu" onMouseOver="javascript:overMenu(0,'../');" onMouseOut="javascript:overMenu(4,'../');"> 
                        <? echo $txInicio_T; ?> </a> | <a href="javascript:changeMenu(1,'../');" class="menu" onMouseOver="javascript:overMenu(1,'../');" onMouseOut="javascript:overMenu(4,'../');"> 
                        <? echo $txBusca_T; ?> </a> |<a href="javascript:changeMenu(4,'../');" class="menu" onMouseOver="javascript:overMenu(4,'../');" onMouseOut="javascript:overMenu(4,'../');"> 
                        <? echo $txBiblioteca_T; ?> </a> | <a href="javascript:changeMenu(5,'../');" class="menu" onMouseOver="javascript:overMenu(5,'../');" onMouseOut="javascript:overMenu(4,'../');"> 
                        <? echo $txAdministracao_T; ?> </a> | <a href="javascript:changeMenu(6,'../');" class="menu" onMouseOver="javascript:overMenu(6,'../');" onMouseOut="javascript:overMenu(4,'../');"> 
                        <? echo $txContato_T; ?> </a> |</td>
                    </tr>
                    <tr> 
                      <td height="9" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/menuTile_biblio.gif" name="menuBar" width="100%" height="9" hspace="0" vspace="0" border="0" id="menuBar"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="100%" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo da Pagina" --> 
     
      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" align="left" valign="top" class="subMenuBib"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"> <span class="txtBold"> 
                  <?
		  //Visualizar a Biblioteca dessa Conta
		  require "../conexao/conexao.inc";
		  $SEL_bd="SELECT * FROM BibliotecaDepositaria WHERE bdCod=$SbdCod";
          $SEL_bd_query=mysql_db_query($base,$SEL_bd,$conexao);
          $SEL_bd_RES=mysql_fetch_array($SEL_bd_query);
		  
		  $bdNome=$SEL_bd_RES["bdNome"];
		  echo $bdNome;
		  ?>
                  <br>
                  </span> </td>
              <tr> 
                <td height="14" class="td"><span class="txtBold"><? echo $txCadastro; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/visualizar_alunos.php?v=Editar'"><a href="../tde_biblioteca/visualizar_alunos.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txAutor; ?></a></td>
              </tr>
              <tr> 
                <td height="13" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/visualizar_contribuidores.php?v=Editar'"><a href="../tde_biblioteca/visualizar_contribuidores.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txContribuidor; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onClick="location='../tde_biblioteca/visualizar_afiliacao.php?pag=VisCad'" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_biblioteca/visualizar_afiliacao.php?pag=VisCad" class="linkpreto">&raquo; 
                  <? echo $txAfiliacao; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onClick="location='../tde_biblioteca/visualizar_agfomento.php?pag=VisCad'" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_biblioteca/visualizar_agfomento.php?pag=VisCad" class="linkpreto">&raquo; 
                  <? echo $txAgenciaFomento; ?></a></td>
              </tr>
              <tr> 
                <td height="14" class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td height="14" class="td"><span class="txtBold"><? echo $txSubmissao; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/visualizar_tde_iniciadas.php?pag=VisCad'"><a href="../tde_biblioteca/visualizar_tde_iniciadas.php?pag=VisCad" class="linkpreto">&raquo; 
                  <? echo $txTDE; ?></a></td>
              </tr>
              <tr> 
                <td height="14" class="td">&nbsp;</td>
              </tr>
              <br>
              <br>
              <? session_start();
if(session_is_registered("ScnTipo")) {
if ($ScnTipo=="MasterCataloga") {
?>
              <tr> 
                <td class="td"> <span class="txtBold"> <? echo $txTDEPublicadas; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/tde_bib.php?v=Publicadas'"><a href="tde_bib.php?v=Publicadas" class="linkpreto">&raquo; 
                  <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a> </td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/tde_bib.php?v=Publicadas'"><a href="tde_bib.php?v=Publicadas" class="linkpreto">&raquo; 
                  <? echo $txVisualizar; ?></a> </td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <? } }?>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/logout.php'"><a href="../tde_biblioteca/logout.php" class="linkpreto">&laquo; 
                  <? echo $txSair; ?></a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank">&raquo; 
                  <? echo $txAjuda2; ?></a></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
            </table></td>
          <td height="100%" align="center" valign="top" class="tdConteudo">
		  
		   <form action="" method="post" name="webform" onSubmit="return checkForm(this.name); return true;">
             <? if ($Restaurar!="") { ?>
			  <table width="90%" border="0" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td align="center" valign="middle"><p><span class="txtBold"> <? echo $txATENCAOTDERestaurar; ?></span></p>
                    <table align="right" cellpadding="4" cellspacing="0" class="txt">
                      <tr> 
                        <td align="center" valign="middle" class="botao" onClick="location='retornar_tde_excluida.php?codRetaurar=Sim&VtsIdentificador=<? echo $VtsIdentificador;?>&VpfCod=<? echo $VpfCod; ?>'" ><a href="retornar_tde_excluida.php?codRestaurar=Sim&VtsIdentificador=<? echo $VtsIdentificador;?>&VpfCod=<? echo $VpfCod; ?>" class="menu"><? echo $txConfirmar; ?> 
                          &raquo; </a></td>
                      </tr>
                    </table>
					 
                  </td>
                </tr>
              </table>
              <? exit; }
				 if ($codRestaurar!="") {
	  require "biblioteca/restaurar_tde_excluida.inc";
	  exit;
	  }
			 if ($tsPaisLocalDefesa=="") {
	  require "biblioteca/dados_alteracao_tde.inc";
			} else {
			require "../conexao/conexao.inc";
			} 
		
	 				?>
              <br>
              <div> 
                <div>
                  <table width="90%"  border="0" cellpadding="5" cellspacing="0" class="loginTable">
                    <tr> 
                      <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                          <tr align="center" class="tdBiblioteca"> 
                            <td colspan="2" class="txtbold"><? echo $txTDEPublicadas; ?></td>
                          </tr>
                          <tr align="center"> 
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr align="left" valign="middle" class="tdBiblioteca"> 
                            <td colspan="2" class="txtBold"><? echo $txAutor; ?></td>
                          </tr>
                          <tr> 
                            <td width="18%" class="txtBold"><? echo $txNome; ?></td>
                            <td><? echo $pfNome; ?> <span class="txtBold"> </span> 
                              <input name="VpfCod" type="hidden" class="input" id="VpfCod" value="<? echo $VpfCod; ?>"> 
                              <span class="txtBold"> 
                              <input name="VtsIdentificador" type="hidden" class="input" id="tsIdentificador3" value="<? echo $VtsIdentificador; ?>">
                              </span></td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txCitacao; ?></td>
                            <td><? echo $pfCitacao; ?><span class="txtBold"> </span></td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txLattes; ?></td>
                            <td><? echo $pfLattes; ?><span class="txtBold"> </span></td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txCPF; ?></td>
                            <td><? echo $pfCPF; ?><span class="txtBold"> </span></td>
                          </tr>
                          <tr> 
                            <td bgcolor="#FFFFFF" class="txtBold"><? echo $txEMail; ?></td>
                            <td bgcolor="#FFFFFF"><? echo $pfEmail; ?> </td>
                          </tr>
                          <tr> 
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                            <td bgcolor="#FFFFF0"><? echo $txOEMail; ?><span class="txtBold"> 
                              <? if ( $tspfDispEmail=="Sim") { echo "ser�"; } else { echo "n�o ser�"; }  ?>
                              </span> <? echo $txDisponibilizadoPaginaRosto; ?>.</td>
                          </tr>
                          <tr> 
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <? if ($pjNome!="") { ?>
                          <tr align="left" valign="middle" class="tdBiblioteca"> 
                            <td colspan="2" class="txtBold"><? echo $txAfiliacao; ?></td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txNome; ?></td>
                            <td><? echo $pjNome; ?><span class="txtBold"> </span></td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txSigla; ?></td>
                            <td><? echo $pjSigla; ?><span class="txtBold"> </span></td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txPais; ?></td>
                            <td> 
                              <? 
						  $SEL_ps="SELECT psNome FROM Pais WHERE psSigla='$pjPais'";
                            $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						  echo $SEL_ps_RES["psNome"]; ?>
                              <span class="txtBold"> </span></td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txUF; ?></td>
                            <td><? echo $pjUF; ?><span class="txtBold"> </span></td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txCNPJ; ?></td>
                            <td><? echo $pjCNPJ; ?><span class="txtBold"> </span></td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txURL; ?></td>
                            <td><? echo $pjURL; ?><span class="txtBold"> </span></td>
                          </tr>
                          <? } ?>
                          <tr> 
                            <td colspan="2" class="txtBold">&nbsp;</td>
                          </tr>
                          <tr align="left" class="tdBiblioteca"> 
                            <td colspan="2" valign="middle" class="txtBold"><? echo $txTitulacao; ?></td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txGrau; ?></td>
                            <td> 
                              <?
							$SEL_gr="SELECT * FROM Grau WHERE grIdiomaPais='$idioma_sistema' and grNome='$tsGrau'";
                            $SEL_gr_query=mysql_db_query($base,$SEL_gr,$conexao);
                            $SEL_gr_RES=mysql_fetch_array($SEL_gr_query);
							
							
							$grNome=$SEL_gr_RES["grNome"];
							
                              echo $grNome; 
						  ?>
                            </td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txTitulacao; ?></td>
                            <td> <? echo $tsTitulacao; ?> </td>
                          </tr>
                          <tr> 
                            <td class="txtBold">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr align="left" class="tdBiblioteca"> 
                            <td colspan="2" valign="middle" class="txtBold"><? echo $txContribuidor; ?></td>
                          </tr>
                          <tr> 
                            <td colspan="2" class="txtBold"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txt">
                                <tr> 
                                  <td> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
                                      <?
		  require "../conexao/conexao.inc";       
	$sel2="select * from TSPF where tsIdentificador=$VtsIdentificador and tspfTipo<>'Autor'";
	$sel2_query=mysql_db_query($base,$sel2,$conexao);
$sel2RESP=mysql_fetch_array($sel2_query);
$cor="#E5E5E5";

while ($sel2RESP!="") {
$pfCod=$sel2RESP[pfCod];
$tspfTipo=$sel2RESP[tspfTipo];

$selpf="select * from PessoaFisica where pfCod=$pfCod";
$selpf_query=mysql_db_query($base,$selpf,$conexao);
$selpfRESP=mysql_fetch_array($selpf_query);

$pfNome=$selpfRESP["pfNome"];

if ($cor!="#E5E5E5") {
$cor="#E5E5E5";
} else {
$cor="#F0F0F0";
}
		?>
                                      <tr bgcolor="<? echo $cor; ?>"> 
                                        <td width="64%"> <? echo $pfNome; ?></td>
                                        <td width="36%"><? echo $tspfTipo; ?> 
                                        </td>
                                      </tr>
                                      <?
		$sel2RESP=mysql_fetch_array($sel2_query);
	}
		?>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr> 
                            <td class="txtBold">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr align="left" class="tdBiblioteca"> 
                            <td colspan="2" valign="middle" class="txtBold"><? echo $txLocalDeDefesa; ?></td>
                          </tr>
                          <tr bgcolor="#FFF5F0"> 
                            <td class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txPais; ?></td>
                            <td> 
                              <?
							 echo $tsPaisLocalDefesa; ?>
                            </td>
                          </tr>
                          <tr bgcolor="#FFF5F0"> 
                            <td class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txUF; ?></td>
                            <td> 
                              <?
							echo $tsUFLocalDefesa;
						?>
                            </td>
                          </tr>
                          <tr bgcolor="#FFF5F0"> 
                            <td class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txCidade; ?></td>
                            <td> <? echo $tsCidadeLocalDefesa; ?></td>
                          </tr>
                          <tr> 
                            <td class="txtBold">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr> 
                            <td class="txtBold"><? echo $txDataDaDefesa; ?></td>
                            <td> 
                               <?

				  $tsDataDefesa_split=split("-",$tsDataDefesa);
				  if ($tsDataDefesa_split[2]=='00' or $tsDataDefesa_split[1]=='00') {
				  if ($tsDataDefesa_split[2]=='00' and $tsDataDefesa_split[1]!='00'){
                  echo $tsDataDefesa_split[1]."/".$tsDataDefesa_split[0];
				  }else{
				  echo $tsDataDefesa_split[0];
				  }
				  } else {
				  echo $tsDataDefesa_split[2]."/".$tsDataDefesa_split[1]."/".$tsDataDefesa_split[0];
				  }

				  ?>
                            </td>
                          </tr>
                          <tr> 
                            <td class="txtBold">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr> 
                            <td bgcolor="#FFFFFF" class="txtBold"><? echo $txIdioma; ?></td>
                            <td bgcolor="#FFFFFF"> 
                              <?
							$SEL_id="SELECT * FROM Idiomas WHERE idIdiomaPais='$idioma_sistema' and idSigla='$tsIdioma'";
                            $SEL_id_query=mysql_db_query($base,$SEL_id,$conexao);
                            $SEL_id_RES=mysql_fetch_array($SEL_id_query);
							
							$idIdioma=$SEL_id_RES["idIdioma"];
							
							echo $idIdioma; ?>
                            </td>
                          </tr>
                          <tr> 
                            <td bgcolor="#FFFFFF" class="txtBold">&nbsp;</td>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                          </tr>
                          <tr align="left" valign="top"> 
                            <td bgcolor="#FFFFFF" class="txtBold"><span class="txtBold"><? echo $txTitulo; ?></span></td>
                            <td bgcolor="#FFFFFF"><? echo $AttTitulo[0]; ?> </td>
                          </tr>
                          <? 
						require "../bibliotecas/campoExtra.bib";
						if ($c1_pos=='1' or $c2_pos=='1') { ?>
                          <tr align="left"> 
                            <td colspan="2" valign="bottom" class="txtBold">&nbsp;</td>
                          </tr>
                          <? if ($c1_pos=='1') { ?>
                          <tr> 
                            <td align="left" class="txtBold"><? echo $VtsCampo1; ?></td>
                            <td width="88%" align="left"> 
                              <? if ($c1_pos_tipo=="a") { echo $tsCampo1;}?>
                            </td>
                          </tr>
                          <? } if ($c2_pos=='1') { ?>
                          <tr> 
                            <td align="left" class="txtBold"><? echo $VtsCampo2; ?></td>
                            <td align="left"> 
                              <? if ($c2_pos_tipo=="a") { echo $tsCampo2; }?>
                            </td>
                          </tr>
                          <? } ?>
                          <tr> 
                            <td colspan="3" align="right" valign="bottom">&nbsp;</td>
                          </tr>
                          <? } ?>
                          <tr align="left" class="tdBiblioteca"> 
                            <td colspan="2" valign="middle" class="txtBold"><? echo $txAssunto; ?></td>
                          </tr>
                          <tr> 
                            <td bgcolor="#FFFFFF" class="txtBold"><? echo $txAreaSubAreaCNPQ; ?></td>
                            <td bgcolor="#FFFFFF"><? echo $asAssunto; ?><span class="txtBold"> 
                              </span></td>
                          </tr>
                          <tr> 
                            <td align="left" valign="top" bgcolor="#FFFFFF" class="txtBold">&nbsp;</td>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td align="left" valign="top" bgcolor="#FFFFFF" class="txtBold"><span class="txtBold"><? echo $txPalavrasChave; ?></span></td>
                            <td bgcolor="#FFFFFF"> 
                              <? $asAssunto2QTD=count($AasAssunto2);

					  for ($i=0; $i<=$asAssunto2QTD; $i++) {

					  if ($AasAssunto2[$i]!="") {

					  echo $AasAssunto2[$i].";"; 

					  }

					  }?>
                              <span class="txtBold"> </span> </td>
                          </tr>
                          <tr> 
                            <td align="left" valign="top" bgcolor="#FFFFFF" class="txtBold">&nbsp;</td>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td align="left" valign="top" bgcolor="#FFFFFF" class="txtBold"><span class="txtBold"><? echo $txResumo; ?></span></td>
                            <td bgcolor="#FFFFFF"> <? echo $ArsResumo[0]; ?> <span class="txtBold"> 
                              </span></td>
                          </tr>
                          <tr> 
                            <td class="txtBold">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
                </div>
                <?            			     
					        $SEL_id="SELECT * FROM Idiomas WHERE idSigla='$tsIdiomaALT'";
                           	$SEL_id_query=mysql_db_query($base,$SEL_id,$conexao);
                            $SEL_id_RES=mysql_fetch_array($SEL_id_query);

							$tsNomeIdiomaALT=$SEL_id_RES["idIdioma"];
			  if ($tsNomeIdiomaALT!="") { ?>
                <br>
                <div> 
                  <table width="90%" border="0" cellspacing="0" cellpadding="5" class="loginTable">
                    <tr class="txt"> 
                      <td width="19%" bgcolor="#FFFFF0" class="txtBold"><? echo $txOutroIdioma; ?></td>
                      <td width="81%" bgcolor="#FFFFF0"> <? echo $tsNomeIdiomaALT; ?><span class="txtBold"> 
                        </span></td>
                    </tr>
                    <tr class="txt"> 
                      <td bgcolor="#FFFFF0" class="txtBold">&nbsp;</td>
                      <td bgcolor="#FFFFF0">&nbsp;</td>
                    </tr>
                    <tr class="txt"> 
                      <td bgcolor="#FFFFF0" class="txtBold"><span class="txtBold"><? echo $txTitulo; ?></span></td>
                      <td bgcolor="#FFFFF0"> <? echo $AttTitulo[1];  ?> <span class="txtBold"> 
                        </span></td>
                    </tr>
                    <tr class="txt"> 
                      <td class="txtBold">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr class="txt"> 
                      <td align="left" valign="top" bgcolor="#FFFFF0" class="txtBold"><span class="txtBold"><? echo $txPalavrasChave; ?></span></td>
                      <td bgcolor="#FFFFF0"> 
                        <? $asAssunto3QTD=count($AasAssunto3);

					  for ($i=0; $i<=$asAssunto3QTD; $i++) {

					  if ($AasAssunto3[$i]!="") {

					  echo $AasAssunto3[$i].";"; 

					  }

					  }?>
                      </td>
                    </tr>
                    <tr class="txt"> 
                      <td bgcolor="#FFFFF0" class="txtBold">&nbsp;</td>
                      <td bgcolor="#FFFFF0">&nbsp;</td>
                    </tr>
                    <tr class="txt"> 
                      <td align="left" valign="top" bgcolor="#FFFFF0" class="txtBold"><span class="txtBold"><? echo $txResumo; ?></span></td>
                      <td bgcolor="#FFFFF0"> <? echo $ArsResumo[1]; ?> <span class="txtBold"> 
                        </span></td>
                    </tr>
                    <tr class="txt"> 
                      <td bgcolor="#FFFFF0"> </td>
                      <td bgcolor="#FFFFF0"> </td>
                    </tr>
                  </table>
                </div>
                <div>
                  <? } ?>
                  <br>
                  <table width="90%" border="0" cellspacing="0" cellpadding="5"  class="loginTable">
                    <tr class="txt"> 
                      <td width="19%"><span class="txtBold"><? echo $txDisponibilidade; ?></span></td>
                      <td width="81%"><? echo $drDireito; ?><span class="txtBold"> 
                        </span></td>
                    </tr>
                  </table>
                </div>
              <br>
                </div>
			  <div><table width="90%" border="0" cellspacing="0" cellpadding="5"  class="loginTable">
                  <tr class="txt"> 
                    <td align="right"><span class="txtBold">
                      <input name="Restaurar" type="submit" class="botao" value="<? echo $txRestaurar; ?> &raquo;">
                      </span></td>
                  </tr>
                </table>
              </div>
              <div><br />
              </div>
             
          </form>
		  </td>
        </tr>
      </table>
      <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" align="left" valign="bottom"><table width="100%" height="50"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr align="right" valign="bottom"> 
          <td width="139" nowrap><table width="139" height="50"  border="0" align="right" cellpadding="0" cellspacing="0" class="subMenuBib">
              <tr> 
                <td width="139" height="33" align="right" valign="middle" class="versao"><br>
                  <? require "../bibliotecas/versao_sistema.bib"; echo $versao ?>
                  | <? echo $txCopyright; ?></td>
              </tr>
            </table></td>
          <td width="100%" valign="middle"><table width="100%" height="50"  border="0" align="right" cellpadding="0" cellspacing="0" class="bttmBar">
            <tr align="center" valign="middle">
              <td width="25%" align="center"><a href="<? echo $link2; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_tede1.gif" / alt="<? echo $texto2; ?>" height="33" border="0"></a></td>
              <td width="25%" align="center"><a href="<? echo $link3; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_tede2.gif" / alt="<? echo $texto3; ?>" height="33" border="0"></a></td>
              <td width="25%" align="center"><a href="<? echo $url_bdtd; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/teses_logo_tede.jpg" alt="<? echo $url_bdtd; ?>" name="bdtdLogo" border="0" id="bdtdLogo"></a></td>
              <td width="25%" align="center" valign="middle"><a href="<? echo $url_ibict; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/ibict_logo_tede.jpg" alt="<? echo $url_ibict; ?>" name="ibictLogo" border="0" id="ibictLogo"></a></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html><? } ?>
