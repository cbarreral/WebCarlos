var m = 0;
var s = 0;
var h = 0;
var total = document.getElementById("total");
var l = document.getElementById("mensaje");
var bntStop = document.getElementById("stopbnt");
var bntS = document.getElementById("startbnt");

bntS.onclick = function() {
    bntStop.onclick = function() {
        total.innerHTML = "tiempo total de usar el nevegador: " +
            h + ":" + m + ":" + s;
    }
    window.setInterval(function() {
        l.innerHTML = h + ":" + m + ":" + s;

        if (s == 6) {
            s = 0;
            m = m + 1;
            if (m % 2 == 0) {
                temp();
                if (m == 6) {
                    s = 0;
                    m = 0;
                    h = h + 1;
                }
            }
        }
        s++;
    }, 1000);

    function temp() {
        document.getElementById('alrt').innerHTML = '<b>espere porfavor a que terminen los 20 seg!!</b>';
        setTimeout(function() { document.getElementById('alrt').innerHTML = ''; }, 5000);
        alert("hora de estirar las piernas")
    }
}