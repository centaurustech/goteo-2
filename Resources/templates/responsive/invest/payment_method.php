<?php

$this->layout('invest/layout');

$this->section('main-content');

?>

<div class="container">

    <div class="row row-form">
        <div class="panel panel-default invest-container">
            <div class="panel-body">
                <h2 class="col-md-offset-1 padding-bottom-2"><?= $this->text('invest-method-title') ?></h2>

                <div class="col-md-10 col-md-offset-1 reminder">
                    <div class="level-1">
                       <?= $this->text('invest-alert-investing') ?><span class="amount-reminder"><?= $this->raw('amount_formated') ?></span> <?= $this->text('invest-project') ?> <span class="uppercase"><?= $this->project->name ?></span>
                    </div>
                      <?php if($this->reward): ?>
                    <div class="level-2">
                        <?= $this->text('invest-alert-rewards') ?>
                        <strong class="text-uppercase"><?= $this->reward->reward ?></strong>
                    </div>
                <?php endif ?>
                </div>

                <form class="form-horizontal" role="form" method="GET" action="/invest/<?= $this->project->id ?>/form">
                <input type="hidden" name="reward" value="<?= $this->reward ? $this->reward->id : '0' ?>">
                <input type="hidden" name="amount" value="<?= $this->amount_original . $this->currency ?>">

                <?php if($this->skip_login): ?>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group no-register<?= $this->error ? ' has-error' : '' ?>">
                            <label><?= $this->text('regular-email') ?></label>
                            <input type="email" class="form-control" placeholder="<?= $this->text('regular-email') ?>" name="email" value="<?= $this->email ?>" required>
                            <?= ($this->error ? '<span class="help-block">' . $this->error . '</span>' : '') ?>
                        </div>
                    </div>
                <?php endif ?>

                <div class="row no-padding col-md-10 col-md-offset-1">
                <?php foreach($this->pay_methods as $method => $pay): ?>
                    <div class="col-xxs-6 col-tn-6 col-xs-3 pay-method<?= $pay->isActive() ? '' : ' disabled' ?>">
                        <label class="label-method <?= $pay->isActive($this->amount) ? '' : 'label-disabled' ?> <?= $this->default_method == $method ? ' method-choosen' : '' ?>" for="<?= $method ?>-method">
                            <input class="method" name="method" id="<?= $method ?>-method"<?= $this->default_method == $method ? ' checked' : '' ?> <?= $pay->isActive($this->amount) ? '' : ' disabled="disabled"' ?> value="<?= $method ?>" type="radio">
                            <span class="method-text">
                            <?= $pay->getName() ?>
                            </span>
                            <img class="img-responsive img-method" alt="<?= $method ?>" title="<?= $pay->getDesc() ?>" src="<?= $pay->getIcon() ?>">
                        </label>
                    </div>
                <?php endforeach ?>
                </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1 method-conditions">
                            <div class="checkbox">
                                <label>
                                    <input class="no-margin-checkbox big-checkbox" type="checkbox" name="anonymous" id="anonymous" value="1">
                                        <p class="label-checkbox">
                                        <?= $this->text('invest-anonymous') ?>
                                        </p>
                                </label>

                            </div>

                            <?php if(array_key_exists('pool', $this->pay_methods)): ?>
                            <div class="checkbox">
                                <label>
                                    <input class="no-margin-checkbox big-checkbox" type="checkbox" name="pool_on_fail" id="pool_on_fail" value="1">
                                        <p class="label-checkbox">
                                        <?= $this->text('invest-pool') ?><a data-toggle="modal" data-target="#myModal" href=""> <?= $this->text('invest-more-info') ?></a>
                                        </p>
                                </label>
                            </div>
                            <?php endif ?>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-1 invest-button">
                            <button type="submit" class="btn btn-block btn-success col-xs-3"><?= $this->text('invest-button') ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>


    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= $this->text('invest-modal-pool-title') ?></h4>
      </div>
      <div class="modal-body">
        <?= $this->text('invest-modal-pool-description') ?>
      </div>
    </div>
  </div>
</div>

<?php $this->replace() ?>

<?php $this->section('footer') ?>
<script type="text/javascript">
// @license magnet:?xt=urn:btih:0b31508aeb0634b347b8270c7bee4d411b5d4109&dn=agpl-3.0.txt
$(function(){

<?php if(array_key_exists('pool', $this->pay_methods)): ?>
    $('#pool_on_fail').get(0).originalStatus = $('#pool_on_fail').prop('checked');

    $('input[name="method"]').on('change', function(){
        if($(this).val() === 'pool') {
            $('#pool_on_fail').prop('checked', true);
            $('#pool_on_fail').prop('disabled', true);
        }
        else {
            $('#pool_on_fail').prop('disabled', false);
            if(typeof $('#pool_on_fail').get(0).originalStatus !== 'undefined') {
                $('#pool_on_fail').prop('checked', $('#pool_on_fail').get(0).originalStatus);
            }
        }
    });
    $('#pool_on_fail').on('change', function(){
        $(this).get(0).originalStatus = $(this).prop('checked');
    });
<?php endif ?>

});



$(':radio').change(function(){
    var id = $(this).attr('id');
    $(this).closest( "label" ).addClass( "method-choosen" );
    $(".method:not(#" + id + ")").each(function(){
        $(this).closest( "label" ).removeClass( "method-choosen" );
        $(this).prop('checked', false);
    })

});


// @license-end
</script>
<?php $this->append() ?>

