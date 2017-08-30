angular.module("adminPanel", [])
    .controller("subtopicADDCtrl", function ($http, $q) {
        var subtopic = this;
        subtopic.showFolder = false;

        subtopic.fetchTopic = function (selectedCategory, type) {
            var defer = $q.defer();
            subtopic.topic = [];
            subtopic.topictext = "PLease Wait...";
            var req = {
                url: "http://localhost/VaishnavAshish/superadmin/API/getTopics.php",
                method: "POST",
                data: { categoryID: selectedCategory }
            };
            if (type) { req.data.type = type; }
            console.log(req);
            $http(req).then(function (response) {
                subtopic.topic = response.data;
                if (response.data.length == 0) { subtopic.topictext = "No data To Display"; }
                else { subtopic.topictext = "Please Select"; }
                defer.resolve(response.data);
            })
            return defer.promise;
        }

        subtopic.nextFetch = function (data, type) {
            if (data[2] == 'Folder') {
                subtopic.fetchFolder(data[1], type);
                subtopic.showFolder = true;
            } else {
                subtopic.fetchSubtopic(data[1], type);
                subtopic.showFolder = false;
            }
        }

        subtopic.fetchSubtopic = function (selectedID, type) {
            var defer = $q.defer();
            subtopic.subtopic = [];
            subtopic.subtopictext = "PLease Wait...";
            var req = {
                url: "http://localhost/VaishnavAshish/superadmin/API/getSubTopic.php",
                method: "POST",
                data: { folderID: selectedID }
            };
            if (type) { req.data.type = type; }
            $http(req).then(function (response) {
                subtopic.subtopic = response.data;
                if (response.data.length == 0) { subtopic.subtopictext = "No data To Display"; }
                else { subtopic.subtopictext = "Please Select"; }
                defer.resolve(response.data);
            })
            return defer.promise;
        }

        subtopic.fetchFolder = function (selectedID, type) {
            var defer = $q.defer();
            subtopic.folder = [];
            subtopic.foldertext = "PLease Wait...";
            var req = {
                url: "http://localhost/VaishnavAshish/superadmin/API/getFolder.php",
                method: "POST",
                data: { topicID: selectedID }
            };
            if (type) { req.data.type = type; }
            $http(req).then(function (response) {
                subtopic.folder = response.data;
                if (response.data.length == 0) { subtopic.foldertext = "No data To Display"; }
                else { subtopic.foldertext = "Please Select"; }
                defer.resolve(response.data);
            })
            return defer.promise;
        }
    })