angular.module('garage', ['ui.sortable'])
    .controller('Projects', function($scope, $http) {
        $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

        $http.get('/project?expand=tasks')
            .success(function(data, status, headers, config) {
                $scope.projects = data;
            });

        $scope.add = function() {
            $http.post('/project?expand=tasks', $.param({title: 'new'}))
                .success(function(data, status, headers, config) {
                    $scope.projects.push(data);
                });
        };

        $scope.delete = function(project) {
            $http.delete('/project/' + project.id)
                .success(function(data, status, headers, config) {
                    var index = $scope.projects.indexOf(project);

                    $scope.projects.splice(index, 1);
                });
        };

        $scope.edit = function(project) {
            $http.patch('/project/' + project.id, $.param(project))
                .success(function(data, status, headers, config) {});
        };

        $scope.addTask = function(project) {
            $http.post('/task', $.param({
                project_id: project.id,
                text: project.newTaskText
            })).success(function(data, status, headers, config) {
                if (!project.hasOwnProperty('tasks'))
                    project.tasks = [];

                project.tasks.push(data);
            });

            project.newTaskText = null;
        };

        $scope.deleteTask = function(task) {
            $http.delete('/task/' + task.id)
                .success(function(data, status, headers, config) {
                    var project = findProject(task.project_id);
                    var index = project.tasks.indexOf(task);

                    project.tasks.splice(index, 1);
                });
        };

        $scope.changeTask = function(task) {
            task.done = task.done ? 1 : 0;
            $http.patch('/task/' + task.id, $.param(task))
                .success(function(data, status, headers, config) {});
        };

        $scope.confirmEditTask = function(task) {
            $http.patch('/task/' + task.id, $.param(task))
                .success(function(data, status, headers, config) {});
        };

        $scope.sortableOptions = {
            handle: '.change-priority',
            axis: 'y',
            stop: function(e, ui) {
                var model = ui.item.sortable.model;
                var project = findProject(model.project_id);

                for (var i=0, priority=0, task; i<project.tasks.length; i++) {
                    priority = i;
                    task = project.tasks[i];
                    project.tasks[i].priority = priority;

                    $http.patch('/task/' + task.id, $.param(task))
                        .success(function(data, status, headers, config) {});
                }
            }
        };

        function findProject(projectId) {
            for (var i=0; i<$scope.projects.length; i++) {
                if ($scope.projects[i].id == projectId) {
                    return $scope.projects[i];
                }
            }

            return false;
        }
});