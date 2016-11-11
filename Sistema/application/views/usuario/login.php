<div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Login Payroll</h3>
        </div>
        <div class="panel-body">

            <?php
            $attributes = array('class' => 'form', 'id' => 'login_form');
            echo form_open('/usuario/login', $attributes);
            ?>
            <fieldset>
                <?php
                $data = array(
                    'usuario' => array(
                        'name' => 'usuario',
                        'id' => 'usuario',
                        'maxlength' => '50',
                        'value' => set_value('usuario'),
                        'class' => 'form-control',
                        'autofocus' => true,
                        'placeholder' => "Usuário"
                    ),
                    'senha' => array(
                        'name' => 'senha',
                        'id' => 'senha',
                        'maxlength' => '100',
                        'value' => set_value('senha'),
                        'class' => 'form-control',
                        'placeholder' => "Senha"
                    ),
                    "entrar" => array(
                        'value' => 'Entrar',
                        'class' => 'btn btn-success btn-block'
                    )
                );
                ?>
                <div class="form-group">
                    <?= form_input($data['usuario']); ?>
                </div>
                <div class="form-group">
                    <?= form_password($data['senha']); ?>
                </div>

                <?php
                foreach ($data as $key => $value) {
                    echo form_error($key, "<div class='alert alert-warning' role='alert'>", "</div>");
                }

                echo form_submit($data["entrar"]);
                ?>
            </fieldset>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>