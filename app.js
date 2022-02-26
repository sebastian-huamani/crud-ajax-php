$(document).ready(function(){
    let edit = false;
    $('#contenedor-tasks').hide();

    fetchTasck();


    $('#search').keyup(function(e){
        if($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url : 'task-search.php',
                type: 'POST',
                data: {search: search},
                success: function(response){
                    let tasks = JSON.parse(response);
                    let templates = '';
                    tasks.forEach(task => {
                        templates += `
                        <tr taskId="${task.id}">
                            <td >${task.id}</td>
                            <td>
                                <a href="#" class="task-item">${task.name}</a>
                            </td>
                            <td>${task.description}</td>
                            <td>
                                <button class="btn-delete task-delete">Delete</button>
                            </td>
                        </tr>`
                    });
                    $('#contenedor-tasks').html(templates);
                    $('#tasks-body').hide();
                    $('#contenedor-tasks').show();
                }
            });
        } else {
            $('#contenedor-tasks').hide();
            $('#tasks-body').show();
        }
    });


    $('#task-form').submit(function(e){
        const postData = {
            name: $('#name').val(),
            description : $('#description').val(),
            id: $('#taskId').val()
        };

        let url = edit === false ? 'task-add.php' : 'task-edit.php';

        $.post( url,  postData, function(response) {
            console.log(response);
            fetchTasck();
            //reseteamos el formulario
            $('#task-form').trigger('reset');
            edit = false;
        });
        // evitamos que la paguina se recarge con:
        e.preventDefault();
    });
    
    function fetchTasck(){
        $.ajax({
            url:'task-list.php',
            type: 'GET',
            success: function(response){
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
                        <tr taskId="${task.id}">
                            <td >${task.id}</td>
                            <td>
                                <a href="#" class="task-item">${task.name}</a>
                            </td>
                            <td>${task.description}</td>
                            <td>
                                <button class="btn-delete task-delete">Delete</button>
                            </td>
                        </tr>`
                });
                $('#tasks-body').html(template);
            }
        });
    }


    $(document).on('click', '.task-delete', function(){
        if(confirm('are you sure you want delete it?')){

            let elemet = $(this)[0].parentElement.parentElement;
            let id = $(elemet).attr('taskId');
            $.post('task-delete.php', {id} , function(response){
                fetchTasck();
            });
        }
    });

    $(document).on('click', '.task-item', function(){
        let elemet = $(this)[0].parentElement.parentElement;
        let id = $(elemet).attr('taskId');
        $.post('task-online.php', {id} , function(response){

            let tasks = JSON.parse(response);

            $('#name').val(tasks.name);
            $('#description').val(tasks.description);
            $('#taskId').val(tasks.id);
            edit = true;
        });

    });
});