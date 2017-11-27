<?php

use yii\bootstrap\ActiveForm;

?>
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i>
        </div>
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab-focus" data-toggle="tab">导航按钮</a>
            </li>
        </ul>
    </div>
    <div class="portlet-body">
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'portlet light'
            ]
        ]); ?>
        <div class="tab-content">
            <div id="tab-focus" class="tab-pane active">
                <div class="form-body">
                    <div class="text-info">建议大小1290×490</div>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr role="row" class="heading">
                            <th>#</th>
                            <th>
                                图片
                            </th>
                            <th width="25%">
                                描述
                            </th>
                            <th>
                                链接
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($models as $key => $model): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td>
                                    <img src="<?= $model->image; ?>">
                                    <?= $form->field($model, 'image')->fileInput(['options' => [
                                        'accept' => 'image/*',
                                    ]]);
                                    ?>
                                </td>
                                <td>
                                    <?= $form->field($model, 'title')->textInput()->label(false); ?>
                                </td>
                                <td>
                                    <?= $form->field($model, 'url')->textInput()->label(false); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn blue"><i class="fa fa-save fa-fw"></i>保存</button>
                <button type="reset" class="btn default"><i class="fa fa-undo fa-fw"></i>撤销</button>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
