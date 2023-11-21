<?php $this->layout("Master");?>

<div class="container">
    <h2>Dados Pessoais</h2>
    <form method="post" action="/client-add">
        <input type="text" name="name" placeholder="Nome">
        <input type="text" name="lastname" placeholder="Sobrenome">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Senha">
        <input type="text" name="cpf" placeholder="cpf">
        <input type="cnpj" name="cnpj" placeholder="cnpj">
        <input type="text" name="gender" placeholder="Sexo">
        <input type="text" name="rg" placeholder="Rg">
        <input type="text" name="marital_status" placeholder="Estado Civil">
        <input type="text" name="occupation" placeholder="Ocupação">
        <input type="date" name="birth_date" placeholder="Data de Nascimento">
        <select name="profile_id">
            <option value="1">Admnistrador</option>
        </select>
        <select name="type_person_id">
            <option value="1">Fisica</option>
            <option value="2">Jurudica</option>
        </select>
        <button type="submit">Salvar</button>
    </form>
</div>