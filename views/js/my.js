$(window).load(function() {
//королбокс на картинки вюхи proekti-all
  $("a.gallery").colorbox({maxWidth : 1024,maxHeight : 900,title: function(){
    var url = $(this).attr('href');
    return '<a href="' + url + '" target="_blank">Открыть в полном окне</a>';
  }});

//  $("a.form").colorbox();
});