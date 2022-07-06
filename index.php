<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="form">
                    <form action="" method="post">
                        <div class="form-floating">
                            <textarea name="image" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Comments</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="tab col-lg-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>image originale</th>
                                <th>image base64</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                if (isset($_POST['image'])) {
                                    $urls = explode(",", $_POST['image']);
                                    foreach ($urls as $key => $url) {
                                        // conversion des url en base64

                                        $img = file_get_contents($url);
                                        $data = base64_encode($img);

                                        // affichage sur le tableau
                                        echo "<tr>";
                                        echo '<td><img class="fit-picture" src="' . $url . '" alt="image original" height="100" width ="120"></td>';
                                        echo '<td>' . $data . '</td>';
                                        echo "</tr>";
                                    }
                                } else {
                                    echo '<td>aucune image</td>';
                                    echo '<td>aucune base64</td>';
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>