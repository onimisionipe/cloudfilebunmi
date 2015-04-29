<div class="container drop downloadfile">
    <div class='pull-left ext'>
        <?php echo $dload['ext']; ?>
    </div>
    <div class="details pull-left">
             <?php echo $dload['name']; ?><br/>
             Shared By: <?php echo $dload['shared_by']; ?><br/>
             Type: <?php echo $dload['ext']; ?> <br/>
             Size: <?php echo round($dload['size']/1048576, 3); ?>MB <br/>
             Date Shared: <?php echo date("Y-m-d h:i:sa", strtotime($dload['date_shared']));?><br/>
             <?php echo $dload['download_count']; ?> downloads; <br/>     
             <a href="<?php echo $APP_URL; ?>/download/truedownload/<?php echo $dload['link']; ?>"><span class="glyphicon glyphicon-download"></span> Download File</a>
            </div>
    <div class='clearboth'></div>
    
</div>
