<table class="" style="border: 1px solid lightgray; width:<?php echo $dayidx * 150; ?>px;">
                                            <tr>
                                              <td style="padding: 10px; border: 1px solid lightgray;">Jam</td>
                                              <?php 
                                                $curdate = strtotime($periode_aktif->date_start);
                                                $dayidx = 1; 
                                                while($curdate <= strtotime($periode_aktif->date_end)) {
                                                  echo '<td style="width:150px;padding: 10px; border: 1px solid lightgray;">'.strftime("%d-%m-%Y", $curdate).'</td>'; 
                                                  $curdate = strtotime($periode_aktif->date_start.' +'.$dayidx.' day');
                                                  $dayidx++;
                                                }
                                              ?>                                          
                                            </tr>
                                            <?php foreach($sidang_time as $st) { ?>
                                              <tr>
                                                <td style="padding: 10px; position: absolute; background-color: white; width: 149px;  "><?php echo $st->label; ?></td>

                                                <?php 
                                                $curdate = strtotime($periode_aktif->date_start);
                                                $dayidx = 1; 
                                                while($curdate <= strtotime($periode_aktif->date_end)) { ?>
                                                  <td style="text-align:center;"><input type="button" class="btn btn-block btn-outline-primary" value="Plot" /></td>
                                                  <?php
                                                  $curdate = strtotime($periode_aktif->date_start.' +'.$dayidx.' day');
                                                  $dayidx++;
                                                }
                                              ?>       
                                                
                                                                                        
                                              </tr>
                                            <?php } ?>
                                          </table>