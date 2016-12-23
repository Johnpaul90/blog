$(document).ready(function(){
	$('.jumbotron h1').animate({

        padding: '20px',

        borderBottom: '3px solid #8f8f8f',

        borderRight: '3px solid #bfbfbf'

    }, 3000);
    /********
     *******/


$('#title > div').hide();
    $('#title > div:first').show();
    $('#title h3').click(function() {
        $(this).next().animate({
            'height':'toggle'
        }, 'slow', 'easeOutBounce');
    });
    /********
     *******/

  $('.collapse li').hover(function(){
    $(this).animate({
      paddingLeft: '+=15px'
    }, 200);
  }, function(){
    $(this).animate({
      paddingLeft: '-=15px'
    }, 200);
  });

    /****
     $(window).scroll(function() {
        $('.navbar')
            .stop()
            .animate({top: $(document).scrollTop()},'slow','easeOutBack');
    });

     */

    $('a[href=\\#]').click(function(e) {
        $.scrollTo(0,'slow');
        e.preventDefault()
    });

    $('#fine_print').jScrollPane({
        scrollbarWidth: 10,
        scrollbarMargin: 10,
        showArrows: false
    });
});
