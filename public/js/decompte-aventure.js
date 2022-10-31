var deadline = new Date("Dec 5, 2022 08:00:00").getTime();
var x = setInterval(function() {
var now = new Date().getTime();
var t = deadline - now;
var days = Math.floor(t / (1000 * 60 * 60 * 24));
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((t % (1000 * 60)) / 1000);
document.getElementById("jours").innerHTML = days
document.getElementById('heures').innerHTML = hours
document.getElementById('minutes').innerHTML = minutes
document.getElementById('secondes').innerHTML = seconds;
    if (t < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Temps terminé !";
    }
}, 1000);