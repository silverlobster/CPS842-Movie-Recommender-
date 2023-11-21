<?php
 session_start();
 if ($_SESSION['uid'] != 10003 || $_SESSION['uid'] != 10003) {
    header("location: home.php");
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="navbar.css" />
    </head>
    <body>
        <div id="navbar"></div>

        <h1> Home Section </h1>

        <form action="db-work.php" method="post">
            <select name="table" id="table" onchange='changeTable()'>
                <option value="trucks">Trucks</option>
                <option value="furniture_items">Furniture Items</option>
                <option value="users">Users</option>
                <option value="trips">Trips</option>
                <option value="orders">Orders</option>
                <option value="shopping">Shopping</option>
            </select>
            <select name="option" id="option" onchange='changeOption()'>
                <option value="insert">Insert</option>
                <option value="delete">Delete</option>
                <option value="select">Select</option>
                <option value="update">Update</option>
            </select>
            <div id="input-container">

            </div>
            <input type="submit" value="Enter!">
        </form>

        <!-- <label for="name">Enter Item Name: </label>
        <input type="text" name="name" id="name">
        <label for="price">Enter Item Price: </label>
        <input type="text" name="price" id="price">
        <label for="made_in">Item Produced In: </label>
        <input type="text" name="made_in" id="made_in">
        <label for="dept_code">Enter Item Dept Code: </label>
        <input type="text" name="dept_code" id="dept_code"> -->

        <script>
            var table = document.getElementById('table').value;

            function changeTable() {
                table = document.getElementById('table').value;
                $input_container = document.getElementById('input-container');
                $input_container.innerHTML = "";
                if (table != 'furniture_items' && table != 'trucks') {
                    var option = document.getElementById('option');
                    option.innerHTML = "<option value='select'>Select</option>";
                } else {
                    var option = document.getElementById('option');
                    option.innerHTML = `
                        <option value="insert">Insert</option>
                        <option value="delete">Delete</option>
                        <option value="select">Select</option>
                        <option value="update">Update</option>`;
                }
            }

            function changeOption() {
                $input_container = document.getElementById('input-container');
                $input_container.innerHTML = "";
                var option = document.getElementById('option').value;
                if (table == 'furniture_items') {
                    if (option == 'insert') {
                        $input_container.innerHTML = `
                                <label for="name">Enter Item Name: </label>
                                <input type="text" name="name" id="name">
                                <br>
                                <label for="price">Enter Item Price: </label>
                                <input type="text" name="price" id="price">
                                <br>
                                <label for="made_in">Item Produced In: </label>
                                <input type="text" name="made_in" id="made_in">
                                <br>
                                <label for="dept_code">Enter Item Dept Code: </label>
                                <input type="text" name="dept_code" id="dept_code">`;
                    } else if (option == 'delete') {
                        $input_container.innerHTML = `
                                <label for="id">Enter Item ID: </label>
                                <input type="text" name="id" id="id">`;
                    } else if (option == 'select') {

                    } else {
                        $input_container.innerHTML = `
                                <label for="id">Enter Item ID: </label>
                                <input type="text" name="id" id="id">
                                <br>
                                <label for="new-name">Enter New Item Name: </label>
                                <input type="text" name="new_name" id="new_name">
                                <br>
                                <label for="new-price">Enter New Item Price: </label>
                                <input type="text" name="new-price" id="new-price">
                                <br>
                                <label for="new-made_in">Item Now Produced In: </label>
                                <input type="text" name="new-made_in" id="new-made_in">
                                <br>
                                <label for="new-dept_code">Enter New Item Dept Code: </label>
                                <input type="text" name="new-dept_code" id="new-dept_code">`;
                    }
                    
                } else {
                    if (option == 'insert') {
                        $input_container.innerHTML = `
                                <label for="code">Enter Truck Code: </label>
                                <input type="text" name="code" id="code">
                                <br>
                                <label for="avail">Enter Truck Availability (1 or 0): </label>
                                <input type="text" name="avail" id="avail">`;
                    } else if (option == 'delete') {
                        $input_container.innerHTML = `
                                <label for="id">Enter Truck ID: </label>
                                <input type="text" name="id" id="id">`;
                    } else if (option == 'select') {

                    } else {
                        $input_container.innerHTML = `
                                <label for="id">Enter Truck ID: </label>
                                <input type="text" name="id" id="id">
                                <br>
                                <label for="code">Enter Truck Code: </label>
                                <input type="text" name="code" id="code">
                                <br>
                                <label for="avail">Enter Truck Availability (1 or 0): </label>
                                <input type="text" name="avail" id="avail">`;
                    }
                }
                // document.getElementById('input-container').innerHTML = "<label for='x_id'>Enter the ID: </label><input type='text' id='x_id' name='x_id'>";
            }

            const xhr = new XMLHttpRequest();
            const navbar = document.getElementById("navbar");

            xhr.onload = function() {
                navbar.innerHTML = xhr.responseText;
            };

            xhr.open("get", "navbar.php");
            xhr.send();
        </script>
    </body>
</html>