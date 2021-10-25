/*===========================================================*/
/* ゆっくりズームアウトさせながら全画面で見せる*/
/*===========================================================*/

//画像の設定

var windowwidth = window.innerWidth || document.documentElement.clientWidth || 0;
if (windowwidth > 768) {
	var responsiveImage = [//PC用の画像
		{ src: ('./images/画像/家（日中）.jpg') },
		{ src: ('./images/画像/background.jpeg') },
		{ src: ('./images/画像/table.jpeg') },
	];
} else {
	var responsiveImage = [//タブレットサイズ（768px）以下用の画像
		{ src: ('./images/画像/家（日中）.jpg') },
		{ src: ('./images/画像/background.jpeg') },
		{ src: ('./images/画像/table.jpeg') },
	];
}

//Vegas全体の設定

$('#slider').vegas({
	overlay: 'https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/overlays/06.png',//画像の上に網線やドットのオーバーレイパターン画像を指定。
	transition: 'blur',//切り替わりのアニメーション。http://vegas.jaysalvat.com/documentation/transitions/参照。
	transitionDuration: 2000,//切り替わりのアニメーション時間をミリ秒単位で設定
	delay: 10000,//スライド間の遅延をミリ秒単位で。
	animationDuration: 20000,//スライドアニメーション時間をミリ秒単位で設定
	animation: 'kenburns',//スライドアニメーションの種類。http://vegas.jaysalvat.com/documentation/transitions/参照。
	slides: responsiveImage,//画像設定を読む
});


/*===========================================================*/
/* リンクをクリックすると、背景が暗くなり動画や画像やテキストを表示*/
/*===========================================================*/

//テキストを含む一般的なモーダル
$(".btn-view2").modaal({
	overlay_close: true,//モーダル背景クリック時に閉じるか
	before_open: function () {// モーダルが開く前に行う動作
		$('html').css('overflow-y', 'hidden');/*縦スクロールバーを出さない*/
		$.scrollify.disable();//scrollfyのプラグインを無効に
	},
	after_close: function () {// モーダルが閉じた後に行う動作
		$('html').css('overflow-y', 'scroll');/*縦スクロールバーを出す*/
		$.scrollify.enable();//scrollfyのプラグインを有効に
	}
});


/*===========================================================*/
/* サムネイルをクリックするとグループ化された画像一覧を表示する*/
/*===========================================================*/

//画像をクリックしたら現れる画面の設定	
$(".btn-view").modaal({
	fullscreen: 'true', //フルスクリーンモードにする
	before_open: function () {// モーダルが開く前に行う動作
		$('html').css('overflow-y', 'hidden');/*縦スクロールバーを出さない*/
		$.scrollify.disable();//scrollfyのプラグインを無効に
	},
	after_close: function () {// モーダルが閉じた後に行う動作
		$('html').css('overflow-y', 'scroll');/*縦スクロールバーを出す*/
		$.scrollify.enable();//scrollfyのプラグインを有効に
	}
});


/*===========================================================*/
/* スクロールすると1画面移動*/
/*===========================================================*/

$.scrollify({
	section: ".box",//1ページスクロールさせたいエリアクラス名
	scrollbars: "false",//スクロールバー表示・非表示設定
	interstitialSection: "#header",//ヘッダーを認識し、1ページスクロールさせず表示されるように設定
	easing: "swing", // 他にもlinearやeaseOutExpoといったjQueryのeasing指定可能
	scrollSpeed: 300, // スクロール時の速度

	//以下、ページネーション設定
	before: function (i, panels) {
		var ref = panels[i].attr("data-section-name");
		$(".pagination .active").removeClass("active");
		$(".pagination").find("a[href=\"#" + ref + "\"]").addClass("active");
	},
	afterRender: function () {
		var pagination = "<ul class=\"pagination\">";
		var activeClass = "";
		$(".box").each(function (i) {//1ページスクロールさせたいエリアクラス名を指定
			activeClass = "";
			if (i === $.scrollify.currentIndex()) {
				activeClass = "active";
			}
			pagination += "<li><a class=\"" + activeClass + "\" href=\"#" + $(this).attr("data-section-name") + "\"><span class=\"hover-text\">" + $(this).attr("data-section-name").charAt(0).toUpperCase() + $(this).attr("data-section-name").slice(1) + "</span></a></li>";
		});
		pagination += "</ul>";

		$("#box1").append(pagination);//はじめのエリアにページネーションを表示
		$(".pagination a").on("click", $.scrollify.move);
	}

});

/*===========================================================*/
/* 最低限おぼえておきたい動き*/
/*===========================================================*/

// 動きのきっかけの起点となるアニメーションの名前を定義
function fadeAnime() {
	// 4-6　じわっ（ぼかしから出現）

	$('.blurTrigger').each(function () { //blurTriggerというクラス名が
		var elemPos = $(this).offset().top - 50;//要素より、50px上の
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		if (scroll >= elemPos - windowHeight) {
			$(this).addClass('blur');// 画面内に入ったらblurというクラス名を追記
		} else {
			$(this).removeClass('blur');// 画面外に出たらblurというクラス名を外す
		}
	});
}

/*===========================================================*/
/* テキストが1文字づつ出現*/
/*===========================================================*/

// eachTextAnimeにappeartextというクラス名を付ける定義
function EachTextAnimeControl() {
	$('.eachTextAnime').each(function () {
		var elemPos = $(this).offset().top - 50;
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		if (scroll >= elemPos - windowHeight) {
			$(this).addClass("appeartext");

		} else {
			$(this).removeClass("appeartext");
		}
	});
}

/*===========================================================*/
/* 関数をまとめる*/
/*===========================================================*/

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
	EachTextAnimeControl();//印象編 8-11テキストが1文字づつ出現の関数を呼ぶ
	fadeAnime();//印象編 4 最低限おぼえておきたい動きの関数を呼ぶ
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load',function(){
    $("#splash-logo").delay(1200).fadeOut('slow');//ロゴを1.2秒でフェードアウトする記述
  
    //=====ここからローディングエリア（splashエリア）を1.5秒でフェードアウトした後に動かしたいJSをまとめる
    $("#splash").delay(1500).fadeOut('slow',function(){//ローディングエリア（splashエリア）を1.5秒でフェードアウトする記述
    
        $('body').addClass('appear');//フェードアウト後bodyにappearクラス付与
  
    });
    //=====ここまでローディングエリア（splashエリア）を1.5秒でフェードアウトした後に動かしたいJSをまとめる
    
   //=====ここから背景が伸びた後に動かしたいJSをまとめたい場合は
    $('.splashbg').on('animationend', function() {    
        //この中に動かしたいJSを記載
    });
    //=====ここまで背景が伸びた後に動かしたいJSをまとめる
        
});

//確認を促すモーダル

$(".inline").modaal();
$('.inline_close').on('click', function () {
	$('.inline').modaal('close');
});
$(".inline2").modaal();
$('.inline_close').on('click', function () {
	$('.inline2').modaal('close');
});

$('.slider_width').slick({
	autoplay: true,//自動的に動き出すか。初期値はfalse。
	infinite: true,//スライドをループさせるかどうか。初期値はtrue。
	speed: 500,//スライドのスピード。初期値は300。
	slidesToShow: 3,//スライドを画面に3枚見せる
	slidesToScroll: 1,//1回のスクロールで1枚の写真を移動して見せる
	prevArrow: '<div class="slick-prev"></div>',//矢印部分PreviewのHTMLを変更
	nextArrow: '<div class="slick-next"></div>',//矢印部分NextのHTMLを変更
	centerMode: true,//要素を中央ぞろえにする
	variableWidth: true,//幅の違う画像の高さを揃えて表示
	dots: true,//下部ドットナビゲーションの表示
});

// フッターボタン //
//スクロールした際の動きを関数でまとめる
function PageTopAnime() {
	var scroll = $(window).scrollTop();
	if (scroll >= 200) {//上から200pxスクロールしたら
		$('#page-top').removeClass('DownMove');//#page-topについているDownMoveというクラス名を除く
		$('#page-top').addClass('UpMove');//#page-topについているUpMoveというクラス名を付与
	} else {
		if ($('#page-top').hasClass('UpMove')) {//すでに#page-topにUpMoveというクラス名がついていたら
			$('#page-top').removeClass('UpMove');//UpMoveというクラス名を除き
			$('#page-top').addClass('DownMove');//DownMoveというクラス名を#page-topに付与
		}
	}
}

// 画面をスクロールをしたら動かしたい場合の記述
$(window).on('scroll' ,function () {
	PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
	PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
});

// #page-topをクリックした際の設定
$('#page-top a').on('click' ,function () {
	$('body,html').animate({
		scrollTop: 0//ページトップまでスクロール
	}, 1000);//ページトップスクロールの速さ。数字が大きいほど遅くなる
	return false;//リンク自体の無効化
});