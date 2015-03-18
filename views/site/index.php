<?php

/**
 * @var $projects \app\models\Project[]
 * @var $this yii\web\View
 */

use \yii\helpers\Html;
use \yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div ng-controller="Projects">
    <div class="row" ng-repeat="project in projects">
        <div data-class="project"
             class="project col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3"
             data-id="{{projectId}}">
            <div class="project-header bg-primary">
                <div class="glyphicon glyphicon-list-alt project-icon"></div>
                <div class="project-title">
                    <span class="project-title-container">
                        {{project.title}}
                    </span>
                    <span class="change-title-container" hidden>
                        <input type="text" ng-model="project.title"
                               value="{{project.title}}"
                               style="color: black">
                    </span>
                </div>
                <div class="project-controls pull-right" role="controls">
                    <div class="controls-edit-project">
                        <a href="#">
                            <span class="glyphicon glyphicon-pencil edit-project"></span>
                        </a> |
                        <a href="#"
                           ng-click="delete(project)"
                           onclick="return false;"
                           class="delete-project">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </div>
                    <div class="controls-confirm-project" hidden>
                        <a href="#" ng-click="edit(project)">
                            <span class="glyphicon glyphicon-ok confirm-project"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="project-creator">
                <div class="add-task">
                    <a href="#" role="controls">
                        <span class="glyphicon glyphicon-plus add-task-icon"></span>
                    </a>
                </div>
                <div class="task-input">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control"
                               ng-model="project.newTaskText">
                        <span class="input-group-btn">
                            <button class="btn btn-success"
                                    ng-click="addTask(project)"
                                    type="button">
                                Add Task
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="tasks">
                <div class="fields"></div>
                <table class="tasks-table table">
                    <tbody ui-sortable="sortableOptions" ng-model="project.tasks" auto-save>
                        <tr class="task" ng-repeat="task in project.tasks" auto-save>
                            <td class="checkbox-container">
                                <input type="checkbox"
                                    class="done-checkbox"
                                    ng-checked="task.done"
                                    ng-model="task.done"
                                    ng-click="changeTask(task)">
                            </td>
                            <td>
                                <div class="task-text">{{task.text}}</div>
                                <input type="text" class="task-text-input" hidden
                                       ng-model="task.text"
                                       value="{{task.text}}"
                                       ng-change="editTask(task)">
                            </td>
                            <td class="task-controls" role="controls">
                                <div class="controls-edit">
                                    <a href="#">
                                        <span class="glyphicon glyphicon-resize-vertical change-priority"></span>
                                    </a> |
                                    <a href="#">
                                        <span class="glyphicon glyphicon-pencil edit-task"></span>
                                    </a> |
                                    <a href="#" ng-click="deleteTask(task)">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </div>
                                <div class="controls-confirm" style="text-align: center" hidden>
                                    <a href="#" class="confirm-edit" ng-click="confirmEditTask(task)">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </a>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="add-project-container">
            <button ng-click="add()" data-url="<?=Url::to(['/project'])?>" class="add-project btn btn-primary">Add TODO list</button>
        </div>
    </div>
</div>

<? $this->registerJsFile('/js/app/app.js')?>
<? $this->registerJsFile('/js/script.js')?>