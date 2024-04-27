function boxOpen() {
    document.getElementById("box").style.visibility = 'visible';
}

function boxClose() {
    document.getElementById("box").style.visibility = 'hidden';
}

let mode = '1';

function pass() {
    if (mode === '1') {

        mode1();

    } else if (mode === '2'){

        mode2();

    }
}

function mode1() {

    document.getElementById('passw').src = './assets/hide-passw.svg';
    document.getElementById('password').type = 'text';
    mode = '2';

}

function mode2() {

    document.getElementById('passw').src = './assets/show-passw.svg';
    document.getElementById('password').type = 'password';
    mode = '1';

}