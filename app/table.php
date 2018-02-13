<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Event List</h4>
                                    <p class="category">List of all events registered</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Location</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                        </thead>
                                        <tbody>
                                            <!-- Run PHP script here to populate table:index() -->
                                            <?php
                                                $lola = new _es_event_helper();
                                                $result = $lola->index();
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    $up_url = server_map_url('upload.php');
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr><td>".$row["_es_name"]."</td><td>".$row["_es_cat"]."</td><td>".$row["_es_location"]."</td><td>".$row["_es_start_date"]."</td><td>".$row["_es_end_date"]."</td><td>".$row["_es_start_time"]."</td><td>".$row["_es_end_time"]."</td><td align='center'><form action='$up_url' method='post' enctype='multipart/form-data'>
                                                        <input name='e_id' value='".$row["_es_id"]."' hidden />
                                                        <input type='file' name='es_file' />
                                                        <input type='submit' />
                                                    </form</td></tr>";
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