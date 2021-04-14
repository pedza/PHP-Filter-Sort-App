<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    
        <form action="<?php echo URLROOT; ?>/filters/filterForm" method="POST">
            
            <label for="rating">Order by rating</label> <br>
            <select name="rating" id="rating">
            <option selected="selected">Select rating</option>
                <option>Higher First</option>
                <option>Lower First</option>
            </select>
            <br>
            <label for="minimumRating">Minimum rating</label> <br>
            <select name="minimumRating" id="minimumRating">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <br>
            <label for="date">Order by date</label> <br>
            <select name="date" id="date">
                <option>Newest First</option>
                <option>Oldest First</option>
            </select>
            <br>
            <label for="text">Prioritize by text</label> <br>
            <select name="text" id="text">
                <option>Yes</option>
                <option>No</option>
            </select>
            <br>
            <br>
            <button id="submit" type="submit" value="submit">Submit</button>
        
        </form>

    </div>
</body>
</html>