<div class="share container drop">
    <?php if(isset($nofiles)) { echo $nofiles; }?>
    
<?php 
    if(isset($share)) {
    
    foreach($share as $s){
        ?>
        <div class="file pull-left">
            <div class="pull-left extension bgcolor<?php echo $s['cssclass'];?>">
                <?php echo $s['ext']; ?>
            </div>
            
            <div class="details pull-right">
             <?php echo $s['name']; ?><br/>
             Type: <?php echo $s['ext']; ?> <br/>
             Size: <?php echo round($s['size']/1048576, 3); ?>MB <br/>
             Date Shared: <?php echo date("Y-m-d h:i:sa", strtotime($s['date_shared']));?><br/>
             link: <?php echo $APP_URL;?>/download/file/<?php echo $s['file_id']; ?> <br/>
             <?php echo $s['download_count']; ?> downloads <br/>           
             <a href="<?php echo $APP_URL; ?>/share/unshare/<?php echo $s['name']; ?>"><span class="glyphicon glyphicon-minus-sign"></span> Unshare File</a>
            </div>
            <div class="clearboth"></div>
        </div>
        
        
    <?php }
    }
    ?>
    
</div>