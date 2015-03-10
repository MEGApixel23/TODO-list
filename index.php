<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/main.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <title>Ruby Garage</title>
</head>
<body>
    <div class="background"></div>
    <div class="content ">

        <header>
            <div class="title">Simple TODO list</div>
        </header>

        <div class="menu">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Profile</a></li>
                <li role="presentation"><a href="#">Messages</a></li>
            </ul>
        </div>

        <? for ($i=0; $i<5; $i++) : ?>
        <div class="row">
            <div class="project col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                <div class="project-header bg-primary">
                    <div class="glyphicon glyphicon-list-alt project-icon"></div>
                    <div class="project-title">Название проекта</div>
                    <div class="project-controls pull-right">
                        <span class="glyphicon glyphicon-pencil"></span> |
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                </div>
                <div class="project-creator">
                    <div class="add-task">
                        <span class="glyphicon glyphicon-plus add-task-icon"></span>
                    </div>
                    <div class="task-input">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="tasks">
                    <div class="fields"></div>
                    <table class="tasks-table table">
                        <? for ($j=0; $j<2; $j++) : ?>
                            <tr class="task">
                                <td class="checkbox-container">
                                    <input type="checkbox">
                                </td>
                                <td>
                                    To do TODO list
                                </td>
                                <td class="task-controls">
                                    <span class="glyphicon glyphicon-resize-vertical"></span> |
                                    <span class="glyphicon glyphicon-pencil"></span> |
                                    <span class="glyphicon glyphicon-trash"></span>
                                </td>
                            </tr>
                        <?  endfor ?>
                    </table>
                </div>
            </div>
        </div>
        <? endfor ?>

        <div class="row">
            <div class="add-project-container">
                <button class="add-project btn btn-primary">Add TODO list</button>
            </div>
        </div>

        <footer>Ruby garage</footer>
    </div>
</body>
</html>