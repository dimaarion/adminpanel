$(document).ready(function() {
 bsCustomFileInput.init();
 
    $('#images').append('<div class = "col img"><img></div>');
    $('.img').css({position:'absolute'});
    $('.img img').css({ height: '0px', maxWidth:'0%' });
   $('.images_block img').click(function(e) {
       $('.img img').attr('src', e.target.src );  
       $('.img').css({
           margin:'auto',
           top:'0px',
           left:'0px',
           right:'0px',
           bottom:'0px',
           position: 'absolute',
           zIndex:8000
        });
       $('.img img').css({maxWidth:'100%', height:'800px', transition: '1s'});
       $('body div').eq(0).append('<div id = "fonimg"></div>')
       
       $('#fonimg').css({
           width:'100%',
           height:'100%',
           position: 'absolute',
           top: '0px',
           left: '0px',
           right: '0px',
           bottom: '0px',
           margin: 'auto',
           backgroundColor:'#000',
           opacity:0.9,
           zIndex: 5000
       })
   }) 
 
});

