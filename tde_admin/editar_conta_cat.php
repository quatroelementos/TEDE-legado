<? session_start();
if(!session_is_registered("VAdmin_cnCod")) {
header("Location: ../index.php");
}else{
if ($Editar!="") {
require "biblioteca/manutencao_contas.inc";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><!-- InstanceBegin template="/Templates/tde_biblioteca_menu.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?> 
<head>
<!-- InstanceBeginEditable name="doctitle" --> 
<title>| Sistema de Sumiss&atilde;o de Teses e Disserta&ccedil;&otilde;es Eletr&ocirc;nicas | ADMINISTRA&Ccedil;&Atilde;O | Contas de Catalogadores</title>
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
      <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="139" height="100%" valign="top" class="subMenuAdmin"> 
            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"><span class="txtBold">&raquo; <? echo $txContaCatalogador; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='conta_catalogador.php'"><a href="conta_catalogador.php" class="linkpreto">&raquo; 
                  <? echo $txInserir; ?></a></td>
              </tr>
              <tr> 
                <td height="13" class="subMenuOver" onClick="location='visualizar_contas_cat.php?v=Editar'"><a href="visualizar_contas_cat.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_admin.php'"><a href="tde_admin.php" class="linkpreto">&laquo; 
                  <? echo $txMenuPrincipal; ?></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                 <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank">&raquo; 
                  <? echo $txAjuda2; ?></a></td>
              </tr>
            </table></td>
          <td height="100%" valign="top" class="tdConteudo"> 
            <? 

require "../conexao/conexao.inc";
if ($erro==""){
$SEL_cn="SELECT * FROM Contas WHERE cnCod=$cnCod";
$SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
$SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
				
				$cnCod=$SEL_cn_RES["cnCod"];
				$CbdCod=$SEL_cn_RES["bdCod"];
				$cnNome=$SEL_cn_RES["cnNome"];
				$cnLogin=$SEL_cn_RES["cnLogin"];
				$cnSenha=$SEL_cn_RES["cnSenha"];
				$cnEmail=$SEL_cn_RES["cnEmail"];
				$cnTipo=$SEL_cn_RES["cnTipo"];
				/* $cnDataInicio=$SEL_cn_RES["cnDataInicio"];
				
				$cnDataInicio_split=split("-",$cnDataInicio);
				$cnDiaIni=$cnDataInicio_split[2];
				$cnMesIni=$cnDataInicio_split[1];
				$cnAnoIni=$cnDataInicio_split[0];
				//$cnDataInicio=$cnDiaIni."/".$cnMesIni."/".$cnAnoIni;
				$cnDataTermino=$SEL_cn_RES["cnDataTermino"];
				$cnDataTermino_split=split("-",$cnDataTermino);
				$cnDiaTer=$cnDataTermino_split[2];
				$cnMesTer=$cnDataTermino_split[1];
				$cnAnoTer=$cnDataTermino_split[0];
				//$cnDataTermino=$cnDiaTer."/".$cnMesTer."/".$cnAnoTer; */
				$cnBloqueado=$SEL_cn_RES["cnBloqueado"];

}
?>
            <? if ($sucesso!="" or $erro!="") { ?>
            <div>
			<table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr> 
                <td align="center" valign="middle" class="loginAdmin"> 
                <? echo $erro;
					if ($sucesso!="") {
				   header("Location: visualizar_contas_cat.php?v=Editar&sucesso=$sucesso");
					 exit;
					 }?>                
				</td>
              </tr>
            </table></div><br />
<? } ?>
<div>
<form name="form1" method="post" action="" onSubmit="return checkForm(this.name); return true;">
             
              <table width="90%"  border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                        <tr align="center" class="tdAdmin"> 
                          <td colspan="2" class="txtBold"><? echo $txContaCatalogador; ?></td>
                        </tr>
                        <tr> 
                          <td width="16%" class="txtBold"><? echo $txBiblioteca; ?></td>
                          <td width="84%"> <span class="txtBold"> 
                            <? //Selecionar a Bd
							if ($bdNome=="") {
							require "../conexao/conexao.inc";
				$SEL_bd="SELECT bdNome FROM BibliotecaDepositaria WHERE bdCod=$CbdCod";
				$SEL_bd_query=mysql_db_query($base,$SEL_bd,$conexao);
				$SEL_bd_RES=mysql_fetch_array($SEL_bd_query);
				echo $SEL_bd_RES["bdNome"];
				} else {
				echo $bdNome;
				}
						?>
                            </span> </td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txNome; ?></td>
                          <td><input name="cnNome" type="text" class="req" id="cnNome2" value="<? echo $cnNome; ?>" size="60" maxlength="100"> 
                            <input type="hidden" name="cnNomeAtual" value="<? echo $cnNome; ?>"></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txLogin; ?></td>
                          <td><input name="cnLogin" type="text" class="req" id="cnNome" value="<? echo $cnLogin; ?>" size="30" maxlength="100"></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txSenha; ?></td>
                          <td><input name="cnSenha" type="password" class="req" id="cnSenha2" value="<? echo $cnSenha; ?>" size="15" maxlength="30"></td>
                        </tr>
                        <tr>
                          <td class="txtBold"><? echo $txConfirmarSenha; ?></td>
                          <td><input name="cnSenha2" type="password" class="req" id="cnSenha" value="<? if ($erro=="") { echo $cnSenha; } ?>" size="15" maxlength="30"></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txEMail; ?></td>
                          <td><input name="cnEmail" type="text" class="email" id="cnEmail2" value="<? echo $cnEmail; ?>" size="40" maxlength="100"></td>
                        </tr>
						 <tr> 
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr> 
                          <td><strong><? echo $txTipo; ?></strong></td>
                          <td><input name="VcnTipo" type="radio" value="Catalogador" <? if ($cnTipo=="Catalogador") { ?>checked<? } ?>> 
                            <? echo $txComum; ?> <input type="radio" name="VcnTipo" value="MasterCataloga" <? if ($cnTipo=="MasterCataloga") { ?>checked<? } ?>> 
                            <? echo $txMaster; ?></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr class="tdAdmin"> 
                          <td colspan="2" class="txtBold"><? echo $txStatus; ?></td>
                        </tr>
                        <tr class="tdAdmin"> 
                          <td><? echo $txBloqueado; ?></td>
                          <td><input type="radio" name="cnBloqueado" value="1" <? if ($cnBloqueado=="1") {?> checked <? } ?>>
<? echo $txSim; ?>
  <input name="cnBloqueado" type="radio" value="0" <? if ($cnBloqueado=="0" or $cnBloqueado=="") {?> checked <? } ?>>
<? echo $txNao; ?></td>
                        </tr>
                        <tr> 
                          <td> 
                            <input name="cod" type="hidden" value="Editar"> <input name="cnCod" type="hidden" id="cnCod" value="<? echo $cnCod; ?>">
                            <input name="bdNome" type="hidden" id="cnCod2" value="<? echo $SEL_bd_RES["bdNome"]; ?>"></td>
                          <td align="right" valign="bottom"><input name="Editar" type="submit" class="botao" id="Editar" value="<? echo $txAlterar; ?> &raquo;"></td>
                        </tr>
                      </table></td>
                </tr>
              </table>
             
          </form> <br></div> </td>
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
<!-- InstanceEnd --></html>
<? } ?>