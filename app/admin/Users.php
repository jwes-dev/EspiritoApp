<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">App Users</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>User Name</th>
                                            <th>Role</th>
                                        </thead>
                                        <tbody>
                                            <!-- Run PHP script here to populate table:index() -->
                                            <?php
                                                $lola = new AuthManager();
                                                $result = $lola->ListUsers();
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr><td>".$row["_es_email"]."</td><td>".$row["_es_role"]."</td>";
                                                    }
                                                } else {
                                                    echo "No users found <a href='event.php'>Add users!<a/>";
                                                }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>