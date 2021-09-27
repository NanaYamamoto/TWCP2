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