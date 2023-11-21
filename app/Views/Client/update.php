<?php $this->layout("Master");?>
<div class="container">
    <h2>Dados Pessoais - Alterar</h2>
    <form method="post" action="/client-update">
        <input type="text" name="id" value="<?=$data[0]->client_id?>" hidden>
        <label>Nome</label>
        <input type="text" name="name" placeholder="Nome" value="<?=$data[0]->name?>">
        <label>Sobrenome</label>
        <input type="text" name="lastname" placeholder="Sobrenome" value="<?=$data[0]->lastname?>">
        <label>Email</label>
        <input type="email" name="email" placeholder="Email" value="<?=$data[0]->email?>" readonly>
        <label>Senha</label>
        <input type="password" name="password" placeholder="Senha" value="<?=$data[0]->password?>">
        <label>Cpf</label>
        <input type="text" name="cpf" placeholder="cpf" value="<?=$data[0]->cpf?>" readonly>
        <label>Cnpj</label>
        <input type="cnpj" name="cnpj" placeholder="cnpj" value="<?=$data[0]->cnpj?>">
        <label>Sexo</label>
        <input type="text" name="gender" placeholder="Sexo" value="<?=$data[0]->gender?>">
        <label>RG</label>
        <input type="text" name="rg" placeholder="Rg" value="<?=$data[0]->rg?>" readonly>
        <label>Estado Civil</label>
        <input type="text" name="marital_status" placeholder="Estado Civil" value="<?=$data[0]->marital_status?>">
        <label>Ocupação</label>
        <input type="text" name="occupation" placeholder="Ocupação" value="<?=$data[0]->occupation?>">
        <label>Data de nascimento</label>
        <inputtype="date" name="birth_date" placeholder="Data de Nascimento" value="<?=$data[0]->birth_date?>">
        <label>Perfil</label>
        <select name="profile_id">
            <option value="1">Admnistrador</option>
        </select>
        <label>Tipo de Pessoa</label>
        <select name="type_person_id">
            <option value="1">Fisica</option>
            <option value="2">Jurudica</option>
        </select>
        <button type="submit">Salvar</button>
    </form>
</div>