<?php $this->layout("Master");?>

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