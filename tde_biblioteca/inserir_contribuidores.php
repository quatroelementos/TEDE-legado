<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
require "../bibliotecas/cpf_cnpj.bib";
require "../bibliotecas/linkLattes.bib";
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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Visualiza&ccedil;&atilde;o e Inser&ccedil;&atilde;o de Contribuidor</title>
<!-- InstanceEndEditable --> 
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_cat.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="<? echo $diretorio_layout; ?>scripts/menu.js"></script>
<?
$script='<script language="JavaScript" src="../tde_i18n/mensagens_js_'.$idioma_sistema.'.js"></script>';
echo $script;
?>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
      <?
require "../conexao/conexao.inc";

if ($Inserir!="") {
require "biblioteca/inserir_contribuidores.inc";
require "../conexao/conexao.inc";
}
?>
      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" valign="top" class="subMenuBib">            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
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
              </tr>
              <tr> 
                <td class="td"><span class="txtBold">&raquo; <? echo $txContribuidor; ?></span></td>
              </tr>
              <tr> 
                <td height="12" class="subMenuOver" onClick="location='inserir_contribuidores.php'"><a href="inserir_contribuidores.php" class="linkpreto">&raquo; 
                  <? echo $txInserir; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_contribuidores.php?v=Editar'"><a href="visualizar_contribuidores.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_pos.php'"><a href="tde_pos.php" class="linkpreto">&laquo; 
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
          <td height="100%" valign="top" class="tdConteudo"><form action="" method="post" enctype="multipart/form-data" name="form" onSubmit="return checkForm(this.name); return true;">
              <? if ($erro!="") { ?>
              <div>
			  <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                    <td align="center" valign="middle"><font color="#993300"> 
                      <? 
				  echo $erro;

				  ?>
                      </font></td>
                </tr>
              </table>
			  </div> <br><? } ?>
             <div>
			 <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td align="left" valign="top"><table width="100%" border="0" cellpadding="3" cellspacing="0" class="txt">
                      <tr align="center" valign="middle" class="tdBiblioteca"> 
                          <td height="24" colspan="4" class="txtBold"><? echo $txContribuidor; ?></td>
                      </tr>
                      <tr class="txt"> 
                        <td width="12%" class="txtBold"><? echo $txNome; ?></td>
                        <td colspan="3"> <input name="pfNome" type="text" class="req" id="pfNome" value="<?echo $pfNome;?>" size="50" maxlength="100"> 
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txCitacao; ?></td>
                        <td colspan="3"> <input name="pfCitacao" type="text" class="input" id="pfCitacao2" value="<?echo $pfCitacao;?>" size="40" maxlength="100"> 
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><a href="<? echo $linkLattes; ?>" target="_blank"><? echo $txLattes; ?></a> 
                        </td>
                        <td colspan="3"> <input name="pfLattes" type="text" class="input" id="pfLattes2" value="<?echo $pfLattes;?>" size="50" maxlength="150"> 
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txCPF; ?></td>
                        <td width="33%">	<? $qtdcpfcampo=$qtdCPF+1;
						  if ($idioma_sistema=="pt-br") {
						   if ($CPFMascara=="Sim") {
						  $imputCPF='<input name="pfCPF" type="text" class="cpf" value="'.$pfCPF.'" size="'.$qtdcpfcampo.'" maxlength="'.$qtdCPF.'" onkeypress="CPF(this);">';
						  } else {
						  $imputCPF='<input name="pfCPF" type="text" class="cpf" value="'.$pfCPF.'" size="'.$qtdcpfcampo.'" maxlength="'.$qtdCPF.'">';
						  
						  } }else {
						   if ($CPFMascara=="Sim") {
						  $imputCPF='<input name="pfCPF" type="text" class="req" value="'.$pfCPF.'" size="'.$qtdcpfcampo.'" maxlength="'.$qtdCPF.'" onkeypress="CPF(this);">';
						  } else {
						  $imputCPF='<input name="pfCPF" type="text" class="req" value="'.$pfCPF.'" size="'.$qtdcpfcampo.'" maxlength="'.$qtdCPF.'">';
						  
						  }
						  }
						  echo $imputCPF;
						  ?>
</td>
                        <td width="7%"><input name="pfEstrangeiro" type="checkbox" id="pfEstrangeiro" value="Sim" <? if ($pfEstrangeiro!="") { ?> checked <? }?>  class="radio" onChange="optional(this.form,this,this.form.pfCPF);" onBlur="optional(this.form,this,this.form.pfCPF);"></td>
                          <td width="48%"><? echo $txEstrangeiroSemCPF; ?></td>
                      </tr>
                      <tr class="txt"> 
                        <td bgcolor="#FFFFFF" class="txtBold"><? echo $txEMail; ?></td>
                          <td colspan="3" bgcolor="#FFFFFF"><? echo $txExemplo; ?>: 
                            a@a.br, b@seuprovedor.com.br<br> 
                          <input name="pfEmail" type="text" class="input" id="pfEmail2" value="<?echo $pfEmail;?>" size="40" maxlength="100"></td>
                      </tr>
                      <tr class="txt"> 
                        <td>&nbsp;</td>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr align="center" valign="middle" class="tdBiblioteca"> 
                        <td colspan="4" class="txtBold"><? echo $txAfiliacao; ?></td>
                      </tr>
                      <tr class="txt"> 
                        <td colspan="4"><select name="SpjCod" onChange="submit()">
                            <option value="">Selecionar</option>
                            <? $SEL_pj="SELECT * FROM PessoaJuridica WHERE pjAfiliacao='1' ORDER BY pjNome";
$SEL_pj_query=mysql_db_query($base,$SEL_pj,$conexao);
$SEL_pj_RES=mysql_fetch_array($SEL_pj_query);
				while ($SEL_pj_RES!="") {
				$pjCod=$SEL_pj_RES["pjCod"];
				$ApjNome=$SEL_pj_RES["pjNome"];
											?>
                            <option value="<?echo $pjCod;?>"><?echo $ApjNome;?></option>
                            <?
				 $SEL_pj_RES=mysql_fetch_array($SEL_pj_query); }
				 ?>
                            <option value="Nenhum" <? if ($SpjCod=="Nenhum") { echo "Selected"; }?>>Nenhum acima</option>
							<option value="SemAfiliacao" <? if ($SpjCod=="SemAfiliacao") { echo "Selected"; }?> class="txtBold">Sem afilia��o</option>
                          </select></td>
                      </tr>
                      <? if ($SpjCod!="" and $SpjCod!="SemAfiliacao") { 
				if ($SpjCod!="Nenhum") {
				$SEL_pj1="SELECT * FROM PessoaJuridica WHERE pjCod=$SpjCod";
$SEL_pj1_query=mysql_db_query($base,$SEL_pj1,$conexao);
$SEL_pj1_RES=mysql_fetch_array($SEL_pj1_query);
				
				$pjCod=$SEL_pj1_RES["pjCod"];
				$pjNome=$SEL_pj1_RES["pjNome"];
				$pjSigla=$SEL_pj1_RES["pjSigla"];
				$pjPais=$SEL_pj1_RES["pjPais"];
				$pjUF=$SEL_pj1_RES["pjUF"];
				$pjCNPJ=$SEL_pj1_RES["pjCNPJ"];
				$pjURL=$SEL_pj1_RES["pjURL"];
				}?>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txNome; ?></td>
                        <td colspan="3"> 
                          <? if ($SpjCod!="Nenhum") { echo  $pjNome; ?>
                          <input name="pjCod" type="hidden" class="input" value="<?echo $pjCod;?>"> 
                          <? } else { ?>
                          <input name="pjNome" type="text" class="req" id="pjNome" value="<? echo $pjNome; ?>" size="50" maxlength="100"> 
                          <? } ?>
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txSigla; ?></td>
                        <td colspan="3"> 
                          <? if ($SpjCod!="Nenhum") { echo  $pjSigla; } else { ?>
                          <input name="pjSigla" type="text" class="input" id="pjSigla" value="<? echo $pjSigla; ?>" size="32" maxlength="30"> 
                          <? } ?>
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txPais; ?></td>
                          <td colspan="3"> 
                            <? if ($SpjCod!="Nenhum") { 
						  
						  $SEL_ps="SELECT * FROM Pais WHERE psSigla='$pjPais'";
						   $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
						   $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
				
						   $pjPais=$SEL_ps_RES["psNome"];
						  
						  echo  $pjPais; } else { ?>
                            <select name="pjPais" class="select" onChange="submit()">
                              <?
							 
							  require "../conexao/conexao_fim.inc";
							$SEL_psin="SELECT inPais FROM Instituicao";
                            $SEL_psin_query=mysql_db_query($base_fim,$SEL_psin,$conexao_fim);
                            $SEL_psin_RES=mysql_fetch_array($SEL_psin_query);
							 $inPais=$SEL_psin_RES['inPais'];
					        
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='$idioma_sistema' ORDER BY psNome";
                            $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
							
							while ($SEL_ps_RES!="") {
							$psSigla=$SEL_ps_RES["psSigla"];
							$psNome=$SEL_ps_RES["psNome"];
							?>
                              <option value="<? echo $psSigla; ?>" <? if (($psSigla==$inPais and   $pjPais=="") or $psSigla==$pjPais) { echo "selected"; } ?>><? echo $psNome; ?></option>
                              <?
						   $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						   }
						   ?>
                            </select> 
                            <? } ?>
                          </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txUF; ?></td>
                          <td colspan="3"> 
                            <? if ($SpjCod!="Nenhum") { echo  $pjUF; } else { 
							if ($pjPais=="") {
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$inPais'"; } else{
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$pjPais'";
							}
							$SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						$psCod=$SEL_ps_RES['psCod'];
							?>
                            <select name="pjUF" class="input">
                              <option value="" selected><? echo $txSelecionar; ?></option>
                              <?						
							$SEL_uf="SELECT * FROM UnidadeFederativa WHERE psCod='$psCod' ORDER BY ufNome";
                            $SEL_uf_query=mysql_db_query($base,$SEL_uf,$conexao);
                            $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);						
														
							while ($SEL_uf_RES!="") {
							$ufSigla=$SEL_uf_RES["ufSigla"];
							$ufNome=$SEL_uf_RES["ufNome"];
							?>
                              <option value="<? echo $ufSigla; ?>" <? if ($ufSigla==$inUF) { echo "selected"; } ?>><? echo $ufNome; ?></option>
                              <?
						   $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);
						   }
						   ?>
                              <option value="-"><? echo $txNenhumaAcima; ?></option>
                            </select> 
                            <? } ?>
                          </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txCNPJ; ?></td>
                        <td colspan="3"> 
                          <? if ($SpjCod!="Nenhum") { echo  $pjCNPJ; } else { 
						   $qtdCNPJcampo=$qtdCNPJ+1;
						  if ($idioma_sistema=="pt-BR") {
						   if ($CNPJMascara=="Sim") {
						  $imputCNPJ='<input name="pjCNPJ" type="text" class="cnpj" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'" onkeypress="CNPJ(this);">';
						  } else {
						  $imputCNPJ='<input name="pjCNPJ" type="text" class="CNPJ" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'">';
						  
						  } }else {
						   if ($CNPJMascara=="Sim") {
						  $imputCNPJ='<input name="pjCNPJ" type="text" class="req" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'" onkeypress="CNPJ(this);">';
						  } else {
						  $imputCNPJ='<input name="pjCNPJ" type="text" class="req" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'">';
						  
						  }
						  }
						  echo $imputCNPJ;
						   } ?>
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txURL; ?></td>
                        <td colspan="3"> 
                          <? if ($SpjCod!="Nenhum") { echo  $pjURL; } else { ?>
                          <input name="pjURL" type="text" class="input" id="pjURL" value="<? echo $pjURL; ?>" size="40" maxlength="150"> 
                          <? } ?>
                        </td>
                      </tr>
                      <? } ?>
                    </table></td>
                </tr>
                <tr> 
                  <td align="right" valign="bottom"> <input name="cod" type="hidden" class="input" value="Inserir"> 
                    <input name="Inserir" type="submit" class="botao" value="<? echo $txInserir; ?> &raquo;"> 
                  </td>
                </tr>
              </table>
			  </div>
              <br>
          </form></td>
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