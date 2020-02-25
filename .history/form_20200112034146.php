<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <section style="center">
        <form action="serg.php" method="POST">
            <div class="form-control">
                <label for="First_Name">First Name</label>
                <input type="text" id="First_Name" name="First_Name">
            </div>

            <div class="form-control">
                <label for="Last_Name">Last Name</label>
                <input type="text" id="Last_Name" name="Last_Name">
            </div>

            <div class="form-control">
                <label for="Genre">Genre</label>
                <select name="Genre" id="Genre">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="form-control">
                <label for="Date">Date</label>
                <input type="Date" id="Date" name="Date">
            </div>

            <div class="form-control">
                <label for="Mobile">Mobile</label>
                <input type="text" id="Mobile" name="Mobile">
            </div>

            <div class="form-control">
                <label for="Email">Email</label>
                <input type="text" id="Email" name="Email">
            </div>

            <button type="submit">
                Register
            </button>
        </form>
    </section>
</body>


</html>