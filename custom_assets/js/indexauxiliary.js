function changeScene() {
    var input1 = document.getElementById("scene-1");
    var input2 = document.getElementById("scene-2");
    var input3 = document.getElementById("scene-3");
    var input4 = document.getElementById("scene-4");
    var topbackground = document.getElementById("topbackground");
    if (input1.checked == true) {
        input1.checked = false;
        input2.checked = true;
        topbackground.classList.remove("landscape");
        topbackground.classList.add("landscape2");
    } else if (input2.checked == true) {
        input2.checked = false;
        input3.checked = true;
        topbackground.classList.remove("landscape2");
        topbackground.classList.add("landscape3");
    } else if (input3.checked == true) {
        input3.checked = false;
        input4.checked = true;
        topbackground.classList.remove("landscape3");
        topbackground.classList.add("landscape4");
    } else {
        input4.checked = false;
        input1.checked = true;
        topbackground.classList.remove("landscape4");
        topbackground.classList.add("landscape");
    }
}