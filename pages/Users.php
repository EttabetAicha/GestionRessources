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
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end ">
                            <div class="mx-n1">
                                <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span>Edit</span>
                                </a>
                                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Create</span>
                                </a>
                                <a href="#" class="btn d-inline-flex btn-sm btn-warning mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-gear-wide-connected"></i>
                                    </span>
                                    <span>Manage</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">All files</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main -->

        <div class="card shadow border-0 mb-7">
            <div class="card-header">
                <h5 class="mb-0">List des Utilisateurs</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Role</th>
                            <th scope="col">Meeting</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connexion.php';
                        $result = $con->query("SELECT * FROM utilisateurs");
                        foreach ($result as $value) :
                        ?>
                            <tr>
                                <td>
                                    <img alt="..." src="../images/<?php echo $value['img'] ?>" class="avatar avatar-sm rounded-circle me-2">
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $value['NomUtilisateur'] ?>
                                    </a>
                                </td>
                                <td>

                                    <?php echo $value['Email'] ?>
                                </td>
                                <td>
                                    <?php echo $value['password'] ?>
                                </td>
                                <td>
                                    <?php echo $value['Roles'] ?>
                                </td>
                                <td>
                                    <span class="badge badge-lg badge-dot">
                                        <i class="bg-success"></i> <?php echo $value['Roles'] ?>
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userProfileModal<?php echo $value['UserID']; ?>">Edit</a>
                                    <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                        <a href="remove.php?UserID=<?php echo $value['UserID'] ?>"><i class="bi bi-trash"></i></a>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal for this iteration -->
                            <div class="modal fade" id="userProfileModal<?php echo $value['UserID']; ?>" tabindex="-1" aria-labelledby="userProfileModalLabel<?php echo $value['UserID']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="userProfileModalLabel<?php echo $value['UserID']; ?>">User Profile</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form for user information -->
                                            <form method="POST" action="update.php" enctype="multipart/form-data">
                                                <!-- Photo -->
                                                <input type="hidden" name="userID" value="<?php echo $value['UserID']; ?>">
                                                <div class="mb-3">
                                                    <label for="userPhoto<?php echo $value['UserID']; ?>" class="form-label">User Photo</label>
                                                    <input type="file" class="form-control" id="userPhoto<?php echo $value['UserID']; ?>" accept=".jpg,.png,.jpeg" name="img">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="userName<?php echo $value['UserID']; ?>" class="form-label">User Name</label>
                                                    <input type="text" class="form-control" id="userName<?php echo $value['UserID']; ?>" name="name" value="<?php echo $value['NomUtilisateur'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="userEmail<?php echo $value['UserID']; ?>" class="form-label">Email address</label>
                                                    <input type="email" class="form-control" id="userEmail<?php echo $value['UserID']; ?>" name="Email" value="<?php echo $value['Email']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="userRoles<?php echo $value['UserID']; ?>" class="form-label">Roles</label>
                                                    <input type="text" class="form-control" id="userRoles<?php echo $value['UserID']; ?>" name="Roles" value="<?php echo $value['Roles'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="userPassword<?php echo $value['UserID']; ?>" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="userPassword<?php echo $value['UserID']; ?>" name="Password" value="<?php echo $value['password'] ?>">
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

            <div class="card-footer border-0 py-5">
                <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link bg-info text-white" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../js/page.js"></script>
</body>

</html>