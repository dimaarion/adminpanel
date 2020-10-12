$(document).ready(function () {
    bsCustomFileInput.init();

   
   
    
    $('.images').css({cursor:'pointer'});
    $('.img').css({position: 'absolute' });
    $('.images_block').css({ display: 'flex' });
    $('.img img').css({ height: '0px', maxWidth: '0%', transition: '1s' });
    $('.images_block img').click(function (e) {
        $('#images').append('<div class = "col img row"></div>');
        $('.img').append('<div class = "col imgstleft"></div>');
        $('.imgstleft').append('<div class = "col imgleftstkr"></div>');
        $('.img').append('<div class = "col images_row"></div>');
        $('.images_row').append('<img>');
        $('.images_row').append('<div class = "col imgdescriptzum">' + e.target.src +'</div>');
        $('.img').append('<div class = "col imgstright"></div>');
        $('.imgstright').append('<div class = "col imgrigstkr"></div>');
        $('.imgrigstkr').append('<svg width="1em" height="1em" id="svgright" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d = "M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" /></svg>');
        $('.imgleftstkr').append('<svg width="1em" height="1em" id="svgleft" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d = "M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" /></svg >');
        $('.img img').attr('src', e.target.src);
        $(window).scrollTop(0);
        $('.imgdescriptzum').css({color:'#ffffff',fontSize:'18pt'});

       
       
        $('.img').css({
            margin: 'auto',
            top: '0px',
            left: '0px',
            right: '0px',
            bottom: '0px',
            position: 'fixed',
            zIndex: 8000,
            marginTop:'50px'

        });

        $('.img img').css({ width:'100%', transition: '1s' });
        $('body div').eq(0).append('<div id = "fonimg"></div>');
            $('#fonimg').css({
            width: '100%',
            height: '100%',
            position: 'absolute',
            top: '0px',
            left: '0px',
            right: '0px',
            bottom: '0px',
            margin: 'auto',
            backgroundColor: '#000',
            opacity: 0.8,
            zIndex: 5000
        });
        $('.imgrigstkr').append('<div class = "closeimg"></div>');
        $('.closeimg').append('<svg width="1em" id = "svgcloseimg" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d = "M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" /></svg>');
       /* $('.img .closeimg').css({
            zIndex: 10000,
            position:'absolute',
            border:'solid 1px #ffffff',
            borderRadius:'10px',
            color:'#ffffff',
            width:'28px',
            top:'0',
            right:'0',
            cursor:'pointer',
            marginTop:'-30px',
            paddingBottom:'2px'

        })*/

        $('.images_block').css({ display: 'none' });

        $('.closeimg').click(function (e) {
                $('.img').remove();
                $('#fonimg').remove();
                $('.images_block').css({ display: 'flex' });
                
    });

    });

});

