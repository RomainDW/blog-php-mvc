<?php if (!empty($this->sErrMsg)): ?>
  <div class="card red">
    <div class="card-content white-text">
        <?php  echo $this->sErrMsg.'<br/>'; ?>
    </div>
  </div>
<?php endif ?>

<?php if (!empty($this->sSuccMsg)): ?>
  <p><?=$this->sSuccMsg?></p>
<?php endif ?>
