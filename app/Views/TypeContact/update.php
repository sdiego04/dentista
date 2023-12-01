<?php $this->layout("Master");?>
<div class="container">
    <h2>Tipo de Contato - Alterar</h2>
    <form method="post" action="/client-update">
        <input type="text" name="id" value="<?=$data[0]->type_contact_id?>" hidden>
        <label>Nome</label>
        <input type="text" name="name" placeholder="Nome" value="<?=$data[0]->name?>">
        <label>Status</label>
        <select name="type_person_id">
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
        </select>
        <button type="submit">Salvar</button>
    </form>
</div>