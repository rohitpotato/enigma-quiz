<?php include 'includes/header.php'; ?>

 
                    <div class="col-md-10">
                      <div class="topic-content pull-right">
                        <p><?php echo $title; ?></p>
                      </div>
                    </div>
                    <br> <br>

                <form role="form" method="POST" action="level.php?n=<?php echo getUserData()['level']?>">
                   <div class="form-group">
                    <input type="text" class="form-control" name="answer" placeholder="Enter answer" />
                  </div>
                  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </form>