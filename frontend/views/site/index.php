<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';


?>

<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/js/site.js"></script>

<?php foreach($tree as $branch){ ?>
    <ul>
        <?php foreach($branch as $leaves){ ?>
            <li>
                <ul>
                    <?php foreach($leaves as $leave){ ?>
                        <li><a class="js-modal-show" href='#'><?=$leave?></a></li>
                    <?php } ?>
                </ul>
            </li><br/>
        <?php } ?>
    </ul>
<?php }
echo $this->render('modal') ?>

