function doclear() {
    document.querySelector("#screen").value = "";
}

function doShow(digit) {
    document.querySelector("#screen").value = document.querySelector("#screen").value + digit;
}

function doResult() {
    var exp = document.querySelector("#screen").value;
    document.querySelector("#screen").value = eval(exp);
}

function doBack() {
    var screenRef = document.querySelector("#screen");
    var l = screenRef.value.length;
    screenRef.value = screenRef.value.substr(0, l - 1);
}
