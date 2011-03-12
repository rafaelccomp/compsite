<?php

/**
 * Cmspage form.
 *
 * @package    site
 * @subpackage form
 * @author     Your name here
 */
class CmspageForm extends BaseCmspageForm
{
  public function configure()
  {
    $this->setWidget('content', new sfWidgetFormTextareaTinyMCE(array(
    'width'  => 550,
    'height' => 350,
    'config' => 'theme_advanced_disable: "cleanup,help",
    file_browser_callback:"sfAssetsLibrary.fileBrowserCallBack",
    plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,autosave,advlist,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,wordcount",
    theme_advanced_buttons5_add : "pastetext,pasteword,selectall",
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,restoredraft,|,insertfile,insertimage",
    theme_advanced_buttons6_add : "media"',
    )));
  }
}
