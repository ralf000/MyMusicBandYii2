<div class="modal fade" id="fileManager" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="width: 80%; height: auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Файловый менеджер</h4>
            </div>
            <div class="modal-body">
                <iframe src="/extensions/filemanager/dialog.php?akey=<?= Yii::$app->params['fileManagerPrivateKey'] ?>&type=1&field_id=image"
                        style="width: 100%; height: 70vh" frameborder="0" allowtransparency="true"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->