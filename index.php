<?php
    require('includes/connection.php');
    require('includes/getPeople.php');
    require('includes/viewPeople.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Pagination</title>
</head>
<body>
    <div class="container">
        <div class="col mx-auto">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>address</th>
                    <th>email</th>
                </tr>
            </thead>
            <?php
                $limit = 20;
                $offset = 0;
                $obj = new ViewPeople;
                $numRows = $obj->getQuantity();
            ?>
            <tbody>
                <?php
                    $obj->showPeople();
                ?>
            </tbody>
            </table>
        </div>
        <nav>
            <?php
                
                $i = 1;
                $index = 1; 
                echo '<ul class="pagination col-md-10 mx-auto">';
                
                while($numRows) {
                    echo '<li class="page-item">';
                    echo '<a class="page-link" href="';
                    echo 'index.php?offset=' . $offset;
                    echo '&limit=' . $limit;
                    echo '&index=' . $index;
                    echo '">';
                    echo $i . '</a></li>';
                    $numRows -= 20;
                    $offset += 20;
                    $i += 1;
                    $index += 1;
                    
                }
                echo '</ul>';

                
            ?>
       </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        let li = document.querySelectorAll('li');
        let i;
        let link = window.location.href;

        for(i = 0; i< li.length; i++) {
	       $position = link.indexOf('index=');
           $position += 6;
           $index = link.substr($position);
           if(li[i].textContent === $index) {
               li[i].className += ' active';
           }
        }
    </script>
</body>
</html>