<?php include "function.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>To do example</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="todo-app">
            <h1>My To-Do List</h1>
            <form id="add-todo-form">
              <input type="text" id="todo-input" placeholder="Add a new to-do item...">
              <button type="submit">Add</button>
            </form>
            <ul id="todo-list">
             <?php get_data(); ?>
            </ul>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>

            function getList()
            {
                $.ajax({
                    url: "function.php",
                    type: "GET",
                    data: {
                        "getList":true
                    },
                    success: function(response){
                        $("#todo-list").html(response);
                    }
                });
            }

            function addTodo()
            {
                var input = $("#todo-input").val();

                $.ajax({
                    url: "function.php",
                    type: "POST",
                    data: {"add":"add",
                        todo: input},
                    success: function(response) {
                        getList();
                    }
                });
            }

            $('#add-todo-form').on('submit', function(e) {
                e.preventDefault();
                addTodo();
            });


            function deleteItem(id)
            {

                $.ajax({
                    url: "function.php",
                    type: "POST",
                    data: {
                        "delete":"1",
                        id: id
                    },
                    success: function(response) {
                        getList();
                    }
                });
            }

            function updateItem(id)
            {
                var todo = $("#"+id).val();
                $.ajax({
                    url: "function.php",
                    type: "POST",
                    data: {
                        "update":"1",
                        id: id,
                        text: todo
                    },
                    success: function(response) {
                        getList();
                    }
                });
            }

        </script>
    </body>
</html>
