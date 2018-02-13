<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Add Event</h4>
                                    <p class="category">Enter the details about the event.</p>
                                </div>
                                <div class="card-content">
                                    <form method="POST" action="<?php echo "event_submit.php"?>" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Event Name</label>
                                                    <input type="text" class="form-control" name="e_name" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Location</label>
                                                    <input type="text" class="form-control" name="e_loc">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Type</label>
                                                    <select name="e_type" class="form-control">
                                                        <option>--select--</option>
                                                        <option>Industrial Visit</option>
                                                        <option>Guest Lecture</option>
                                                        <option>Seminars</option>
                                                        <option>Conference</option>
                                                        <option>Workshop</option>
                                                        <option>Value Added Programs</option>
                                                        <option>Training Programs</option>
                                                        <option>Invited Talks</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                <label class="control-label">Mode</label>
                                                    <select class="form-control" name="e_mode">
                                                        <option>-- select --</option>
                                                        <option>Attended</option>
                                                        <option>Organised</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Category</label>
                                                    <select class="form-control" name="e_cat">
                                                        <option>-- select --</option>
                                                        <option>Internal</option>
                                                        <option>External</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Description</label>
                                                    <input type="text" class="form-control" name="e_desc">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Start Date</label>
                                                    <input type="date" class="form-control" name="e_s_date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">End Date</label>
                                                    <input type="date" class="form-control" name="e_e_date">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Start Time</label>
                                                    <input type="time" id="currTime1" class="form-control" name="e_s_time">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">End TIme</label>
                                                    <input type="time" id="currTime2" class="form-control" name="e_e_time">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    Only upload zip file.<br />
                                                    Content protocol: <br />2 folders : Photos, Write Up.<br />
                                                    Photos folder contains the photos while the Write Up folder contains a wordfile containing the event article without any image (purely text)
                                                </p>
                                                <div class="form-group label-floating">
                                                    <input type="file" class="" name="es_file" id="file_up" hidden>
                                                    <button onclick="javascript:docuent.getElementById('file_up').click()" class="btn btn-warning">Select File</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                                                        <textarea class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <br/>
                                        <button type="submit" class="btn btn-primary ">Add</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="assets/img/faces/marc.jpg" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="category text-gray">CEO / Co-Founder</h6>
                                    <h4 class="card-title">Alec Thompson</h4>
                                    <p class="card-content">
                                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye
                                        I love Rick Owens’ bed design but the back is...
                                    </p>
                                    <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>