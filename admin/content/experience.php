
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <?php
                                foreach ($rowexp as $keyexp => $valueexp):
                                ?>
                            <label for="">Experience</label>
                            <input type="text" name="how_long" id="" class="form-control" placeholder="ex:7"
                                value="<?php echo ($id) ? $valueexp['how_long'] : '' ?>" readonly>
                            <small>Input how long is your experience</small>
                            <input type="text" name="time" id="" class="form-control" placeholder="ex:Years/Month/Days"
                                value="<?php echo ($id) ? $valueexp['time'] : '' ?>"readonly>
                            <small>Input the time</small>
                            <a href='?page=tambah-experience&edit=<?php echo $valueexp['id'] ?>' class='btn btn-sm btn-primary' align='right'>Edit Experience</a>
                            <?php endforeach ?>
                        </div>
                        
                    </form>