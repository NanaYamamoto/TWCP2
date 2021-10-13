
$(".openbtn").on('click', function () {
  //ボタンがクリックされたら
  $(this).toggleClass('active'); //ボタン自身に activeクラスを付与し

  $("#g-nav").toggleClass('panelactive'); //ナビゲーションにpanelactiveクラスを付与
});
$("#g-nav a").on('click', function () {
  //ナビゲーションのリンクがクリックされたら
  $(".openbtn").removeClass('active'); //ボタンの activeクラスを除去し

  $("#g-nav").removeClass('panelactive'); //ナビゲーションのpanelactiveクラスも除去
});


/*===========================================================*/
/* 機能編 5-1-1 ドロップダウンメニュー（上）*/
/*===========================================================*/

//ドロップダウンの設定を関数でまとめる
function mediaQueriesWin(){
	var width = $(window).width();
	if(width <= 960) {//横幅が960px以下の場合
		$(".has-child>a").off('click');	//has-childクラスがついたaタグのonイベントを複数登録を避ける為offにして一旦初期状態へ
		$(".has-child>a").on('click', function() {//has-childクラスがついたaタグをクリックしたら
			var parentElem =  $(this).parent();// aタグから見た親要素の<li>を取得し
			$(parentElem).toggleClass('active');//矢印方向を変えるためのクラス名を付与して
			$(parentElem).children('ul').stop().slideToggle(500);//liの子要素のスライドを開閉させる※数字が大きくなるほどゆっくり開く
			return false;//リンクの無効化
		});
	}else{//横幅が960px以上の場合
		$(".has-child>a").off('click');//has-childクラスがついたaタグのonイベントをoff(無効)にし
		$(".has-child>a").removeClass('active');//activeクラスを削除
		$('.has-child').children('ul').css("display","");//スライドトグルで動作したdisplayも無効化にする
	}
}

/*===========================================================*/
/* 機能編 5-1-6 スクロール途中から上部固定 */
/*===========================================================*/

//スクロール途中からヘッダーを出現させるための設定を関数でまとめる
function FixedAnime() {
	var elemTop = $('#service').offset().top;//#serviceの位置まできたら
	var scroll = $(window).scrollTop();

	if(scroll <= 20){//上から20pxスクロールされたら
		$('#header').addClass('DownMove');//DownMoveというクラス名を除き
	} else if (scroll >= elemTop){
			$('#header').removeClass('UpMove');//#headerについているUpMoveというクラス名を除く
			$('#header').addClass('DownMove');//#headerについているDownMoveというクラス名を付与

		}else{
			if($('#header').hasClass('DownMove')){//すでに#headerにDownMoveというクラス名がついていたら
				$('#header').removeClass('DownMove');//DownMoveというクラス名を除き
				$('#header').addClass('UpMove');//UpnMoveというクラス名を付与
			}
		}
}

/*===========================================================*/
/*機能編 5-4-1タブメニュー*/
/*===========================================================*/

//任意のタブにURLからリンクするための設定
function GethashID (hashIDName){
	if(hashIDName){
		//タブ設定
		$('.tab li').find('a').each(function() { //タブ内のaタグ全てを取得
			var idName = $(this).attr('href'); //タブ内のaタグのリンク名（例）#lunchの値を取得	
			if(idName == hashIDName){ //リンク元の指定されたURLのハッシュタグ（例）http://example.com/#lunch←この#の値とタブ内のリンク名（例）#lunchが同じかをチェック
				var parentElm = $(this).parent(); //タブ内のaタグの親要素（li）を取得
				$('.tab li').removeClass("active"); //タブ内のliについているactiveクラスを取り除き
				$(parentElm).addClass("active"); //リンク元の指定されたURLのハッシュタグとタブ内のリンク名が同じであれば、liにactiveクラスを追加
				//表示させるエリア設定
				$(".area").removeClass("is-active"); //もともとついているis-activeクラスを取り除き
				$(hashIDName).addClass("is-active"); //表示させたいエリアのタブリンク名をクリックしたら、表示エリアにis-activeクラスを追加	
			}
		});
	}
}

//タブをクリックしたら
$('.tab a').on('click', function() {
	var idName = $(this).attr('href'); //タブ内のリンク名を取得	
	GethashID (idName);//設定したタブの読み込みと
	return false;//aタグを無効にする
});


// 上記の動きをページが読み込まれたらすぐに動かす
$(window).on('load', function () {
    $('.tab li:first-of-type').addClass("active"); //最初のliにactiveクラスを追加
    $('.area:first-of-type').addClass("is-active"); //最初の.areaにis-activeクラスを追加
	var hashName = location.hash; //リンク元の指定されたURLのハッシュタグを取得
	GethashID (hashName);//設定したタブの読み込み
});

//タブをクリックしたら
$('.tab a').on('click', function() {
	var idName = $(this).attr('href'); //タブ内のリンク名を取得	
	GethashID (idName);//設定したタブの読み込みと
	return false;//aタグを無効にする
});

/*===========================================================*/
/* 機能編 7-2-2 虫眼鏡マークをクリックすると全画面表示で検索窓が出現 */
/*===========================================================*/

//開くボタンを押した時には
$(".open-btn").on('click', function () {
  $("#search-wrap").addClass('panelactive');//#search-wrapへpanelactiveクラスを付与
$('#search-text').focus();//テキスト入力のinputにフォーカス
});

//閉じるボタンを押した時には
$(".close-btn").on('click', function () {
  $("#search-wrap").removeClass('panelactive');//#search-wrapからpanelactiveクラスを除去
});

// 動きのきっかけの起点となるアニメーションの名前を定義
function fadeAnime(){

    // 印象編 4-9、4-10 背景色が伸びて出現（左から・右から）中の要素が出現
    $('.bgappearTrigger').each(function(){ //bgappearTriggerというクラス名が
		var elemPos = $(this).offset().top-50;//要素より、50px上の
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		if (scroll >= elemPos - windowHeight){
			$(this).addClass('bgappear');// 画面内に入ったらbgappearというクラス名を追記
		}else{
			$(this).removeClass('bgappear');// 画面外に出たらbgappearというクラス名を外す
		}
	});	
    //印象編 4-9 背景色が伸びて出現（左から）
	$('.bgLRextendTrigger').each(function(){ //bgLRextendTriggerというクラス名が
		var elemPos = $(this).offset().top-50;//要素より、50px上の
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		if (scroll >= elemPos - windowHeight){
			$(this).addClass('bgLRextend');// 画面内に入ったらbgLRextendというクラス名を追記
		}else{
			$(this).removeClass('bgLRextend');// 画面外に出たらbgLRextendというクラス名を外す
		}
	});	
    //印象編 4-9 背景色が伸びて出現（右から）
    $('.bgRLextendTrigger').each(function(){ //bgRLextendTriggerというクラス名が
		var elemPos = $(this).offset().top-50;//要素より、50px上の
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		if (scroll >= elemPos - windowHeight){
			$(this).addClass('bgRLextend');// 画面内に入ったらbgRLextendというクラス名を追記
		}else{
			$(this).removeClass('bgRLextend');// 画面外に出たらbgRLextendというクラス名を外す
		}
	});
}

$(window).on('scroll', function () {
	FixedAnime();// 機能編 5-1-6 スクロール途中から上部固定
	setFadeElement();// 機能編 8-1-4 ページの指定の範囲内で出現（右から左）の関数を呼ぶ
    fadeAnime();// 印象編 4 最低限おぼえておきたい動きの関数を呼ぶ
	TypingInit(); // 印象編 8-6 アルファベットがランダムに変化して出現 初期設定
	TypingAnime();// 印象編 8-6 アルファベットがランダムに変化して出現の関数を呼ぶ
});


$(window).on('load',function(){
  fadeAnime();   
});

//確認を促すモーダル

$(".inline").modaal();
$('.inline_close').click(function(){
  $('.inline').modaal('close');
});