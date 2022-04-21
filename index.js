



function FadeContribute(event) {
    console.log("attempting contribute fade");
    var div = document.getElementById("signup");
    var target = document.getElementById("contribute");
    div.onclick = fadeIn(target);

}


function fadeInContribute() {
    console.log("attempting contribute fade");
   
    target = document.getElementById("contribute");
    var op = 0.1;  // initial opacity
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        target.style.opacity = op;
       
        op += 0.1;
    }, 10);
    //fadeInContributeButton();

}

function fadeInContributeButton() {
    console.log("attempting contribute fade");
   
    target = document.getElementById("ContributeButton");
    var op = 0.1;  // initial opacity
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        target.style.opacity = op;
       
        op += 0.1;
    }, 10);
}