angular.module("test",[])
    .controller("testCtrl",function($http,$timeout,$window){
        var test=this;
            test.resultView='instructions';
            test.resultArr=[];
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
        test.startTest=function(){
            test.resultView="test";
        }
        test.checkAnswer=function(result,index){
            test.resultArr[index]=result;
           // console.log(test.resultArr);
        }

        test.showResult=function(){
            var un=0;
            var correct=0;
            var wrong=0;

            for(var i=0;i<test.data.length;i++)
            {
                if(test.resultArr[i]==null){
                    un++;
                }else if(test.resultArr[i]){
                    correct++
                }else {
                    wrong++;
                }
            }
            test.resultView="result";
            test.correstCount=correct;
            test.wrongCount=wrong;
			test.UnCount=un;
            //Scroll to the Result
            $window.scrollTo(0, 0);
        }
        $http(config).then(
            function(success){
                test.data=success.data;
            }
        );

    })