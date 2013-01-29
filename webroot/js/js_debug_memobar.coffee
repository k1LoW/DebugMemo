$ ->
  handleHeight = 30
  $('#debug-memo-container').height(handleHeight)
  $('#debug-memo-handle').on 'click', ()->
    if $('#debug-memo-container').height() == handleHeight
      h = $(window).height() * 0.9
      $('#debug-memo-container').height(h)
      iframeHeight = h - handleHeight
      $('#debug-memo-iframe').height(iframeHeight)
    else
      $('#debug-memo-container').height(handleHeight)
      document.getElementById('debug-memo-iframe').contentDocument.location.reload(true);
    return

  # debug_memos/add
  h = $(window).height() - 150
  $('#debug-memo-textarea').height(h)
  $('#debug-memo-textarea').outerWidth($('#debug-memo-form').outerWidth())
  $(window).resize ()->
    h = $(window).height() - 150
    $('#debug-memo-textarea').height(h)
    return
  return
