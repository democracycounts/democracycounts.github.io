<?php
global $data;
if(!empty($data['quote'])){
    ?>
    <div class="quote">
        <blockquote>
            <p><?php echo $data['quote'];?></p>
            <?php
            if($data['quote_author']){
                ?>
                <span class="author"><span class="line left"></span><?php echo $data['quote_author']; ?><span class="line right"></span></span>
                <?php
            }
            ?>
        </blockquote>
    </div>
    <?php
}
?>