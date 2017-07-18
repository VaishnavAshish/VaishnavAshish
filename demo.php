<!DOCTYPE HTML>
<html>
<head>
<style>
p {
  text-align: center;
  font-size: 60px;
}
</style>
</head>
<body>
<input type="time" name="timer">
<p id="demo"></p>

<script>
var d1 = new Date ();
var d2 = new Date ( d1 );
d2.setHours ( d1.getHours() + 2);
d2.setMinutes(d1.getMinutes() + 0);


// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
    
    // Find the difference between current time and the count down time
    var difference = d2 - now;
   
    // Time calculations for days, hours, minutes and seconds
   
    var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((difference % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (difference < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Time Out";
    }
}, 1000);
</script>

</body>
</html>