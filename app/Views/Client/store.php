<?php $this->layout("Master"); ?>

<div class="container">
    <h2>Dados Pessoais</h2>
    <form method="post" action="/client-add">
        <div class="row">
            <div class="col">
                <label for="name">Nome</label>
                <input class="form-control" id="name" type="text" name="name">
            </div>
            <div class="col">
                <label for="lastname">Sobrenome</label>
                <input class="form-control" id="lastname" type="text">
            </div>
            <div class="col">
                <label for="email">Email</label>
                <input class="form-control" id="email" type="email">
            </div>
            <div class="col">
                <label for="password">Password</label>
                <input class="form-control" id="password" type="password">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="cpf">CPF</label>
                <input class="form-control" id="cpf" type="text">
            </div>
            <div class="col">
                <label for="cnpj">CNPJ</label>
                <input class="form-control" id="cnpj" type="text">
            </div>
            <div class="col">
                <label for="gender">Sexo</label>
                <input class="form-control" id="gender" type="text">
            </div>
            <div class="col">
                <label for="rg">RG</label>
                <input class="form-control" id="rg" type="text">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="marital_status">Estado Civil</label>
                <input class="form-control" id="marital_status" type="text">
            </div>
            <div class="col">
                <label for="occupation">Ocupação</label>
                <input class="form-control" id="occupation" type="text">
            </div>
            <div class="col">
                <label for="birth_date">Data de Nascimento</label>
                <input class="form-control" id="birth_date" type="text">
            </div>
            <div class="col">
                <label for="profile">Perfil</label>
                <select class="form-control" id="profile" name="profile_id">
                    <option value="1">Admnistrador</option>
                </select>
            </div>
            <div class="col">
                <label for="type_person">Tipo de Pessoa</label>
                <select class="form-control" id="profile" name="type_person">
                    <option value="1">Fisica</option>
                    <option value="2">Jurudica</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Salvar</button>
    </form>
</div>
<div class="container">
    <h2>Dados de Endereço</h2>
    <div class="row">
        <div class="col">
            <label for="street">Rua</label>
            <input class="form-control" id="street" type="text" name="street">
        </div>
        <div class="col">
            <label for="number">Número</label>
            <input class="form-control" id="number" type="number" name="number">
        </div>
        <div class="col">
            <label for="complements">Complemento</label>
            <input class="form-control" id="complements" type="text" name="complements">
        </div>
        <div class="col">
            <label for="neighborhood">Bairro</label>
            <input class="form-control" id="neighborhood" type="text" name="neighborhood">
        </div>
        <div class="col">
            <label for="state">Estado</label>
            <select class="form-control" name="state" id="state">
                <option value="0" selected>Selecione o Estado</option>

                <?php foreach ($data['states'] as $key => $value) { ?>

                <option value="<?=$value['state_id']?>" selected><?=$value['name']?></option>

                <?php }?>

            </select>
        </div>
        <div class="col">
            <label for="city">Cidade</label>
            <select class="form-control" name="city" id="city">
                <option value="0" selected>Selecione o Cidade</option>
            </select>
        </div>
    </div>
</div>
<div class="container">
    <h2>Dados de Contato</h2>
    <div class="row">
        <div class="col-4">
            <label for="street">Rua</label>
            <input class="form-control" id="street" type="text" name="street">
        </div>
    </div>
</div>