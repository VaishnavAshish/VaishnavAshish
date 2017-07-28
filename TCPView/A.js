importPackage(java.io);
importPackage(java.lang);
importPackage(java.math);
importPackage(java.util);

var sc = new Scanner(System['in']);

// var Base = sc.nextInt();
// var N = sc.nextInt();

var Base = 10;
var N = 4;

var num = 0;
var start = 0;

// if (N >= 4) { start = 510; }
// if (N >= 5) { start = 131052; }


while (num <= N) {
    start++;
    if (num == N) {
        if (checkNiven(start)) { num = 0 }
        else { found(start - N); break; }
    }
    if (checkNiven(start)) { num++ }
    else { num = 0; }
}

function checkNiven(nu) {
    var number = "" + nu + "";
    var nuArr = number.split("");
    var sum = 0;
    for (var i = 0; i < nuArr.length; i++) {
        sum += parseInt(nuArr[i]);
    }
    var divideBy = parseInt(sum, Base);
    if (nu % divideBy == 0) { return true; } else return false;
}

function found(nu) {
    for (var i = nu; i < nu + N; i++) {
        print(i);
    }
}


