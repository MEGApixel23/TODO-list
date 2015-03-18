$(document).ready(function() {
    $('body')
        .on('click', '[role=controls]', function(e) {
            e.preventDefault();
    
            return false;
        })
        .on('click', '.edit-task, .confirm-edit', function(e) {
            e.preventDefault();

            var $container = $(this).closest('.task'),
                $input = $container.find('.task-text-input'),
                $text = $container.find('.task-text'),
                $controlsEdit = $container.find('.controls-edit'),
                $controlsConfirm = $container.find('.controls-confirm');

            $text.toggle();
            $input.toggle();
            $controlsEdit.toggle();
            $controlsConfirm.toggle();

            return false;
        })

        .on('click', '.edit-project, .confirm-project', function(e) {
            e.preventDefault();

            var $container = $(this).closest('.project'),
                $inputContainer = $container.find('.change-title-container'),
                $titleContainer = $container.find('.project-title-container'),
                $controlsEdit = $container.find('.controls-edit-project'),
                $controlsConfirm = $container.find('.controls-confirm-project');

            $titleContainer.toggle();
            $inputContainer.toggle();
            $controlsEdit.toggle();
            $controlsConfirm.toggle();

            return false;
        })
    ;
});