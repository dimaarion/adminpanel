
$(document).ready(function () {
    bsCustomFileInput.init();



let color = {
    solid:3,
    colorH:'#cccccc',
    colorO:'rgb(130, 122, 122)'
}

    $('.images').css({cursor:'pointer'});
    $('.img').css({position: 'absolute' });
    $('.images_block').css({ display: 'flex' });
    $('.img img').css({ height: '0px', maxWidth: '0%', transition: '1s' });

    // открыть фото
    $('.images_block img').click(function (e) {
        $('#images').append('<div class = "col img row"></div>');
        $('.img').append('<div class = "col imgstleft"></div>');
        $('.imgstleft').append('<div class = "col imgleftstkr"></div>');
        $('.img').append('<div class = "col images_row"></div>');
        $('.images_row').append('<div class = "col imgdescriptzum mb-3">' + e.target.src +'</div>');
        $('.images_row').append('<img id = "imgZum">');
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


        $('.images_block').css({ display: 'none' });
        $('.imgstright').append('<div class = "col row" id = "footbarimg"></div>');
        $('.img-fluid').map(function (x) {$('#footbarimg').append('<div class = "col-2 imgFootBl p-0 mr-1"><img src = "' + $('.img-fluid').eq(x).attr('src') + '"class = "footerBarIcon"></div>')});
        $('.imgFootBl').map(function (x) {$('.imgFootBl').eq(x).css({border:'solid '+ color.solid +'px '+ color.colorO +''})})
        function imgRight(solid, colorH, colorO) {
            let n = -1;

            $('#svgright').click(function(e) {
            n = n + 1
                if($('.img-fluid').length == n){
                    n = -1;
                }

                $('#imgZum').attr('src',$('.img-fluid').eq(n).attr('src'));
                $('.imgdescriptzum').text($('.img-fluid').eq(n).attr('src'));
                 $('.imgFootBl').map(function (x) {
                    $('.imgFootBl').eq(x).css({border:'solid '+ color.solid +'px '+ color.colorO +''});
     })
                         $('.imgFootBl').eq(n).css({
                    border:'solid '+ color.solid +'px '+ color.colorH +''
                });
                if($('.imgFootBl').eq(n - 1) !== undefined){
                    $('.imgFootBl').eq(n - 1).css({
                    border:'solid '+ color.solid +'px '+ color.colorO +''
                });
                }


            });

        }

        function imgLeft(solid, colorH, colorO) {
            let n = $('.img-fluid').length;

            $('#svgleft').click(function(e) {
            n = n - 1
                if(n == -1){
                    n = $('.img-fluid').length;
                }

                $('#imgZum').attr('src',$('.img-fluid').eq(n).attr('src'));
                $('.imgdescriptzum').text($('.img-fluid').eq(n).attr('src'));
                $('.imgFootBl').map(function (x) {
                $('.imgFootBl').eq(x).css({border:'solid '+ color.solid +'px '+ color.colorO +''});
     })
                 $('.imgFootBl').eq(n).css({
                    border:'solid '+ color.solid +'px '+ color.colorH +''
                });
                    if($('.imgFootBl').eq(n + 1) !== undefined){
                    $('.imgFootBl').eq(n + 1).css({
                    border:'solid '+ color.solid +'px '+ color.colorO +''
                });
                }
            });

        }


 function imgIcon(solid, colorH, colorO) {
        $('.imgFootBl').click(function(e) {
        $('#imgZum').attr('src',e.target.src);
        $('.imgdescriptzum').text(e.target.src);
        $('.imgFootBl').map(function (x) {$('.imgFootBl').eq(x).css({border:'solid '+ color.solid +'px '+ color.colorO +''})})
        $(this).css({border:'solid '+ color.solid +'px '+ color.colorH +''})});
}






        imgRight(color);
        imgLeft(color);
        imgIcon(color);
// закрыть фото
$('.closeimg').click(function (e) {
                $('.img').remove();
                $('#fonimg').remove();
                $('#footbarimg').remove();
                $('.images_block').css({ display: 'flex' });

    });
//
    });

//
//

 });


