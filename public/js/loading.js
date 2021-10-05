/**
 * loading.js
 * ローディングアニメーションをつくろう
****************************************/

// DOMContentLoaded（HTMLが読み込み終わった時に発火）
window.addEventListener('DOMContentLoaded', ondcl);

// load（JavaScript、CSS、画像などが読み込み終わった時に発火）
window.addEventListener('load', onload);

// DOMContentLoadedの時に呼び出す
function ondcl() {
  console.log('DOMが読み込まれました!');
  // 10秒経ったら問答無用でローディングスクリーンを解除する
  setTimeout(unvailLoadingScreen, 10 * 1000);
}

// loadの時に呼び出す
function onload() {
  console.log('画像がロードされました！');

  // 画像が読み込まれたらローディングスクリーンを解除する
  unvailLoadingScreen();

}

// ローディングスクリーンを解除する関数
function unvailLoadingScreen() {

  // ローディングスクリーンを変数に保存する
  const loading = document.getElementById('loadingScreen');
  // ローディングスクリーンの存在を確認する（エラー回避のため）
  if (!loading) return;
  // ローディングスクリーンにis-loadedクラスを付与する
  loading.classList.add('is-loaded');

}

// ここから下はteam.jsの部分でこの部分があると動かないのでこっちに避難

/******/ (() => { // webpackBootstrap
  var __webpack_exports__ = {};
  /*!******************************!*\
    !*** ./resources/js/team.js ***!
    \******************************/
  //ローディング画面
  //テキストのカウントアップの設定
  var bar = new ProgressBar.Line(splash_text, {
    //id名を指定
    strokeWidth: 0,
    //進捗ゲージの太さ
    duration: 1000,
    //時間指定(1000＝1秒)
    trailWidth: 0,
    //線の太さ
    text: {
      //テキストの形状を直接指定	
      style: {
        //天地中央に配置
        position: 'absolute',
        left: '50%',
        top: '50%',
        padding: '0',
        margin: '0',
        transform: 'translate(-50%,-50%)',
        'font-size': '1.2rem',
        color: '#fff'
      },
      autoStyleContainer: false //自動付与のスタイルを切る

    },
    step: function step(state, bar) {
      bar.setText(Math.round(bar.value() * 100) + ' %'); //テキストの数値
    }
  }); //アニメーションスタート

  bar.animate(1.0, function () {
    //バーを描画する割合を指定します 1.0 なら100%まで描画します
    $("#splash").delay(500).fadeOut(800); //アニメーションが終わったら#splashエリアをフェードアウト
  }); //アコーディオンメニューjs
  //$(function(){
  //    $("#acMenu2 dt").on("click", function() {
  //      $(this).next().slideToggle();
  //      $(this).toggleClass("active");
  //    });

});
