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
                                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#createUserModal">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Create</span>
                                </a>
                                <!-- Modal for creating a new user -->
                                <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form for creating a new user -->
                                                <form method="POST" action="create_user.php" enctype="multipart/form-data">
                                                    <!-- Photo -->
                                                    <div class="mb-3">
                                                        <label for="newUserPhoto" class="form-label">User Photo</label>
                                                        <input type="file" class="form-control" id="newUserPhoto" accept=".jpg,.png,.jpeg" name="img">
                                                    </div>

                                                    <!-- Name -->
                                                    <div class="mb-3">
                                                        <label for="newUserName" class="form-label">User Name</label>
                                                        <input type="text" class="form-control" id="newUserName" name="name">
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="mb-3">
                                                        <label for="newUserEmail" class="form-label">Email address</label>
                                                        <input type="email" class="form-control" id="newUserEmail" name="Email">
                                                    </div>

                                                    <!-- Roles -->
                                                    <div class="mb-3">
                                                        <label for="newUserRoles" class="form-label">Roles</label>
                                                        <input type="text" class="form-control" id="newUserRoles" name="Roles">
                                                    </div>

                                                    <!-- Password -->
                                                    <div class="mb-3">
                                                        <label for="newUserPassword" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="newUserPassword" name="Password">
                                                    </div>

                                                    <button type="submit" name="submit" class="btn btn-primary">Create User</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                <h5 class="mb-0">List des Ressources</h5>
            </div>
            <div class="table-responsive">
                <?php
                include 'connexion.php';
                $result = $con->query("SELECT * FROM ressources");
                ?>

                <!-- Table Header -->
                <!-- Table Header -->
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Ressources Id</th>
                            <th scope="col">Category Id</th>
                            <th scope="col">Subcategory Id</th>
                            <th scope="col">Squad Id</th>
                            <th scope="col">Poject Id</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $value) : ?>
                            <tr>
                                <td><?php echo $value['ResourceID'] ?></td>
                                <td><?php echo $value['CategoryID'] ?></td>
                                <td><?php echo $value['SubcategoryID'] ?></td>
                                <td><?php echo $value['SquadID'] ?></td>
                                <td>
                                    <span class="badge badge-lg badge-dot">
                                        <i class="bg-success"></i> <?php echo $value['ProjectID'] ?>
                                    </span>
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#userProfileModal<?php echo $value['ResourceID']; ?>">Edit</button>
                                </td>
                            </tr>

                            <!-- Modal for each row -->
                            <div class="modal fade" id="userProfileModal<?php echo $value['ResourceID']; ?>" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="userProfileModalLabel">Resource</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form for user information -->
                                            <form method="POST" action="update_res.php" enctype="multipart/form-data">
                                                <input type="hidden" id="resourceId" name="ResourceID" value="<?php echo $value['ResourceID']; ?>">

                                                <!-- Modify the Squad ID select -->
                                                <div class="mb-3">
                                                    <label for="squadId" class="form-label">Squad ID</label>
                                                    <select class="form-select" id="squadId" name="SquadID">
                                                        <?php
                                                        $squadQuery = $con->prepare("SELECT * FROM squads");
                                                        $squadQuery->execute();
                                                        $squads = $squadQuery->fetchAll();

                                                        foreach ($squads as $squad) {
                                                            $selected = ($value['SquadID'] == $squad['SquadID']) ? 'selected' : '';
                                                            echo "<option value='{$squad['SquadID']}' $selected>{$squad['SquadID']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <!-- Modify the Project ID select -->
                                                <div class="mb-3">
                                                    <label for="projectId" class="form-label">Project ID</label>
                                                    <select class="form-select" id="projectId" name="ProjectID">
                                                        <?php
                                                        $projectQuery = $con->prepare("SELECT * FROM projets");
                                                        $projectQuery->execute();
                                                        $projects = $projectQuery->fetchAll();

                                                        foreach ($projects as $project) {
                                                            $selected = ($value['ProjectID'] == $project['ProjectID']) ? 'selected' : '';
                                                            echo "<option value='{$project['ProjectID']}' $selected>{$project['ProjectID']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <!-- Add other form fields as needed -->

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