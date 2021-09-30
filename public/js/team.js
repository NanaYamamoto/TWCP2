//ローディング画面
    //テキストのカウントアップの設定
    var bar = new ProgressBar.Line(splash_text, {//id名を指定
        strokeWidth: 0,//進捗ゲージの太さ
        duration: 1000,//時間指定(1000＝1秒)
        trailWidth: 0,//線の太さ
        text: {//テキストの形状を直接指定	
            style: {//天地中央に配置
                position:'absolute',
                left:'50%',
                top:'50%',
                padding:'0',
                margin:'0',
                transform:'translate(-50%,-50%)',
                'font-size':'1.2rem',
                color:'#fff',
            },
            autoStyleContainer: false //自動付与のスタイルを切る
        },
        step: function(state, bar) {
            bar.setText(Math.round(bar.value() * 100) + ' %'); //テキストの数値
        }
    });

    //アニメーションスタート
    bar.animate(1.0, function () {//バーを描画する割合を指定します 1.0 なら100%まで描画します
        $("#splash").delay(500).fadeOut(800);//アニメーションが終わったら#splashエリアをフェードアウト
    });  


//アコーディオンメニューjs
//$(function(){
//    $("#acMenu2 dt").on("click", function() {
//      $(this).next().slideToggle();
//      $(this).toggleClass("active");
//    });

$(".openbtn").click(function () {//ボタンがクリックされたら
    $(this).toggleClass('active');//ボタン自身に activeクラスを付与し
    $("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
    });

$("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
    $(".openbtn").removeClass('active');//ボタンの activeクラスを除去し
    $("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスも除去
    });
