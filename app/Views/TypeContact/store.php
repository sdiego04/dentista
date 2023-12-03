<?php $this->layout("Master");?>
<div class="container">
    <h2>Tipo de Contato - Adicionar</h2>
    <form method="post" action="/type-contact-add">
        <label>Tipo de contato</label>
        <input type="text" name="name" placeholder="Nome" value="<?=$data[0]->name?>">
        <label>Status</label>
        <select name="status">
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
        </select>
        <button type="submit">Salvar</button>
    </form>
</div>