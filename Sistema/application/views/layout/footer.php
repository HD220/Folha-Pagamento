
<div class="modal fade" tabindex="-1" role="dialog" id="modalEmpresa">
    <div class="modal-dialog" role="document">
        <div  class="panel panel-primary modal-content">
            <div class="modal-header panel-heading" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title">Selecione a empresa da sessão</h4>
            </div>
            <div class="modal-body" >
                <?= form_open("/usuario/empresa", ['class' => 'form-horizontal']) ?>
                <?=  form_hidden("url",  uri_string())?>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="usuario">Empresa:</label>
                    <div class="col-sm-9">
                        <?= form_dropdown('IDEMPRESA', $empresas, $this->session->userdata('empresa')['ID'], ['class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?= form_submit('form', 'Salvar', ['class' => 'btn btn-primary pull-right']) ?>
                    </div>
                </div>


                <?= form_close() ?>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>
</div> 

</body>
</html>