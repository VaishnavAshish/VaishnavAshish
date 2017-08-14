angular.module("test", [])
    .controller("testCtrl", function ($http, $timeout, $window) {
        var test = this;
        test.resultView = 'instructions';
        test.resultArr = [];
        var params = window.location.search;
        init();
        function init() {
            var config = {
                method: 'GET',
                url: 'angularTestFiles/testFetch.php' + params
            }
            $http(config).then(
                function (success) {
                    test.data = success.data;
                }
            );
        }

        test.toggel = function (d, q) {
            if (!d[q]) {
                d[q] = false;
            }
            $timeout(function () { d[q] = !d[q]; }, 20);
        }
        test.startTest = function (hr, min, sec) {
            test.resultView = "test";
            timer(hr, min, sec);
        }
        test.checkAnswer = function (result, index) {
            test.resultArr[index] = result;
            // console.log(test.resultArr);
        }
        test.showResult = function () {
            test.stop = true;
            var un = 0;
            var correct = 0;
            var wrong = 0;

            for (var i = 0; i < test.data.length; i++) {
                if (test.resultArr[i] == null) {
                    un++;
                } else if (test.resultArr[i]) {
                    correct++
                } else {
                    wrong++;
                }
            }
            test.resultView = "result";
            test.correstCount = correct;
            test.wrongCount = wrong;
            test.UnCount = un;
            //Scroll to the Result
            $window.scrollTo(0, 0);
        }


        function timer(hr, min, sec) {
            if (test.stop != true) {
                if (parseInt(sec) > 0) {
                    sec = parseInt(sec) - 1;
                    document.getElementById("timer").innerHTML = "Time Left: " + hr + " Hr " + min + " Min " + sec + " Sec";
                    document.getElementById("title").innerHTML = hr + " Hr " + min + " Min " + sec + " Sec";
                    setTimeout(function () {
                        timer(hr, min, sec);
                    }, 1000);
                }
                else {
                    if (parseInt(sec) == 0) {
                        // min = parseInt(min) - 1;

                        if (parseInt(min) == 0 && parseInt(hr) > 0) {
                            hr = parseInt(hr) - 1;
                            min = 60;
                            sec = 60;
                            document.getElementById("timer").innerHTML = "Time Left: " + hr + " Hr " + min + " Min " + sec + " Sec";
                            document.getElementById("title").innerHTML = hr + " Hr " + min + " Min " + sec + " Sec";
                            setTimeout(function () {
                                timer(hr, min, sec);
                            }, 1000);
                        }

                        else if (parseInt(min) == 0 && parseInt(hr) == 0) {
                            alert("Timeout Click ok to submit");
                            setTimeout(function () {
                                test.showResult();
                            }, 1000);
                        }
                        else {
                            min = parseInt(min) - 1;
                            sec = 60;
                            document.getElementById("timer").innerHTML = "Time Left: " + hr + " Hr " + min + " Min " + sec + " Sec";
                            document.getElementById("title").innerHTML = hr + " Hr " + min + " Min " + sec + " Sec";
                            setTimeout(function () {
                                timer(hr, min, sec);
                            }, 1000);
                        }
                    }

                }
            }
        }

    })