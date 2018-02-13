            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">File Listt</h4>
                                    <p class="category">List of all Files uploaded for each event</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Name</th>
                                            <th>Event</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $kara = new _es_drive();
                                                $result = $kara->all_files();
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    $down_url = server_map_url('Drive.php');
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr><td>".$row["_es_name"]."</td><td>".$row["_es_event"]."</td><td><a href='".APP_ROOT."download.php?file=".$row["_es_id"]."'>Download</a></td></tr>";
                                                    }
                                                } else {
                                                    echo "No events registered <a href='event.php'>Add events here!<a/>";
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