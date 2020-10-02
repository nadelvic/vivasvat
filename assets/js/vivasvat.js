
//TEST
var tl = gsap.timeline();

console.log('hello');

var open = false;
var d = .4;

//works !!
var burgerMenuButton = document.getElementById('burger-menu');
var mobileMenu = document.getElementById('mobile-menu');
burgerMenuButton.onclick = function(){
    if(open){
        console.log("closing");
        gsap.to("#burger-menu .line1", {rotation:0,y:0,duration:d});
        gsap.to("#burger-menu .line3", {rotation:0,y:0,duration:d});
        gsap.to("#burger-menu .line2", {opacity:1,duration:d});
        mobileMenu.style.display = "none";
        //mobileMenu.style.opacity = 1;
        open = false;

    } else {
        console.log("opening");
        gsap.to("#burger-menu .line1", {rotation:45,y:12.5,duration:d});
        gsap.to("#burger-menu .line3", {rotation:-45,y:-12.5,duration:d});
        gsap.to("#burger-menu .line2", {opacity:0,duration:d});
        mobileMenu.style.display = "block";
        open = true;
    }
}
//gsap.to(".quote-container", {rotation: 27, x: 100, duration: 1});















