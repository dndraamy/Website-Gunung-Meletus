var open = false;

document.getElementById("burgermenu").addEventListener('click', function(e) {
  var nr1 = document.getElementById("nr1");
  var nr2 = document.getElementById("nr2");
  var nr3 = document.getElementById("nr3");
  var menu = document.getElementById("menu");

  if(open === true) {
    open = false;
    menu.style.transform = "translateX(100%)";

    nr1.style.rotate = "0deg";
    nr1.style.transform = "translate3D(0px, 0px, 0)"; 
    nr1.style.width = "100%";

    nr2.style.opacity = "1";

    nr3.style.rotate = "0deg";
    nr3.style.transform = "translate3D(0px, 0px, 0)";
    nr3.style.width = "100%";
    
  } else {
    open = true;
    menu.style.transform = "translateX(0%)";

    nr1.style.rotate = "-45deg";
    nr1.style.transform = "translate3D(0px, 13px, 0)"; 
    nr1.style.width = "100%";

    nr2.style.opacity = "0";

    nr3.style.rotate = "45deg";
    nr3.style.transform = "translate3D(0px, -13px, 0)"; 
    nr3.style.width = "100%";
  }
});