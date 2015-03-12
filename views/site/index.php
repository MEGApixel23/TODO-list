<?php

/**
 * @var $projects \app\models\Project[]
 * @var $this yii\web\View
 */

use \yii\helpers\Html;
use \yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<? for ($i=0; $i<count($projects); $i++) : ?>
    <div class="row">
        <div data-class="project"
             class="project col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3"
             data-id="<?=$projects[$i]->id?>">
            <div class="project-header bg-primary">
                <div class="glyphicon glyphicon-list-alt project-icon"></div>
                <div class="project-title"><?=$projects[$i]->title?></div>
                <div class="project-controls pull-right">
                    <a href="#">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a> |
                    <a href="<?=Url::to(["/project/{$projects[$i]->id}"])?>" class="delete-project">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </div>
            </div>
            <div class="project-creator">
                <div class="add-task">
                    <a href="#">
                        <span class="glyphicon glyphicon-plus add-task-icon"></span>
                    </a>
                </div>
                <div class="task-input">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button">Add Task</button>
                            </span>
                    </div>
                </div>
            </div>
            <div class="tasks">
                <div class="fields"></div>
                <table class="tasks-table table">
                    <? for ($j=0; $j<count($projects[$i]->tasks); $j++) : ?>
                        <?php
                        $task = $projects[$i]->tasks[$j];
                        ?>
                        <tr class="task">
                            <td class="checkbox-container">
                                <?=Html::activeCheckbox($task, 'done', [
                                    'label' => null
                                ])?>
                            </td>
                            <td>
                                <?=$task->text?>
                            </td>
                            <td class="task-controls">
                                <a href="#">
                                        <span class="glyphicon
                                         glyphicon-resize-vertical"></span>
                                </a> |
                                <a href="#">
                                        <span class="glyphicon
                                        glyphicon-pencil"></span>
                                </a> |
                                <a href="#">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?  endfor ?>
                </table>
            </div>
        </div>
    </div>
<? endfor ?>

<script>
    $(document).ready(function() {
        $('.delete-project').click(function(e) {
            var url = $(this).attr('href');

            e.preventDefault();

            $.ajax({
                url: url,
                method: 'DELETE',
                complete: function(res) {
                    console.log(res);
                }
            });
        });
    });
</script>