function changePic(title,pic) {
    var o=document.getElementById("pic");
    var s="images/medium/"+pic+".jpg";
    o.src=s;
    document.getElementById("fig").innerText=title;

}
function move() {

document.getElementById("fig").style.cssText= "    -webkit-animation-name: fadeIn;-webkit-animation-duration: 1s;";

}
function move2() {
    document.getElementById("fig").style.cssText= "    -webkit-animation-name: fadeOut;-webkit-animation-duration: 1s;";

}
