<div id="content" class="container">
    <div class="row">
        <div class="col-md-9">
            <?php foreach ($news as $item) { 
                $date = strtotime($item['date']);
                $date = date("d-m-Y", $date);
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $item['title'] ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $item['content'] ?>
                        <hr>
                        <span>Created on the <?php echo $date ?></span>
                    </div>
                </div>
                
            <?php } ?>
        </div>
        <div class="col-md-3">
            <div class="widget">
                <h3>Twitter Feed</h3>
                <br>
                <p>Twitter feed or social media links here.</p>
            </div>
            <div class="widget">
                <h3>promotional Title</h3>
                <br>
                <p>Promo image, caption, event picture placed here.</p>
            </div>
        </div>
    </div>
</div>