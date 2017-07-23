angular.module("test",[])
    .controller("testCtrl",function($http,$timeout){
        var test=this;
        var params = window.location.search;
        var config={
            method: 'GET',
            url: 'angularTestFiles/testFetch.php'+params
        }

        test.toggel=function(d,q){
            if(!d[q]){
               d[q]=false;
            }
            $timeout(function(){d[q]=!d[q];},20); 
        }

        $http(config).then(
            function(success){
                test.data=success.data;
            }
        );

    })