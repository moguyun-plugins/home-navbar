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
                'class' => 'portlet light',
                'enctype' => 'multipart/form-data',
            ]
        ]); ?>
        <div class="tab-content">
            <div id="tab-focus" class="tab-pane active">
                <div class="form-body">
                    <div class="text-info">建议大小200×200</div>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr role="row" class="heading">
                            <th>#</th>
                            <th>
                                图片
                            </th>
                            <th width="25%">
                                名称
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
                                    <img src="/uploads/<?= $model->image; ?>" width="40">
                                    <input type="file" id="navbtn-image" name="images[]">
                                </td>
                                <td>
                                    <input type="text" id="navbtn-title" class="form-control"
                                           name="NavBtn[<?= $key; ?>][title]" value="<?= $model->title; ?>">
                                </td>
                                <td>
                                    <input type="text" id="navbtn-url" class="form-control"
                                           name="NavBtn[<?= $key; ?>][url]" value="<?= $model->url; ?>">
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
