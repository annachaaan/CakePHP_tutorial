$(function(){
    var duration = 300;//スライドの速さ
    var $aside = $('.btn-wrapper .bnrL');//バナーの指定
    $aside.on('mouseover',function(){//マウスオーバーした場合
        $aside.toggleClass('open');
            $aside.stop(true).animate({
                left: '0px'
            },duration);
    }).on('mouseout',function(){//マウスアウトした場合
        $aside.toggleClass('open');
            $aside.stop(true).animate({
                left: '-300px'
            },duration);
    });
});
