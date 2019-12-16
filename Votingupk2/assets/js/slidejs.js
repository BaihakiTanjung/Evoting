const observer = lozad();
(function startLozad() {
  observer.observe();
})();

//Uncomment this for Autoplay
/* 
(function autoPlay() {
  var slidesShown = 0;
  var slideInputs = document.querySelectorAll(".loSlide input");
  var autoplayInterval = setInterval(function () {
    slideInputs[++slidesShown % slideInputs.length].checked = true;
    if (slidesShown >= slideInputs.length * 3) clearInterval(autoplayInterval);
  }, 8000);

  [].forEach.call(slideInputs,function(e){e.addEventListener('click',function () {
    clearInterval(autoplayInterval);
  },false)})
})();
*/

//Uncomment this to preload images after window.onload
/*
window.onload = function imagePreload() {
  [].forEach.call(document.querySelectorAll(".loSlide picture.lozad"),function(e){observer.triggerLoad(e)})
}
*/