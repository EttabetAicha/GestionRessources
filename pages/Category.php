<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Ressources</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../css/page.css">
</head>

<body>
    <?php include('./component/sidebar.php') ?>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <!-- ... (Your existing header code) ... -->
            </div>
        </header>
        <!-- Main -->
        <div class="card shadow border-0 mb-7">
            <div class="card-header">
                <h5 class="mb-0">List des Categories</h5>
            </div>
            <div class="table-responsive">
                <?php
                include 'connexion.php';
                $result = $con->query("SELECT * FROM categories");
                ?>
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Category Id</th>
                            <th scope="col">Nom de la Category </th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $value) : ?>
                            <tr>
                                <td><?php echo $value['CategoryID'] ?></td>
                                <td><?php echo $value['NomCategorie'] ?></td>

                                <td class="text-end">
                                    <button type="button" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#userProfileModal<?php echo $value['CategoryID']; ?>">Edit</button>
                                </td>
                            </tr>

                            <!-- Modal for each row -->
                            <div class="modal fade" id="userProfileModal<?php echo $value['CategoryID']; ?>" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="userProfileModalLabel">Category</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="updateCat.php" enctype="multipart/form-data">

                                                <input type="hidden" name="CategoryID" value="<?php echo $value['CategoryID']; ?>">
                                                <div class="mb-3">
                                                    <label for="categoryid<?php echo $value['CategoryID']; ?>" class="form-label">Category Id</label>
                                                    <input type="text" class="form-control" id="categoryid<?php echo $value['CategoryID']; ?>" name="idcat" value="<?php echo $value['CategoryID'] ?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="categoryname<?php echo $value['CategoryID']; ?>" class="form-label">Nom de Category </label>
                                                    <input type="text" class="form-control" id="categoryname<?php echo $value['CategoryID']; ?>" name="namecat" value="<?php echo $value['NomCategorie'] ?>">
                                                </div>

                                                <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>


            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="../js/page.js"></script>
</body>

</html>