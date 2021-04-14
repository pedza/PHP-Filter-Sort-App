<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div>

        <form action="<?php echo URLROOT; ?>/filters/filterForm" method="POST">
            <div class="mb-3">
            <label for="rating" class="form-label">Order by rating</label> <br>
            <select class="form-select form-control" aria-label="Default select example" name="rating" id="rating">
                <option selected="selected">Select rating</option>
                <option>Higher First</option>
                <option>Lower First</option>
            </select>
            </div>
            <div class="mb-3">
                <label for="minimumRating" class="form-label">Minimum rating</label> <br>
                <select class="form-select form-control" name="minimumRating" id="minimumRating">
                    <option selected="selected">Select Option</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Order by date</label> <br>
                <select class="form-select form-control" name="date" id="date">
                    <option selected="selected">Select Option</option>
                    <option>Newest First</option>
                    <option>Oldest First</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Prioritize by text</label> <br>
                <select class="form-select form-control" name="text" id="text">
                    <option selected="selected">Select Option</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <button id="submit" type="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>


    <div >

                <table class="table">
            <thead>
                <tr>
                <th scope="col">Text Prioritize</th>
                <th scope="col">Rating</th>
                <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($_SESSION as $v):?>
                <tr>
                    <th scope="row"><?php echo $v['reviewText'] ?></th>
                    <td><?php echo $v['rating'] ?></td>
                    <td><?php echo $v['reviewCreatedOnDate'] ?></td>
                </tr>  
               
            </tbody>
            <?php endforeach;?>
            </table>
            
    </div>

 


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>