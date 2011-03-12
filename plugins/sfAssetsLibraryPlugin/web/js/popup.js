function setImageField(url, id)
{
  var win = null;
  url = '/sacc'+url;
  //url = '../../..'+url;
  if (typeof tinyMCEPopup != 'undefined')
  {
    var win = tinyMCEPopup.getWindowArg('window');
  }

  if (win)
  {
    if (tinyMCEPopup.getWindowArg("type") == 'image' && win.ImageDialog.showPreviewImage)
    {
      win.ImageDialog.showPreviewImage(url);
    }

    win.document.getElementById(tinyMCEPopup.getWindowArg('input')).value = url;
    tinyMCEPopup.close();
  }
  else
  {
    if (!opener)
    {
      opener = window.opener;
    }
    opener.sfAssetsLibrary.fileBrowserReturn(url, id);
    window.close();
  }
}

function addImageField(url, id)
{
  url = '/sacc'+ url;
  if (!opener)
  {
    opener = window.opener;
  }
  opener.sfAssetsLibrary.fileBrowserAdd(url, id);
}
